<?php

namespace App\Modules\Employee\Services;

use App\Mail\DirectorInvitation;
use App\Models\Employee;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeeService
{
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

    protected function sendDirectorInvitation(Employee $employee): void
    {
        $invitation = Invitation::updateOrCreate(
            ['email' => $employee->email],
            [
                'directorate_id' => $employee->directorate_id,
                'employee_id' => $employee->id,
                'token' => Str::random(64),
                'expires_at' => now()->addDays(2),
            ]
        );

        try {
            Mail::to($employee->email)->send(new DirectorInvitation($invitation));
        } catch (\Exception $e) {
            Log::error('Invitation email dispatch failed', [
                'employee_id' => $employee->id,
                'email' => $employee->email,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
