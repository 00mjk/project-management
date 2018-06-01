@extends('layouts.main')

@section('title', 'Persons list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">Persons</h1>

    <p><a href="{{ route('person.trashed') }}" role="button" class="btn btn-primary">View deleted persons</a></p>

    <table id="persons" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persons as $person)
                <tr class="@if($person->deleted_at) table-danger @endif">
                    <td>{{ $person->id }}</td>
                    <td><a href="{{ route('person.show', $person) }}">{{ $person->name }}</a></td>
                    <td>{{ $person->created_at }}</td>
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
            $('#persons').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection