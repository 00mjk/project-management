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
            <li class="list-group-item" id="people">
                Team:
                @if(!$project->people->isEmpty())
                    <ul>
                        @foreach($project->people as $person)
                            <li>{{ $person->name }} ({{ $person->role->name }})</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">(empty)</span>
                @endif
            </li>
            <li class="list-group-item" id="urls">
                URLs:
                @if($project->urls)
                    <ul>
                        @foreach($project->urls_list as $url)
                            <li><a href="{{ $url }}">{{ $url }}</a></li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">(empty)</span>
                @endif
            </li>
            <li class="list-group-item" id="source_code">
                Source code:
                @if($project->source_code_links)
                    <ul>
                        @foreach($project->source_code_links as $link)
                            <li>{!! $link !!}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">(empty)</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="text-right mt-3">
        <a class="btn btn-primary" href="{{ route('project.edit', $project) }}" role="button" >Edit project</a>
    </div>

    @if(!$project->trashed())
        {{ Form::open(['route' => ['project.destroy', $project], 'method' => 'delete']) }}
            <button class="btn btn-danger" id="delete" type="submit">Delete</button>
        {{ Form::close() }}
    @else
        {{ Form::open(['route' => ['project.restore', $project], 'method' => 'put']) }}
            <button class="btn btn-success" id="restore" type="submit">Restore</button>
        {{ Form::close() }}

        {{ Form::open(['route' => ['project.force_delete', $project], 'method' => 'delete', 'class' => 'mt-3']) }}
            <button class="btn btn-danger" id="foce_delete" type="submit">Delete permanently </button>
        {{ Form::close() }}
    @endif

@endsection