<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class Controllerhernandez extends Controller
{
    public function welcom(){
    	$products= Product::paginate(8);
    	return view('welcome')->with(compact('products'));
    }
}
