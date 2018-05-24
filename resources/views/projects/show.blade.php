@extends('layouts.main')

@section('title', $project->name)

@section('content')

    <h1 id="name">{{ $project->name }}</h1>

    @if($project->description)
        <p id="description">{{ $project->description }}</p>
    @endif

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item" id="client_name">Client: {{ $project->client_name }}</li>
            <li class="list-group-item" id="project_manager">Project manager: {{ $project->project_manager }}</li>
            <li class="list-group-item" id="product_owner">Product owner: {{ $project->product_owner }}</li>
            <li class="list-group-item" id=technical_leader"">Technical leader: {{ $project->technical_leader  }}</li>
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

@endsection