<?php

namespace App\Services;

use App\Mail\DirectorInvitation;
use App\Models\Employee;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeeService
{
    /**
     * Create a new employee and send invitation if they are a director.
     */
    public function createEmployee(array $data): Employee
    {
        return DB::transaction(function () use ($data) {
            $employee = Employee::create($data);

            if (in_array($data['system_role'], ['director', 'evaluator'])) {
                $this->sendDirectorInvitation($employee);
            }

            return $employee;
        });
    }

    /**
     * Update an employee and send invitation if role changed to director.
     */
    public function updateEmployee(Employee $employee, array $data): Employee
    {
        return DB::transaction(function () use ($employee, $data) {
            $employee->update($data);

            if (in_array($data['system_role'], ['director', 'evaluator']) && ! $employee->user) {
                $this->sendDirectorInvitation($employee);
            }

            return $employee;
        });
    }

    /**
     * Generate and send a secure invitation to a director.
     */
    protected function sendDirectorInvitation(Employee $employee): void
    {
        $token = Str::random(40);

        $invitation = Invitation::updateOrCreate(
            ['email' => $employee->email],
            [
                'directorate_id' => $employee->directorate_id,
                'employee_id' => $employee->id,
                'token' => $token,
                'expires_at' => now()->addDays(2),
            ]
        );

        Mail::to($employee->email)->send(new DirectorInvitation($invitation));
    }
}
