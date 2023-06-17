<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class FrontController extends Controller
{
    function index(){
        //$cart_count    = Cart::count();
        return view('myview',['cart_count'    => Cart::count(),]);
    }
}
