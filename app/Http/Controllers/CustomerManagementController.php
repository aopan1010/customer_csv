<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvCustomer;

class CustomerManagementController extends Controller
{
    public function index(Request $request)
    {
        $area = $request->input('area');
        $search = $request->input('search');



        //エリアかつ日付が入っていれば両方でソート
        if (!empty($search) && !empty($request['from']) && !empty($request['until'])) {
            $date = CsvCustomer::getDate($request['from'], $request['until']);
            $customers = $date->where('area', $area)->where('customer_name',  'like', $search);
        } elseif ($area === NULL) {
            $customers = CsvCustomer::getDate($request['from'], $request['until']);
        } elseif (empty($search)) {
            $customers = CsvCustomer::getDate($request['from'], $request['until'])->where('area', $area);
        }

        //取得したデータをviewに渡す

        return view('customer', [
            "customers" => $customers,
            "from" => $request['from'],
            "until" => $request['until'],
            "area" => $area,
            "search" => $search,
        ]);
    }

    public function check(Request $request) //訪店と訪店予定日の保存
    {

        $checks =  $request->input('check');
        $visits = $request->input('scheduled_to_visit');

        foreach ($checks as $key => $check) {
            $store = CsvCustomer::where('id', "=", "$key")->first();

            $store->check = $check;
            $store->timestamps = true;
            $store->save();
        }

        foreach ($visits as $key => $visit) {
            $store = CsvCustomer::where('id', "=", "$key")->first();

            $store->scheduled_visit_date = $visit;
            $store->timestamps = false;
            $store->save();
        }



        return redirect()->action('customerManagementController@index')->with(
            'flash_message',
            '訪店を登録しました',
        );
    }
}
