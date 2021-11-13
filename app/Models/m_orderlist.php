<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_orderlist extends Model {

    use HasFactory;

    protected $table = 'orderlist';
    protected $fillable = [
        'id_user',
        'orderid',
        'orderdate',
        'customername',
        'totalprice',
    ];

}
