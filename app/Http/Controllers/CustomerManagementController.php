<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvCustomer;


class CustomerManagementController extends Controller
{
    public function index()
    {
        $customers = \App\Models\CsvCustomer::select('id', 'customer_name', 'customer_code', 'area', 'check', 'created_at')->paginate(100);    // データ取得

        //取得したデータをviewに渡す
        return view('customer', [
            "customers" => $customers
        ]);
        return view('customer');
    }

    public function search(Request $request)
    {
        //実装未定
    }
}
