<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','type','photo','shop','account_name','account_no','bank_name','city'
    ];
}
