<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CsvCustomer extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'customers';

    protected $fillable = [
        'customer_name',
        'customer_code',
    ];
}
