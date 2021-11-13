<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_orderlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderentry extends Controller {

    public function index()
    {
        //generate order ID
        $statement = DB::select("SHOW TABLE STATUS LIKE 'orderlist'");
        $nextId = $statement[0]->Auto_increment;
        $orderid = date('Y') . date('m') . str_pad($nextId, 4, "0", STR_PAD_LEFT);

        // insert orderlist generate Order ID di awal
        $orderlist = new m_orderlist;
        $orderlist->id_user = Auth::id();
        $orderlist->orderid = $orderid;
        $orderlist->save();

        //view order entry
        return redirect()->route('admin.orderentry.view', $orderid);
    }

    public function view($orderid)
    {
        // get order data
        $orderlist = m_orderlist::where('orderid', $orderid)->first();
        //view order entry
        return view('admin.orderentry', [
            'orderlist' => $orderlist
        ]);
    }

}
