<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Directorate;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $this->authorize('viewAny', Employee::class);
        $employees = Employee::with('directorate')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $this->authorize('create', Employee::class);
        $directorates = Directorate::all();
        return view('employees.create', compact('directorates'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $this->employeeService->createEmployee($request->validated());

        $msg = 'Employee registered successfully.';
        if ($request->system_role === 'director') {
            $msg .= ' A secure registration invitation has been dispatched to their email.';
        }

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);
        $directorates = Directorate::all();
        return view('employees.edit', compact('employee', 'directorates'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $this->employeeService->updateEmployee($employee, $request->validated());

        $msg = 'Employee information updated.';
        if ($request->system_role === 'director' && !$employee->user) {
            $msg .= ' A secure registration invitation has been dispatched to their email.';
        }

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Staff record and all associated identity credentials have been completely purged.');
    }
}
