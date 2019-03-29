<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\brand;
use App\Product;
use Image;
use DB;

class ProductController extends Controller
{
    public function index(){

    	$categories    = Category::where('publication_status', 1)->get();
    	$brands        = brand::where('publication_status' , 1)->get();

    	return view('back-end.product-info.addproduct',[
    		'categories' => $categories,
    		'brands'	=>$brands,
    	]);
    }

    protected function productInfovalidate($request){

        $this->validate($request, [
                'category_id'           => 'required',
                'brand_id'              => 'required',
                'product_name'          => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|max:20|min:2',
                'product_quantity'      => 'required',
                'product_prize'         => 'required',
                'short_description'     => 'required',
                'long_description'      => 'required ',
                'product_image'         => 'required',
                'publication_status'    => 'required'

            ]);
    }

    protected function producntinfoImageupload($request){

            $productImage = $request->file('product_image');
            //$imageName    = $productImage->getClientOriginalName();
            $fileType   = $productImage->getClientOriginalExtension();
            $imageName   = $request->product_name.'.'.$fileType;
            $directory    = 'product-image/';
            $imageUrl     = $directory.$imageName;
            //$productImage->move($directory, $imageName);
            Image::make($productImage)->resize(200,200)->save($imageUrl);
            return $imageUrl;
    }

    protected function datefile($request,$imageUrl){
        $product = new Product();
        $product->category_id           = $request->category_id;
        $product->brand_id              = $request->brand_id;
        $product->product_name          = $request->product_name;
        $product->product_quantity      = $request->product_quantity;
        $product->short_description     = $request->short_description;
        $product->long_description      = $request->long_description;
        $product->product_prize         = $request->product_prize;
        $product->product_image         = $imageUrl;
        $product->publication_status    = $request->publication_status;
        $product->save();
    }

    public function saveproductinfo(Request $request){
    		
           $this-> productInfovalidate($request);
    	   $imageUrl = $this->producntinfoImageupload($request);
           $this->datefile($request,$imageUrl);
           return redirect('/product/index')->with('message', 'Product uploaded successfullay');
    }

    public function showproduct(){

        $products = DB::table('products')
                            ->join('categories', 'products.category_id', '=','categories.id')
                            ->join('brands', 'products.brand_id', '=' , 'brands.id')
                            ->select('products.*', 'categories.category_name', 'brands.brand_name')
                            ->get();
        
        return view('back-end.product-info.manageproduct', ['products' => $products]);
    }


    public function publication($id){
        $product=Product::find($id);
        if ($product->publication_status==1) {
           $product->publication_status=0 ;
        }else{
            $product->publication_status=1;
        }
        $product->save();
        return redirect('product/manage')->with('message', 'Publication Status Updated successfully');
    }

    public function producteditinfo($id){
                $products = DB::table('products')
                    ->join('categories', 'products.category_id', '=','categories.id')
                    ->join('brands', 'products.brand_id', '=' , 'brands.id')
                    ->select('products.*', 'categories.category_name', 'brands.brand_name')
                    ->get();

            return view('back-end.product-info.productedit', ['products' => $products->id]);
    }

    public function deletproductinfo($id){
        $product=Product::find($id);
        $product->delete();
        return redirect('product/manage')->with('message', 'Product Deleted successfully');
    }
}
