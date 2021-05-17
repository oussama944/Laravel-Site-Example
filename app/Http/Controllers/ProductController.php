<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Products;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Products::inRandomOrder()->take(6)->get();
        return view('products.index')->with('products',$products);
    }

}