<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'division',
        'join_date',
        'email',
        'phone',
        'address',
        'postcode',
        'account_number',
        'bank_name',
    ];
}
