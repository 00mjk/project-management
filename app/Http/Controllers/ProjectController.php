<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Project::create($request->only([
            'name',
            'description',
            'client_name',
            'project_manager',
            'product_owner',
            'technical_leader',
            'urls',
            'source_code'
        ]));

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully created!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->only([
            'name',
            'description',
            'client_name',
            'project_manager',
            'product_owner',
            'technical_leader',
            'urls',
            'source_code'
        ]));

        return redirect()->route('project.index')
                         ->with('success', 'Project successfully updated!');
    }
}
