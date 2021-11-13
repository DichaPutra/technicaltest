<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderentry extends Model {

    use HasFactory;

    protected $fillable = [
        'id_orderlist',
        'id_product',
        'productname',
        'unitprice',
        'qty',
        'subtotal',
    ];

}
