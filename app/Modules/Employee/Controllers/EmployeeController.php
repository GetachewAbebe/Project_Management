<?php

namespace App\Modules\Employee\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorate;
use App\Models\Employee;
use App\Modules\Employee\Requests\StoreEmployeeRequest;
use App\Modules\Employee\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Employee::class);
        $user = auth()->user();

        $query = Employee::with(['directorate', 'user', 'invitation'])
            ->withCount(['projectsAsPI', 'evaluations']);

        if ($user->isDirector() && $user->directorate_id) {
            $query->where('directorate_id', $user->directorate_id);
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('full_name', 'ilike', "%{$term}%")
                    ->orWhere('email', 'ilike', "%{$term}%")
                    ->orWhere('institutional_id', 'ilike', "%{$term}%")
                    ->orWhere('position', 'ilike', "%{$term}%");
            });
        }

        if ($request->filled('directorate_id')) {
            $query->where('directorate_id', $request->directorate_id);
        }

        if ($request->filled('role')) {
            $query->where('system_role', $request->role);
        }

        $employees = $query->orderBy('full_name')->paginate(25)->withQueryString();
        $directorates = $user->isAdmin() ? Directorate::orderBy('name')->get() : collect();

        return view('employees.index', compact('employees', 'directorates'));
    }

    public function create()
    {
        $this->authorize('create', Employee::class);
        $directorates = Directorate::orderBy('name')->get();

        return view('employees.create', compact('directorates'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $this->employeeService->createEmployee($request->validated());

        $needsInvite = in_array($request->system_role, ['director', 'evaluator']);
        $msg = 'Employee registered successfully.'
            .($needsInvite ? ' A registration invitation has been queued for their email.' : '');

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);
        $directorates = Directorate::orderBy('name')->get();

        return view('employees.edit', compact('employee', 'directorates'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $this->employeeService->updateEmployee($employee, $request->validated());

        $needsInvite = in_array($request->system_role, ['director', 'evaluator']) && ! $employee->user;
        $msg = 'Employee information updated.'
            .($needsInvite ? ' A registration invitation has been queued for their email.' : '');

        return redirect()->route('employees.index')->with('success', $msg);
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Staff record archived. Login access has been suspended.');
    }
}
