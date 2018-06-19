@extends('layouts.main')

@section('title', 'Projects list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">Projects</h1>

    <p><a href="{{ route('project.trashed') }}" role="button" class="btn btn-info"><span class="oi oi-trash"></span> View deleted</a> <a href="{{ route('project.create') }}" role="button" class="btn btn-primary"><span class="oi oi-plus"></span> Create new project</a></p>

    <table id="projects" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Client</th>
                <th>Project manager</th>
                <th>Project owner</th>
                <th>Technical leader</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td><a href="{{ route('project.show', $project) }}">{{ $project->name }}</a></td>
                    <td>{{ optional($project->client)->name }}</td>
                    <td>{{ optional($project->manager)->name }}</td>
                    <td>{{ optional($project->product_owner)->name }}</td>
                    <td>{{ optional($project->technical_leader)->name }}</td>
                    <td>{{ $project->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script>
        $(document).ready( function () {
            $('#projects').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection