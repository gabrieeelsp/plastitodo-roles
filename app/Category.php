<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'rubro_id', 'name', 'slug', 'web_enable'
    ];

    public $timestamps = false;

    //mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
