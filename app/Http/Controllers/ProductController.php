<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Products::inRandomOrder()->take(6)->get();

        return view('products.index')->with('products',$products);
    }

    public function show($slug)
    {
        $products = Products::where('slug',$slug)->firstOrFail();

        return view('products.show')->with('products',$products);
    }

}
