@extends('layouts.main')

@section('title', 'Create new project')

@section('content')

    <h1>Create new project</h1>

    {{ Form::open(['route' => 'project.store']) }}

        @include('projects.form')

        <p class="text-right"><button type="submit" id="create" class="btn btn-primary">Create new project</button></p>

    {{ Form::close() }}

@endsection