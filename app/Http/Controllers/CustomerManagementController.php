<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvCustomer;
use PhpParser\Node\Expr\Isset_;
use Carbon\Carbon;

class CustomerManagementController extends Controller
{
    public function index(Request $request)
    {


        $area = $request->input('area');
        $from = $request->input('from');
        $until = $request->input('until');
        $query = \App\Models\CsvCustomer::query();

        //エリアかつ日付が入っていれば両方でソート
        if (isset($area) && isset($month) && isset($until)) {
            $prepare = $query->where('area', $area)->get();
            $customers = $prepare->whereBetween("updated_at", [$from, $until])->all();
        } elseif (isset($area)) {
            $customers = $query->where('area', $area)->get();
        }
        $customers = $query->get();
        //取得したデータをviewに渡す
        return view('customer', [
            "customers" => $customers,
        ]);
    }

    public function check() //チェックボックスの保存
    {

        $checks = $_POST['check'];

        foreach ($checks as $key => $check) {
            $store = \App\Models\CsvCustomer::where('id', "=", "$key")->first();
            if ($store->check) {
                $store->check = null;
                $store->timestamps = false;
                $store->save();
            } else {
                $store->check = $check;
                $store->timestamps = false;
                $store->save();
            }
        }
        //ここにCsvCustomerテーブルのcheckカラムの情報を変数に代入しviewに戻らせる処理を書く

        return redirect()->action('customerManagementController@index')->with(
            'flash_message',
            '訪店を登録しました',
        );
    }
}
