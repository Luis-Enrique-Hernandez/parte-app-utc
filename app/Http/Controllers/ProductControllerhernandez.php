<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
class ProductControllerhernandez extends Controller
{
    public function index()
    {
    	$productsindex=Product::paginate(10);
    	return view('admin.products.index')->with(compact('productsindex')); //Listado
    }

    public function create()
    {
    	return view('admin.products.create'); //formularios de registro
    }

    public function store(Request $request)
    {

        // validacion de campos

       $messages = [
    'name.required' => 'Es necesario colocar un nombre para el producto.',
'name.min' => 'Es necesario colocar como minimo 3 caracteres para nombre para el producto.',
    'price.min' => 'No se admiten valores negativo.',
    'price.required' => 'Es necesario colocar un valor para el producto.',
    'price.numeric' => 'Solo se admiten numeros.',
    'description.required' => 'Es necesario colocar una breve descripcion para el producto.',
    'description.max' => 'Es necesario colocar como maximo 200 caracteres para la descripcion de producto.',    
];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|min:0|numeric'
        ];
        $this->validate($request, $rules, $messages);

    	//registrar el nuevo producto en la BD
    	$product = new Product();
    	$product->name=$request->input('name');
    	$product->description = $request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
    	
    	$product->save(); //este es el insert
    	return redirect('/admin/products');
    }


    public function edit($id)
    {
    	$productedit=Product::find($id);
    	return view('admin.products.edit')->with(compact('productedit')); //Listado; //formularios de registro
    }
    public function update(request $request, $id)
    {

        // validacion de campos

       $messages = [
    'name.required' => 'Es necesario colocar un nombre para el producto.',
'name.min' => 'Es necesario colocar como minimo 3 caracteres para nombre para el producto.',
    'price.min' => 'No se admiten valores negativo.',
    'price.required' => 'Es necesario colocar un valor para el producto.',
    'price.numeric' => 'Solo se admiten numeros.',
    'description.required' => 'Es necesario colocar una breve descripcion para el producto.',
    'description.max' => 'Es necesario colocar como maximo 200 caracteres para la descripcion de producto.',    
];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|min:0|numeric'
        ];
        $this->validate($request, $rules, $messages);

    	//registrar el nuevo producto en la BD
    	$product = Product::find($id);
    	$product->name=$request->input('name');
    	$product->description = $request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
    	
    	$product->save(); //este es el update
    	return redirect('/admin/products');

    }

    public function destroy($id)
    {
    	//registrar el nuevo producto en la BD
    	//CartDetail::where('product_id', $id)->delete();
    ProductImage::where('product_id', $id)->delete();
 
    $product = Product::find($id);
    $product->delete(); // DELETE
 
    return back();

    }
}
