<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvCustomer;

class CustomerManagementController extends Controller
{
    public function index()

    {
        $customers = \App\Models\CsvCustomer::select('customer_name', 'customer_code', 'area')->get();    // データ取得できる


        //取得したデータをviewに渡す
        return view('customer', [
            "customers" => $customers
        ]);
        return view('customer');
    }

    public function search(Request $request)
    {
    }
}


//↑未完成
