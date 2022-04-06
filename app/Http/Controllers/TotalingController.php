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


    if (!empty($request['from']) && !empty($request['until'])) {

      foreach ($areas as $key => $value) {
        $cnt = $key;
        $date = CsvCustomer::getDate($request['from'], $request['until']);
        ${"area_count" . $cnt} = $date->where('area', $value)->count();
        ${"check_count" . $cnt} = $date->where('area', $value)->where('check', '1')->count();
        $area_counts[] = ${"area_count" . $cnt};
        $check_counts[] = ${"check_count" . $cnt};
      }
    } else {

      return view('totaling');
    }
    var_dump(${"area_count" . $cnt});
    var_dump(${"check_count" . $cnt});
    var_dump($area_counts);
    var_dump($check_counts);
    return view(
      'totaling',
      [
        "area_counts" => $area_counts,
        "check_counts" => $check_counts,

      ]
    );
  }

  public function show_columns()
  {
  }
}
