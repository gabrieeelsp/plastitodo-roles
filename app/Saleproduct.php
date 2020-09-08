<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Saleproduct extends Model
{
    protected $fillable = [
        'stockproduct_id', 'name', 'slug', 'rel_stock_venta', 'porc_min', 'porc_may', 'barcode', 'web_enable', 'enable'
    ];

    public $timestamps = false;

    //mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function stockproduct()
    {
        return $this->belongsTo(Stockproduct::class);
    }

    public function getCosto()
    {   
        return round($this->stockproduct->costo * $this->rel_stock_venta, 4);
    }
}
