@extends('layouts.main')

@section('title', 'Create new role')

@section('content')

    <h1>Create new role</h1>

    {{ Form::open(['route' => 'role.store']) }}

        <div class="form-group">
            <label for="name">Name *</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => true]) }}
        </div>

        <p class="text-right"><button type="submit" id="create" class="btn btn-primary">Create new role</button></p>

    {{ Form::close() }}

@endsection