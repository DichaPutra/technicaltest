<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\m_orderlist;
use Illuminate\Support\Facades\Auth;

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

}
