<?php

namespace App\Http\Controllers\admin;

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
        return view('admin.orderentry', [
            'orderlist' => $orderlist,
            'orderentry' => $orderentry
        ]);
    }

    public function add(Request $request)
    {
        // tambahkan list di tabel orderentry
        $orderentry = new m_orderentry;
        $orderentry->id_orderlist = $request->id_orderlist;
        $orderentry->id_product = $request->id_product;
        $orderentry->orderid = $request->orderid;
        $orderentry->productname = $request->productname;
        $orderentry->unitprice = $request->unitprice;
        $orderentry->qty = $request->qty;
        $orderentry->subtotal = $request->unitprice * $request->qty;
        $orderentry->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        m_orderentry::where('id', $id)->delete();
        return redirect()->back();
    }



}
