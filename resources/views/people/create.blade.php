@extends('layouts.main')

@section('title', 'Create new person')

@section('content')

    <h1>Create new person</h1>

    {{ Form::open(['route' => 'person.store']) }}

        <div class="form-group">
            <label for="name">Name</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label for="email">E-mail address</label>
            {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label>Roles</label>

            @foreach($roles as $role)

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="role-{{ $role->id }}" name="roles[]">
                    <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                </div>

            @endforeach
        </div>

        <p class="text-right"><button type="submit" id="create" class="btn btn-primary">Create new person</button></p>

    {{ Form::close() }}

@endsection