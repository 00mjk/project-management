<?php

namespace App\Http\Controllers;

use App\Person;
use App\Role;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();

        return view('people.index', compact('people'));
    }

    public function trashed()
    {
        $people = Person::onlyTrashed()->get();

        return view('people.trashed', compact('people'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('people.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Person::create($request->only([
            'name',
            'email',
            'role_id'
        ]));

        return redirect()->route('person.index')
                         ->with('success', 'Person successfully created!');
    }

    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    public function edit(Person $person)
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('people.edit', compact('person', 'roles'));
    }

    public function update(Request $request, Person $person)
    {
        $person->update($request->only([
            'name',
            'email',
            'role_id'
        ]));

        return redirect()->route('person.index')
                 ->with('success', 'Person successfully updated!');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('person.index')
                         ->with('success', 'Person successfully deleted!');
    }

    public function forceDelete(Person $person)
    {
        $person->forceDelete();

        return redirect()->route('person.index')
                         ->with('success', 'Person permanently deleted!');
    }

    public function restore(Person $person)
    {
        $person->restore();

        return redirect()->route('person.index')
                         ->with('success', 'Person successfully restored!');
    }
}
