<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_orderlist;
use App\Models\m_orderentry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderentry extends Controller {

    public function view($orderid)
    {
        // get order data
        $orderlist = m_orderlist::where('orderid', $orderid)->first();
        $orderentry = m_orderentry::where('orderid', $orderid)->get();

        //view order entry
        return view('user.orderentry', [
            'orderlist' => $orderlist,
            'orderentry' => $orderentry
        ]);
    }

}
