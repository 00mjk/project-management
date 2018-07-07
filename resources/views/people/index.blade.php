@extends('layouts.main')

@section('title', 'People list')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-3">People</h1>

    <p><a href="{{ route('person.trashed') }}" role="button" class="btn btn-info"><span class="oi oi-trash"></span> View deleted</a> <a href="{{ route('person.create') }}" role="button" class="btn btn-primary"><span class="oi oi-plus"></span> Create new person</a></p>

    <table id="people" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail address</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td><a href="{{ route('person.show', $person) }}">{{ $person->name }}</a></td>
                    @include('components.td', ['value' => $person->email])
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
            $('#people').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection