@extends('layouts.main')

@section('title', $role->name)

@section('content')

    <h1 id="name">{{ $role->name }} <small class="text-muted">ID #{{ $role->id }}</small></h1>

    <p>Created <span title="{{ $role->created_at }}">{{ $role->created_at->diffForHumans() }}</span>. Last update <span title="{{ $role->updated_at }}">{{ $role->updated_at->diffForHumans() }}</span>.</p>

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item" id="name">Name: {{ $role->name }}</li>
        </ul>
    </div>

    <div class="text-right mt-3">
        <a class="btn btn-primary" href="{{ route('role.edit', $role) }}" role="button" >Edit person</a>
    </div>

    {{ Form::open(['route' => ['role.destroy', $role], 'method' => 'delete']) }}
        <button class="btn btn-danger" id="delete" type="submit">Delete</button>
    {{ Form::close() }}

@endsection