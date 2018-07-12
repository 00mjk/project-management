@extends('layouts.main')

@section('title', 'Editing ' . $person->name)

@section('content')

    <h1>Editing person {{ $person->name }}</h1>

    {{ Form::model($person, ['method' => 'put', 'route' => ['person.update', $person]]) }}

        @csrf

        <div class="form-group">
            <label for="name">Name *</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => true]) }}
        </div>

        <div class="form-group">
            <label for="email">E-mail address</label>
            {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Select role...']) }}
        </div>

        <p class="text-right"><button type="submit" id="update" class="btn btn-primary">Update person</button></p>

    {{ Form::close() }}

@endsection