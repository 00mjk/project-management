@csrf

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="name">Name</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
        <div class="form-group">
            <label for="urls">URLs</label>
            {{ Form::textarea('urls', null, ['id' => 'urls', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
        <div class="form-group">
            <label for="source_code">Source code</label>
            {{ Form::textarea('source_code', null, ['id' => 'source_code', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label>Team</label>
            @foreach($people as $person)
                <div class="form-check">
                    {{ Form::checkbox('people[]', $person->id, null, ['id' => 'person-' . $person->id, 'class' => 'form-check-input']) }}
                    <label class="form-check-label" for="person-{{ $person->id }}">{{ $person->name }} ({{ $person->role->name }})</label>
                </div>
            @endforeach
        </div>
    </div>
</div>