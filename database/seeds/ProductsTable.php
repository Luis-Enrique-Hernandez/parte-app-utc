<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cualquiera de las dos formas funciona
        
    	/*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories=factory(Category::class, 4)->create();
        $categories->each(function ($category){
            $products=factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            $products->each(function($p){
                $images=factory(ProductImage::class, 3)->make();
                $p->image()->saveMany($images);
            });

        });

       
    }
}
