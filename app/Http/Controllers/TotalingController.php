<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CsvCustomer;
use Illuminate\Http\Request;

class TotalingController extends Controller
{

  //エリアかつ日付が入っていれば両方でソート


  public function index(Request $request)
  {

    $areas = array('1' => '名古屋中心部', '2' => '名古屋北部', '3' => '名古屋南部', '4' => '三河', '5' => '岐阜三重尾張', '6' => '土肥さん',);
    $cnt = 0;
    $array = array();

    if (!empty($request['from']) && !empty($request['until'])) {
      $from = $request['from'];
      $until = $request['until'];
      foreach ($areas as $key => $value) {
        $cnt = $key;
        $date = CsvCustomer::getDate($request['from'], $request['until']);
        ${"area_count" . $cnt} = $date->where('area', $value)->count();
        ${"check_count" . $cnt} = $date->where('area', $value)->where('check', '1')->count();
      }
      $array = array(
        '名古屋中心部' => [${"area_count" . 1}, ${"check_count" . 1}],
        '名古屋北部' => [${"area_count" . 2}, ${"check_count" . 2}],
        '名古屋南部' => [${"area_count" . 3}, ${"check_count" . 3}],
        '三河' => [${"area_count" . 4}, ${"check_count" . 4}],
        '岐阜三重尾張' => [${"area_count" . 5}, ${"check_count" . 5}],
        '土肥さん' => [${"area_count" . 6}, ${"check_count" . 6}],

      );
    } else {

      return view('totaling');
    }



    return view(
      'totaling',
      [
        'array' => $array,
        "from" => $from,
        "until" => $until,

      ]
    );
  }

  public function show_columns()
  {
  }
}
