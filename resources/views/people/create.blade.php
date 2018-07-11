@extends('layouts.main')

@section('title', 'Create new person')

@section('content')

    <h1>Create new person</h1>

    {{ Form::open(['route' => 'person.store']) }}

        <div class="form-group">
            <label for="name">Name *</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => true]) }}
        </div>

        <div class="form-group">
            <label for="email">E-mail address</label>
            {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label for="role_id">Role *</label>
            {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Select role...', 'required' => true]) }}
        </div>

        <p class="text-right"><button type="submit" id="create" class="btn btn-primary">Create new person</button></p>

    {{ Form::close() }}

@endsection