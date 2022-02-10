<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CsvCustomer;

class Date extends Model
{
    public static function getDate($from, $until)
    {
        //created_atが20xx/xx/xx ~ 20xx/xx/xxのデータを取得
        $date = CsvCustomer::whereBetween("created_at", [$from, $until])->get();

        return $date;
    }
}
