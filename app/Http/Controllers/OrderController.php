<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexOnGoing()
    {
        return view('order/index');
    }
}
