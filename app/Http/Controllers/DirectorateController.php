<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Http\Requests\StoreDirectorateRequest;

class DirectorateController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Directorate::class);
        $directorates = Directorate::all();
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
        $directorate->delete();
        return redirect()->route('directorates.index')->with('success', 'Directorate deleted successfully.');
    }
}
