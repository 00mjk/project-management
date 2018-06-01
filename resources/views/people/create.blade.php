@extends('layouts.main')

@section('title', 'Create new person')

@section('content')

    <h1>Create new person</h1>

    {{ Form::open(['route' => 'person.store']) }}

        <div class="form-group">
            <label for="name">Name</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
        </div>

        <p class="text-right"><button type="submit" id="create" class="btn btn-primary">Create new person</button></p>

    {{ Form::close() }}

@endsection