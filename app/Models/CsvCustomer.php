<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CsvCustomer extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'customers';
    protected $dates = ['deleted_at'];



    protected $fillable = [
        'customer_name',
        'customer_code',
        'area',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
