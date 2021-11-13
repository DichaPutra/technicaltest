<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_orderlist;
use App\Models\m_orderentry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderlist extends Controller {

    public function index()
    {
        //data orderlist by id user
        $orderListData = m_orderlist::all(); // Auth::user()->id
        //dd($orderListData);
        return view('user.orderlist', [
            'orderListData' => $orderListData
        ]);
    }

    public function search(Request $request)
    {
        if ($request->orderid == null)
        {
            $orderListData = m_orderlist::where('customername', 'LIKE', '%' . $request->customername . '%')->get();
        }
        elseif ($request->customername == null)
        {
            $orderListData = m_orderlist::where('orderid', 'LIKE', '%' . $request->orderid . '%')->get();
        }
        else
        {
            $orderListData = m_orderlist::where('orderid', 'LIKE', '%' . $request->orderid . '%')->where('customername', 'LIKE', '%' . $request->customername . '%')->get();
        }
        return view('user.orderlist', [
            'orderListData' => $orderListData
        ]);
    }

}
