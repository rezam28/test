<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Contracts\DataTable;
use App\Model\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::all();
        if ($request->ajax()) {
            $data = Customer::all();
            return DataTables::of($data)->make(true);
        }
        // return DataTables::of($customer)->make(true);
        return view('customer',compact('customer',$customer));
    }

    public function postCustomer(Request $request)
    {
        $post = Customer::updateOrCreate(['id' => $request->customer_id],
            [   
                'nama_' => $request->nama,
                'alamat' => $request->alamat,
                'lat' => $request->latitude,
                'long' => $request->longitude,
                'ttl' => $request->datepicker,
            ]);        
        return response()->json($post);
    }
}
