@extends('layouts.main')

@section('title', 'Projects list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">Projects</h1>

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
                <tr class="@if($project->deleted_at) table-danger @endif">
                    <td>{{ $project->id }}</td>
                    <td><a href="{{ route('project.show', $project) }}">{{ $project->name }}</a></td>
                    <td>{{ $project->client->name }}</td>
                    <td>{{ $project->manager->name }}</td>
                    <td>{{ $project->product_owner->name }}</td>
                    <td>{{ $project->technical_leader->name }}</td>
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