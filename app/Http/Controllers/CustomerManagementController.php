<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerManagementController extends Controller
{
    public function index()
    {
        return view('customer');
    }
}
