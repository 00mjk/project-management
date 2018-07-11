<?php

namespace App\Http\Controllers;

use App\Person;
use App\Project;
use App\Role;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->get();

        return view('projects.trashed', compact('projects'));
    }

    public function create()
    {
        $people = Person::all();

        return view('projects.create', compact('clients', 'people'));
    }

    public function store(Request $request)
    {
        $project = Project::create($request->only([
            'name',
            'description',
            'urls',
            'source_code'
        ]));

        $project->people()->sync($request->people);

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully created!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $people = Person::all();

        return view('projects.edit', compact('project', 'people'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->only([
            'name',
            'description',
            'urls',
            'source_code'
        ]));

        $project->people()->sync($request->people);

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully deleted!');
    }

    public function forceDelete(Project $project)
    {
        $project->forceDelete();

        return redirect()->route('project.index')
                         ->with('success', 'Project permanently deleted!');
    }

    public function restore(Project $project)
    {
        $project->restore();

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully restored!');
    }
}
