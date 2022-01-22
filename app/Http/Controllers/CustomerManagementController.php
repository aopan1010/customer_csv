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
        $query = CsvCustomer::query();

        //エリアかつ日付が入っていれば両方でソート
        if (isset($area) && isset($month) && isset($until)) {
            $customers = $query->where('area', $area)->whereBetween("updated_at", [$from, $until])->get();
            //$customers = $prepare->whereBetween("updated_at", [$from, $until])->all();
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

    public function check(Request $request) //チェックボックスの保存
    {

        $checks =  $request->input('check');

        var_dump($checks);
        foreach ($checks as $key => $check) {
            $store = CsvCustomer::where('id', "=", "$key")->first();

            $store->check = $check;
            $store->timestamps = false;
            $store->save();
        }

        return redirect()->action('customerManagementController@index')->with(
            'flash_message',
            '訪店を登録しました',
        );
    }
}
