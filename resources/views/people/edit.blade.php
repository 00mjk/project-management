@extends('layouts.main')

@section('title', 'Editing ' . $person->name)

@section('content')

    <h1>Editing person {{ $person->name }}</h1>

    {{ Form::model($person, ['method' => 'put', 'route' => ['person.update', $person]]) }}

        @csrf

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
                    <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="role-{{ $role->id }}" name="roles[]" @if($person->roles->contains('id', $role->id)) checked="checked" @endif>
                    <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                </div>

            @endforeach
        </div>

        <p class="text-right"><button type="submit" id="update" class="btn btn-primary">Update person</button></p>

    {{ Form::close() }}

@endsection