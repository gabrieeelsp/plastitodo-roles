<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Stockproduct extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'costo', 'stock', 'web_enable', 'enable'
    ];

    public $timestamps = false;

    //mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
