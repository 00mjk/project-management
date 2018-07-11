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
        'urls',
        'source_code'
    ];

    public function people()
    {
        return $this->belongsToMany('App\Person');
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
