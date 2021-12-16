<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'unit',
        'capital_price',
        'price',
        'reseller_price',
        'stock',
        'description',
        'category_id',
        'material',
        'color',
        'laminate',
        'length',
        'width',
        'height',
        'weight',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function rack()
    {
        return $this->hasMany('App\Models\Rack');
    }
}
