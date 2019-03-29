<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class singlePageController extends Controller
{
    public function singlepageproductinfo(){

    		return view('front-end.singlepageprduct.singlepage');
    }
}
