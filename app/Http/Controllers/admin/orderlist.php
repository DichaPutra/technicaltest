<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_orderlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderlist extends Controller {

    public function index()
    {
        //data orderlist by id user
        $orderListData = m_orderlist::where('id_user', Auth::id())->get(); // Auth::user()->id
        //dd($orderListData);
        return view('admin.orderlist', [
            'orderListData' => $orderListData,
            'x' => "1"
        ]);
    }

    public function add()
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

}
