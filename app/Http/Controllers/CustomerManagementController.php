<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvCustomer;
use App\Models\Date;
use PhpParser\Node\Expr\Isset_;
use Carbon\Carbon;

class CustomerManagementController extends Controller
{
    public function index(Request $request)
    {


        $area = $request->input('area');
        $date = $request->input('search_date');

        $query = CsvCustomer::query();


        //エリアかつ日付が入っていれば両方でソート
        if (isset($area) && isset($date)) {
            $query = Csvcustomer::whereDate('created_at', $date)->get(); //エラー発生中
            $customers = $query->where('area', $area)->get();
        } elseif (isset($area)) {
            $customers = $query->where('area', $area)->get();
        } else {
            $customers = $query->get();
        }
        //取得したデータをviewに渡す
        return view('customer', [
            "customers" => $customers,
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
