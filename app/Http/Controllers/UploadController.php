<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Models\CsvCustomer;
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

  //インポート処理
  public function upload(Request $request)
  {
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
    $config->setIgnoreHeaderLine(false);


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
    $count = 0;
    foreach ($dataList as $row) {
      CsvCustomer::insert(['customer_name' => $row[5], 'cutomer_code' => $row[4]]);
      $count++;
    }

    return redirect()->action('UploadController@index')->with('flash_message', $count . '件の顧客を登録しました！');
  }
}
