<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    Protected $fillable = ['nama','slug'];
    Public $timestamps = true;

    public function artikel()
    {
        return $this->belongsToMany('App\Artikel', 'artikel_tags', 'tag_id', 'artikel_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
