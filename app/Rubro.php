<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Rubro extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public $timestamps = false;

    //mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
