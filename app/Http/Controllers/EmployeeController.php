<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Directorate;
use App\Models\Project;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\DirectorInvitation;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('directorate')->get();
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => $employees->count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('employees.index', compact('employees', 'stats'));
    }

    public function create()
    {
        $directorates = Directorate::all();
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('employees.create', compact('directorates', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'directorate_id' => 'required|exists:directorates,id',
            'institutional_id' => 'nullable|string|unique:employees|max:255',
            'email' => 'required|email|unique:employees|unique:users,email',
            'position' => 'required|string|max:255',
            'system_role' => 'required|string|in:employee,director',
        ]);

        $employee = Employee::create($validated);

        $msg = 'Employee registered successfully.';

        // Handle Secure Invitation based on System Role
        if ($validated['system_role'] === 'director') {
            $token = \Illuminate\Support\Str::random(40);
            $invitation = \App\Models\Invitation::create([
                'email' => $validated['email'],
                'directorate_id' => $validated['directorate_id'],
                'employee_id' => $employee->id,
                'token' => $token,
                'expires_at' => now()->addDays(2),
            ]);
            
            Mail::to($validated['email'])->send(new DirectorInvitation($invitation));
            $msg .= ' A secure registration invitation has been dispatched to their email.';
        }

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function edit(Employee $employee)
    {
        $directorates = Directorate::all();
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('employees.edit', compact('employee', 'directorates', 'stats'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'directorate_id' => 'required|exists:directorates,id',
            'institutional_id' => 'nullable|string|unique:employees,institutional_id,' . $employee->id . '|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id . '|unique:users,email,' . optional($employee->user)->id,
            'position' => 'required|string|max:255',
            'system_role' => 'required|string|in:employee,director',
        ]);

        $employee->update($validated);

        $msg = 'Employee information updated.';

        // Handle Invitation if explicit role is Director and User doesn't exist
        if ($validated['system_role'] === 'director' && !$employee->user) {
            $token = \Illuminate\Support\Str::random(40);
            $invitation = \App\Models\Invitation::updateOrCreate(
                ['email' => $validated['email']],
                [
                    'directorate_id' => $validated['directorate_id'],
                    'employee_id' => $employee->id,
                    'token' => $token,
                    'expires_at' => now()->addDays(2),
                ]
            );
            
            Mail::to($validated['email'])->send(new DirectorInvitation($invitation));
            $msg .= ' A secure registration invitation has been dispatched to their email.';
        }

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Staff record and all associated identity credentials have been completely purged.');
    }
}
