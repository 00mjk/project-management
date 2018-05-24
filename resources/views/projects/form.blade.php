@csrf

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="name">Name</label>
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="description">Description</label>
            {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="client_name">Client</label>
            {{ Form::text('client_name', null, ['id' => 'client_name', 'class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="project_manager">Project manager</label>
            {{ Form::text('project_manager', null, ['id' => 'project_manager', 'class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="product_owner">Product owner</label>
            {{ Form::text('product_owner', null, ['id' => 'product_owner', 'class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="technical_leader">Technical leader</label>
            {{ Form::text('technical_leader', null, ['id' => 'technical_leader', 'class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="urls">URLs</label>
            {{ Form::textarea('urls', null, ['id' => 'urls', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="source_code">Source code</label>
            {{ Form::textarea('source_code', null, ['id' => 'source_code', 'class' => 'form-control', 'rows' => 2]) }}
        </div>
    </div>
</div>