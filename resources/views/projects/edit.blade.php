@extends('layouts.main')

@section('title', 'Editing ' . $project->name)

@section('content')

    <h1>Editing project {{ $project->name }}</h1>

    {{ Form::model($project, ['method' => 'put', 'route' => ['project.update', $project]]) }}

        @csrf

        @include('projects.form')

        <p class="text-right"><button type="submit" id="update" class="btn btn-primary">Update project</button></p>

    {{ Form::close() }}
@endsection