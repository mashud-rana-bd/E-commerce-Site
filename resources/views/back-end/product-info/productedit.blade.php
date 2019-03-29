@extends('layouts.home')


@section('content')

<div class="card card-info">

              <div class="card-header">
                
                <h3 class="card-title">Edit Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             {{Form::open(['method' =>'POST','class'=>'Form-homizontal', 'files' => true])}}

                  <h5 class="text-center text-success">{{Session::get('message')}}</h5>
              
                
              	{{csrf_field()}}
                <div class="card-body">

                  <div class="form-group">
	                    <label for="" class="col-sm-2 control-label">Category Name</label>
	                    <div class="col-sm-10">
	                      <select name="category_id" class="form-control">
	                      	<option value="">---Select Category Name---</option>

	                      	

	                      	<option value=""></option>
	                      		
	                    
	                      	
	                      </select>
	                      <span class="text-danger"> {{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
	                    <label for="" class="col-sm-2 control-label">Brand Name</label>
	                    <div class="col-sm-10">
	                      <select name="brand_id" class="form-control">
	                      	<option value="">---Select Brand Name---</option>
	                      

	                      	<option value=""></option>
	                      		
	                      	
	                      	
	                      </select>
	                      <span class="text-danger"> {{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="product_name" value="{{$products->product_name}}" class="form-control"/>
                      <span class="text-danger"> {{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Prize</label>
                    <div class="col-sm-10">
                      <input type="number" name="product_prize" value="{{$products->product_prize}}" class="form-control"/>
                       <span class="text-danger"> {{$errors->has('product_prize') ? $errors->first('product_prize') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" name="product_quantity" value="{{$products->product_quantity}}" class="form-control"/>
                      <span class="text-danger"> {{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-10">
                      <textarea name="short_description" class="form-control">{{$products->short_descriptiony}}</textarea>
                      <span class="text-danger"> {{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Long Description</label>
                    <div class="col-sm-10">
                      <textarea id="editor" name="long_description" class="form-control">{{$products->long_description}}</textarea>
                      <span class="text-danger"> {{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="product_image" accept="image/*" /> <br>
                      <img src="{{asset($products->product_image)}}" alt="" height="200px" width="200px">
                       <span class="text-danger"> {{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-sm-10">

                      <label><input type="radio" @if ($product->publication_status==1)
                        checked
                      @endif  name="publication_status" value="1"/>Published</label>


                      <label><input type="radio" @if ($product->publication_status==0)
                        checked
                      @endif  name="publication_status" value="0"/>Unpublished</label>
                      <span class="text-danger"> {{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="form-group">
                	<div class="col-md-5">
                  <input type="submit" class="btn btn-success btn-block" value="Update Product info">
                 </div>
                </div>
                <!-- /.card-footer -->
              {{Form::close()}}
            </div>


@endsection 