<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\models\Products;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->id,$request->title,$request->price);
        //ajout de produit deja dans le panier
        $duplicata=Cart::search(function($cartItem,$rowID)use ($request){
            return $cartItem->id==$request->product_id;
        });

        if($duplicata->isNotEmpty()){
            return redirect()->route('products.index')->with('success','Le produit a déja été ajouté.');
        }

        $product=Products::find($request->product_id);

        Cart::add($product->id,$product->title,1,$product->price)
        -> associate('App\models\Products');

        return redirect()-> route('products.index')->with('success','Le produit a été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //
        Cart::remove($rowId);
        return back()->with('success','Le produit a été supprimé.');
    }
}
