<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $fillable = [
        'name',
        'description',
        'client_name',
        'project_manager',
        'product_owner',
        'technical_leader',
        'urls',
        'source_code'
    ];

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
