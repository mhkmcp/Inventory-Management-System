<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'shopname', 'photo', 'account_name', 'bank_name', 'account_no', 'city'
    ];
}
