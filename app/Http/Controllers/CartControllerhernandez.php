<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartControllerhernandez extends Controller
{
    public function update()
    {
    	$cart=auth()->user()->cart;
    	$cart->status='Pending';
    	$cart->save();

    	$notification='El pedido se ha registrado con exito. Te contaremos vìa email!.';
    	return back()->with(compact('notification'));
    
    }
}
