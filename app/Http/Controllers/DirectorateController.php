<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class DirectorateController extends Controller
{
    public function index()
    {
        $directorates = Directorate::all();
        $stats = [
            'directorates' => $directorates->count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('directorates.index', compact('directorates', 'stats'));
    }

    public function create()
    {
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('directorates.create', compact('stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:directorates|max:255',
        ]);

        Directorate::create($validated);

        return redirect()->route('directorates.index')->with('success', 'Directorate registered successfully.');
    }

    public function edit(Directorate $directorate)
    {
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('directorates.edit', compact('directorate', 'stats'));
    }

    public function update(Request $request, Directorate $directorate)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:directorates,name,' . $directorate->id . '|max:255',
        ]);

        $directorate->update($validated);

        return redirect()->route('directorates.index')->with('success', 'Directorate updated successfully.');
    }

    public function destroy(Directorate $directorate)
    {
        $directorate->delete();
        return redirect()->route('directorates.index')->with('success', 'Directorate deleted successfully.');
    }
}
