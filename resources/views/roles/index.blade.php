@extends('layouts.main')

@section('title', 'Roles list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">Roles</h1>

    <p><a href="{{ route('role.create') }}" role="button" class="btn btn-primary"><span class="oi oi-plus"></span> Create new role</a></p>

    <table id="roles" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td><a href="{{ route('role.show', $role) }}">{{ $role->name }}</a></td>
                    <td>{{ $role->created_at }}</td>
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
            $('#roles').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection