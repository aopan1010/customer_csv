<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerManagementController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function sort(Request $request)
    {
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $date = Date::getDate($request['from'], $request['until']);
        } else {
            //リクエストデータがなければそのままで表示
            $date = Date::get();
        }

        //取得したデータをviewに渡す
        return view('customer', [
            "date" => $date
        ]);
    }
}


//↑未完成
