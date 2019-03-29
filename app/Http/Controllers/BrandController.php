<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;

class BrandController extends Controller
{

	public function viewBrandinfo(){
		return view('back-end.brand-info.addbrand');
	}

    public function storeBrandinfo(Request $request){

            $this->validate($request, [
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
                'brand_description' => 'required',
                'publication_status' => 'required'
            ]);
    	
    		$brands = new brand();
    		$brands->brand_name = $request->brand_name;
    		$brands->brand_description = $request->brand_description;
    		$brands->publication_status = $request->publication_status;
    		$brands->save();
    		return redirect('brand/view')->with('message', 'Brand Seve Successfully');

    }

    public function showBrandinfo(){

    	$brand=brand::all();
    	return view('back-end.brand-info.managebrand', ['brands' => $brand]);
     }

     public function updatstatus($id){
     	$brand=brand::find($id);
     	if ($brand->publication_status==1) {
     		$brand->publication_status=0;
     		$brand->save();
     	}else{
     		$brand->publication_status=1;
     		$brand->save();
     	}
     	
     	return redirect('/brand/show')->with('message', 'Unpublication successfully ');
     }

     public function updatebrand($id){

     	$brand=brand::find($id);
     	return view('back-end.brand-info.editbrand',['brand' =>$brand]);

     }

     public function updatebrandinfo(Request $request){
        $this->validate($request, [
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
                'brand_description' => 'required',
                'publication_status' => 'required'
            ]);


     	$brands=brand::find($request->brand_id);

     	$brands->brand_name 		= $request->brand_name;
		$brands->brand_description 	= $request->brand_description;
		$brands->publication_status = $request->publication_status;
		$brands->save();
    	return redirect('/brand/show')->with('message', 'Brand updated Successfully');
     }

     public function deletebrandinfo($id){
     	$brand = brand::find($id);
     	$brand->delete();
     	return redirect('/brand/show')->with('message', 'Brand Delete Successfully');
     }
}
