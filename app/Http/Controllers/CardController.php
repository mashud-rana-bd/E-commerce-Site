<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CardController extends Controller
{
    public function addTocard(Request $request){

    		$product=Product::find($request->id);

    		Cart::add([
    			'id' => $request->id, 
    			'name' => $product->product_name, 
    			'qty' => $request->qty, 
    			'price' => $product->product_prize,
    			'options' => [
    				'image' => $product->product_image
    				
    			]
    		]);

    		return redirect('/cart/show');
    	
    }

    public function showcard(){
    	
    	$cardproducts = Cart::content();
    	return view('front-end.cart.cart',['cardproducts' => $cardproducts]);

    }

    public function deletTocart($rowId){
    	Cart::remove($rowId);
    	return redirect('/cart/show');
    }

    public function editcart(Request $request){

    	Cart::update($request->rowId, $request->qty);

    	return redirect('/cart/show');
    	
    }
}
