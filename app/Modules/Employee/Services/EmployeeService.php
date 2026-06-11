<?php

namespace App\Modules\Employee\Services;

use App\Mail\DirectorInvitation;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    public function resendInvitation(Employee $employee): void
    {
        $verified = User::where('email', $employee->email)
            ->whereNotNull('email_verified_at')
            ->exists();

        if ($verified) {
            throw new \RuntimeException('This employee already has an active verified account.');
        }

        // Remove any unverified user record so the invite can be used fresh.
        User::where('email', $employee->email)->whereNull('email_verified_at')->delete();

        $this->sendDirectorInvitation($employee);
    }

    protected function sendDirectorInvitation(Employee $employee): void
    {
        $verified = User::where('email', $employee->email)
            ->whereNotNull('email_verified_at')
            ->exists();

        if ($verified) {
            throw new \RuntimeException('This employee already has an active verified account.');
        }

        $invitation = Invitation::updateOrCreate(
            ['email' => $employee->email],
            [
                'directorate_id' => $employee->directorate_id,
                'employee_id' => $employee->id,
                'token' => Str::random(64),
                'expires_at' => now()->addDays(2),
            ]
        );

        Mail::to($employee->email)->send(new DirectorInvitation($invitation));
    }
}
