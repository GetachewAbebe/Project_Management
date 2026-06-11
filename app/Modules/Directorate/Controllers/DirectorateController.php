<?php

namespace App\Modules\Directorate\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Modules\Directorate\Requests\StoreDirectorateRequest;

class DirectorateController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Directorate::class);
        $directorates = Directorate::withCount(['employees', 'projects'])->get();

        return view('directorates.index', compact('directorates'));
    }

    public function create()
    {
        $this->authorize('create', Directorate::class);

        return view('directorates.create');
    }

    public function store(StoreDirectorateRequest $request)
    {
        $this->authorize('create', Directorate::class);
        Directorate::create($request->validated());

        return redirect()->route('directorates.index')->with('success', 'Directorate registered successfully.');
    }

    public function edit(Directorate $directorate)
    {
        $this->authorize('update', $directorate);

        return view('directorates.edit', compact('directorate'));
    }

    public function update(StoreDirectorateRequest $request, Directorate $directorate)
    {
        $this->authorize('update', $directorate);
        $directorate->update($request->validated());

        return redirect()->route('directorates.index')->with('success', 'Directorate updated successfully.');
    }

    public function destroy(Directorate $directorate)
    {
        $this->authorize('delete', $directorate);

        $employeeCount = Employee::where('directorate_id', $directorate->id)->count();
        $projectCount = Project::where('directorate_id', $directorate->id)->count();

        if ($employeeCount > 0 || $projectCount > 0) {
            return redirect()->route('directorates.index')->with(
                'error',
                "Cannot delete \"{$directorate->name}\": it has {$employeeCount} employee(s) and {$projectCount} project(s). Reassign or remove them first."
            );
        }

        $directorate->delete();

        return redirect()->route('directorates.index')->with('success', 'Directorate deleted successfully.');
    }
}
