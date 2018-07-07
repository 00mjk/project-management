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

    public function getClientNameAttribute()
    {
        return $this->client? $this->client->name : '(empty)';
    }

    public function getUrlsListAttribute()
    {
        return $this->explode($this->url);
    }

    public function getSourceCodeLinksAttribute()
    {
        $urls = $this->explode($this->source_code);

        foreach ($urls as $i => $url) {
            if(starts_with($url, 'http')) {
                $urls[$i] = sprintf('<a href="%s">%s</a>', $url, $url);
            }
        }

        return $urls;
    }

    public function explode($value)
    {
        return $value? explode("\n", $value) : [];
    }
}
