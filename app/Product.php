<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'product_name', 'cat_id', 'sup_id','product_code','product_garage','product_route','product_image','buy_date','expire_date','buying_price','selling_price'
    ];
}
