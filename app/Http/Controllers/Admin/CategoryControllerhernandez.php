<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use File;
class CategoryControllerhernandez extends Controller
{
    public function index()
    {
    	$categoriesindex=Category::orderBy('id','ASC')->paginate(5);
    	return view('admin.categories.index')->with(compact('categoriesindex')); //Listado
    }
    public function create()
    {
    	return view('admin.categories.create'); //formularios de registro
    }
    public function store(Request $request)
    {

        // validacion de campos

       
        $this->validate($request, Category::$rules, Category::$messages);

    	//registrar el nuevo producto en la BD
    	$categoryIm=Category::create($request->only('name', 'description')); 
        if ($request->hasFile('image')) {
            //guardar la img en nuestro proyecto
        $file=$request->file('image');
        $path=public_path() . '/images/categories';
        $fileName=uniqid() . '-' . $file->getClientOriginalName();
        $moved=$file->move($path, $fileName);

        //Crear 1 registro en la tabla Product_images
        if ($moved) {
            $categoryIm->image=$fileName;
            //$productImage->featured=false;
            $categoryIm->save();  //inserta
        }
        }
    	return redirect('/admin/categories');
    }

    public function edit( Category $categoryedit)
    {
    	
    	return view('admin.categories.edit')->with(compact('categoryedit')); //Listado; //formularios de registro
    }
    public function update(request $request, Category $categoryedit)
    {

        // validacion de campos

       
        $this->validate($request, Category::$rules, Category::$messages);

    	//registrar el nuevo producto en la BD
    	$categoryedit->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            //guardar la img en nuestro proyecto
        $file=$request->file('image');
        $path=public_path() . '/images/categories';
        $fileName=uniqid() . '-' . $file->getClientOriginalName();
        $moved=$file->move($path, $fileName);

        //Crear 1 registro en la tabla Product_images
        if ($moved) {
            $previousPath=$path. '/' . $categoryedit->image;
            $categoryedit->image=$fileName;
            //$productImage->featured=false;
            $saved=$categoryedit->save();  //inserta

            if ($saved) {
                
            
            File::delete($previousPath);
            }
        }
        }
    	return redirect('/admin/categories');

    }

    public function destroy(Category $categorydelete)
    {
    	$categorydelete->products()->update(['category_id' => null]);
        $categorydelete->delete();
        return back();

    }
}
