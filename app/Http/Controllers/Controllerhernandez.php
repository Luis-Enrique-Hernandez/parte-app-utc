<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class Controllerhernandez extends Controller
{
    public function welcom(){
    	$products= Product::all();
    	return view('welcome')->with(compact('products'));
    }
}
