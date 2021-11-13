<?php

namespace App\Http\Controllers\admin;

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
        $orderListData = m_orderlist::where('id_user', Auth::id())->get(); // Auth::user()->id
        //dd($orderListData);
        return view('admin.orderlist', [
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
        return view('admin.orderlist', [
            'orderListData' => $orderListData
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

    public function save(Request $request)
    {
        // jika order entry tidak ada -> back with error message.
        $jumlahorder = m_orderentry::where('id_orderlist', $request->id_orderlist)->count();
        if ($jumlahorder == 0)
        {
            return redirect()->back()->withErrors('Product/Item tidak boleh kosong, harap tambahkan product terlebih dahulu.');
        }

        // get total price dari orderentry
        $totalprice = m_orderentry::where('id_orderlist', $request->id_orderlist)->sum('subtotal');


        // update orderlist : date, customer name, total price
        $orderlist = m_orderlist::find($request->id_orderlist);
        $orderlist->orderdate = $request->orderdate;
        $orderlist->customername = $request->customername;
        $orderlist->totalprice = $totalprice;
        $orderlist->save();

        return redirect()->back()->with('success', 'Order list telah berhasil disimpan');
    }

    public function delete($id_orderlist)
    {
        //delete child di table orderentry
        $delentry = m_orderentry::where('id_orderlist', $id_orderlist)->delete();

        //delete orderlist
        $delorder = m_orderlist::where('id', $id_orderlist)->delete();

        return redirect()->back();
    }

}
