<?php

namespace App\Http\Controllers;

use App\Person;
use App\Project;
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
        $clients = Person::whereHas('roles', function($query) {
            $query->where('slug', 'client');
        })->pluck('name', 'id');

        $project_managers = Person::whereHas('roles', function($query) {
            $query->where('slug', 'project-manager');
        })->pluck('name', 'id');

        $product_owners = Person::whereHas('roles', function($query) {
            $query->where('slug', 'product-owner');
        })->pluck('name', 'id');

        $technical_leaders = Person::whereHas('roles', function($query) {
            $query->where('slug', 'technical-leader');
        })->pluck('name', 'id');

        return view('projects.create', compact('clients', 'project_managers', 'product_owners', 'technical_leaders'));
    }

    public function store(Request $request)
    {
        Project::create($request->only([
            'name',
            'description',
            'client_id',
            'project_manager_id',
            'product_owner_id',
            'technical_leader_id',
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
        $people = Person::all()->pluck('name', 'id');

        return view('projects.edit', compact('project', 'people'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->only([
            'name',
            'description',
            'client_id',
            'project_manager_id',
            'product_owner_id',
            'technical_leader_id',
            'urls',
            'source_code'
        ]));

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
