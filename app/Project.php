<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'description',
        'client_id',
        'project_manager_id',
        'product_owner_id',
        'technical_leader_id',
        'urls',
        'source_code'
    ];

    public function client()
    {
        return $this->belongsTo('App\Person', 'client_id');
    }

    public function manager()
    {
        return $this->belongsTo('App\Person', 'project_manager_id');
    }

    public function product_owner()
    {
        return $this->belongsTo('App\Person', 'product_owner_id');
    }

    public function technical_leader()
    {
        return $this->belongsTo('App\Person', 'technical_leader_id');
    }

    public function getUrlsListAttribute()
    {
        return $this->urls? explode("\n", $this->urls) : [];
    }

    public function getSourceCodeLinkAttribute()
    {
        if(starts_with($this->source_code, 'http')) {
            return sprintf('<a href="%s">%s</a>', $this->source_code, $this->source_code);
        }

        return $this->source_code;
    }
}
