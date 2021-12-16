<?php

namespace App\Models;

use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    protected $fillable = [
        'code',
        'name',
        'phone',
        'address',
        'logo',
    ];
}
