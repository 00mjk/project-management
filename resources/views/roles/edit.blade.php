@extends('layouts.main')

@section('title', 'Editing ' . $role->name)

@section('content')

    <h1>Editing role {{ $role->name }}</h1>

    {{ Form::model($role, ['method' => 'put', 'route' => ['role.update', $role]]) }}

        @csrf

        <div class="form-group">
            <label for="name">Name *</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => true]) }}
        </div>

        <p class="text-right"><button type="submit" id="update" class="btn btn-primary">Update role</button></p>

    {{ Form::close() }}

@endsection