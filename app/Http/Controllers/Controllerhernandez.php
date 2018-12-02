<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class Controllerhernandez extends Controller
{
    public function welcom(){
    	$categoriesls= Category::has('products')->get();
    	return view('welcome')->with(compact('categoriesls'));
    }
}
