@extends('layouts.main')

@section('title', 'People list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">Deleted people</h1>

    <table id="people" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Deleted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr class="@if($person->deleted_at) table-danger @endif">
                    <td>{{ $person->id }}</td>
                    <td><a href="{{ route('person.show', $person) }}">{{ $person->name }}</a></td>
                    <td>{{ $person->created_at }}</td>
                    <td>{{ $person->deleted_at }}</td>
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
            $('#people').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection