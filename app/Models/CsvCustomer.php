<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class CsvCustomer extends Model
{
    use SoftDeletes;
    use Sortable; // 追加
    protected $connection = 'mysql';
    protected $table = 'customers';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'customer_name',
        'customer_code',
        'area',
        'check',
        'memo',
    ];

    public $sortable = [
        'area',
        'updated_at',
    ];


    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function getDate($from, $until)
    {
        $date = CsvCustomer::whereBetween('created_at', [$from, $until])->get();
        return $date;
    }
}
