<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class NewShopController extends Controller
{
    public function index(){
    	$newproducts= Product::where('publication_status', 1)
    							->orderBy('id','DESC')
    							->take(8)
    							->get();
    	
    	return view('front-end.home.home',[
    		'newproducts' => $newproducts
    	]);
    }


    public function categoryProduct($id){
        $products=Product::where('category_id', $id)
                            ->where('publication_status', 1)
                            ->get();

    
    	return view('front-end.category.category-content',['products'=> $products]);
    }

    public function mail(){
    	return view('front-end.mail.mail-content');
    }

    public function brandproduct($id){
        $barndproducnts=Product::where('brand_id',$id)
                ->where('publication_status', 1)
                ->get();
        return view('front-end.footersingleproduct.footersingle', ['barndproducnts'=>$barndproducnts]);
    }

    public function singleproduct($id){
        $singleproduct=Product::find($id);
        return view('front-end.singlepageprduct.singlepage',['singleproduct'=>$singleproduct]);

    }
    

}
