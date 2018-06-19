@extends('layouts.main')

@section('title', $project->name)

@section('content')

    <h1 id="name">{{ $project->name }} <small class="text-muted">ID #{{ $project->id }}</small></h1>

    <p>Created <span title="{{ $project->created_at }}">{{ $project->created_at->diffForHumans() }}</span>. Last update <span title="{{ $project->updated_at }}">{{ $project->updated_at->diffForHumans() }}</span>.</p>

    @if($project->description)
        <p id="description">{{ $project->description }}</p>
    @endif

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item" id="client_name">Client: {{ optional($project->client)->name }}</li>
            <li class="list-group-item" id="project_manager">Project manager: {{ optional($project->manager)->name }}</li>
            <li class="list-group-item" id="product_owner">Product owner: {{ optional($project->product_owner)->name }}</li>
            <li class="list-group-item" id=technical_leader>Technical leader: {{ optional($project->technical_leader)->name  }}</li>
            <li class="list-group-item" id="urls">
                URLs:
                <ul>
                    @foreach($project->urls_list as $url)
                        <li><a href="{{ $url }}">{{ $url }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="list-group-item" id="source_code">
                Source code: {!! $project->source_code_link !!}
            </li>
        </ul>
    </div>

    <div class="text-right mt-3">
        <a class="btn btn-primary" href="{{ route('project.edit', $project) }}" role="button" >Edit project</a>
    </div>

    {{ Form::open(['route' => ['project.destroy', $project], 'method' => 'delete']) }}
        <button class="btn btn-danger" id="delete" type="submit">Delete</button>
    {{ Form::close() }}

@endsection