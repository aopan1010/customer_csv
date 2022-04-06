<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\CsvCustomer;
use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;



class UploadController extends Controller
{

  // 一覧表示処理
  public function index(Request $request)
  {
    return view('import');
  }




  public function upload(Request $request)
  {
    //バリデーション
    $validate = Validator::make($request->all(), [
      'csv' => 'required',
      'area' => 'required',

    ]);

    if ($validate->fails()) {
      return redirect()->route("index_import")->withErrors($validate->messages());
    }
    //インポート処理
    $area = $_POST['area'];



    //CSVファイル保存
    $tmpName = mt_rand() . "." . $request->file('csv')->guessExtension();
    $request->file('csv')->move(public_path() . "/csv/tmp", $tmpName);
    $tmpPath = public_path() . "/csv/tmp/" . $tmpName;

    //Goodby CSVのconfig設定
    $config = new LexerConfig();
    $interpreter = new Interpreter();
    $lexer = new Lexer($config);

    $interpreter = new Interpreter();
    $interpreter->unstrict();

    //CharsetをUTF-8に変換、CSVのヘッダー行を無視
    $config->setToCharset("UTF-8");
    $config->setFromCharset("sjis-win");
    $config->setIgnoreHeaderLine(true);


    $dataList = [];

    // 新規Observerとして、$dataList配列に値を代入
    $interpreter->addObserver(function (array $row) use (&$dataList) {
      // 各列のデータを取得
      $dataList[] = $row;
    });



    // CSVデータをパース
    $lexer->parse($tmpPath, $interpreter);

    // TMPファイル削除
    unlink($tmpPath);




    // 登録処理
    //customer_name or customer_codeが見つからない、もしくは拡張子がCSV出ない場合はCSVファイルの場合リダイレクトでエラーメッセを飛ばす

    $count = 0;
    foreach ($dataList as $row) {
      CsvCustomer::create(['customer_name' => $row[5], 'customer_code' => $row[4], 'area' => $area,]);
      $count++;
    }

    return redirect()->action('UploadController@index')->with('flash_message', $count . '件の顧客を登録しました');
  }
}
