<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function addcategory(){
    	return view('back-end.category.addcategory');
    }

   
    public function savecategory(Request $request){

    		// $category =new Category();

    		// $category->category_name  = $request->category_name;
    		// $category->category_description = $request->category_description;
    		// $category->publication_status = $request->publication_status;

    		// $category->save();

    	Category::create($request->all());

    		return redirect('addcategory')->with('message', 'Category seve successfully');
    }

     public function managecategory(){
    	$categoryis = Category::all();
    	return view('back-end.category.managecategory',['categories' => $categoryis]);
    }


    public function unpublishedCategory($id){

    		$category=Category::find($id);
    		$category->publication_status=0;
    		$category->save();
    		return redirect('/managecategory')->with('message','Category info ubpublished');

    }

    public function editCategory($id){
    	$category=Category::find($id);
    	return view('back-end.category.categoryedit',['categories' => $category]);
    }

    public function updateCategory(Request $request){

    	$category =Category::find($request->category_id);

    	$category->category_name 		= $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status 	= $request->publication_status;
    	$category->save();
    	return redirect('/managecategory')->with('message', 'Category Update successfully');

    }

    public function deleteCategory($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('managecategory')->with('message','Category deleted successfully');
    }



    
}
