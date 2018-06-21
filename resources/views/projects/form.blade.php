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
            <label for="client_id">Client</label>
            {{
                Form::select('client_id', $clients, null, [
                    'id' => 'client_id',
                    'class' => 'custom-select',
                    'placeholder' => 'Select a client...'
                ])
            }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="project_manager_id">Project manager</label>
            {{
                Form::select('project_manager_id', $project_managers, null, [
                    'id' => 'project_manager_id',
                    'class' => 'custom-select',
                    'placeholder' => 'Select a project manager...'
                ])
            }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="product_owner_id">Product owner</label>
            {{
                Form::select('product_owner_id', $product_owners, null, [
                    'id' => 'product_owner_id',
                    'class' => 'custom-select',
                    'placeholder' => 'Select a product owner...'
                ])
            }}
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="technical_leader_id">Technical leader</label>
            {{
                Form::select('technical_leader_id', $technical_leaders, null, [
                    'id' => 'technical_leader_id',
                    'class' => 'custom-select',
                    'placeholder' => 'Select a technical leader...'
                ])
            }}
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