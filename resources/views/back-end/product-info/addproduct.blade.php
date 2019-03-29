@extends('layouts.home')


@section('content')

<div class="card card-info">

              <div class="card-header">
                
                <h3 class="card-title">Add Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             {{Form::open(['route'=>'new-product', 'method' =>'POST','class'=>'Form-homizontal', 'files' => true])}}

                  <h5 class="text-center text-success">{{Session::get('message')}}</h5>
              
                
              	{{csrf_field()}}
                <div class="card-body">

                  <div class="form-group">
	                    <label for="" class="col-sm-2 control-label">Category Name</label>
	                    <div class="col-sm-10">
	                      <select name="category_id" class="form-control">
	                      	<option value="">---Select Category Name---</option>
	                      	@foreach ($categories as $category)

	                      	<option value="{{$category->id}}">{{$category->category_name}}</option>
	                      		
	                      	@endforeach
	                      	
	                      </select>
	                      <span class="text-danger"> {{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
	                    <label for="" class="col-sm-2 control-label">Brand Name</label>
	                    <div class="col-sm-10">
	                      <select name="brand_id" class="form-control">
	                      	<option value="">---Select Brand Name---</option>
	                      	@foreach ($brands as $brand)

	                      	<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
	                      		
	                      	@endforeach
	                      	
	                      </select>
	                      <span class="text-danger"> {{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="product_name" class="form-control"/>
                      <span class="text-danger"> {{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Prize</label>
                    <div class="col-sm-10">
                      <input type="number" name="product_prize" class="form-control"/>
                       <span class="text-danger"> {{$errors->has('product_prize') ? $errors->first('product_prize') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" name="product_quantity" class="form-control"/>
                      <span class="text-danger"> {{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-10">
                      <textarea name="short_description" class="form-control"></textarea>
                      <span class="text-danger"> {{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Long Description</label>
                    <div class="col-sm-10">
                      <textarea id="editor" name="long_description" class="form-control"></textarea>
                      <span class="text-danger"> {{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Product Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="product_image" accept="image/*" /> <br>
                       <span class="text-danger"> {{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-sm-10">
                      <label><input type="radio" checked name="publication_status" value="1"/>Published</label>
                      <label><input type="radio" checked name="publication_status" value="0"/>Unpublished</label>
                      <span class="text-danger"> {{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="form-group">
                	<div class="col-md-5">
                  <input type="submit" class="btn btn-success btn-block" value="Save Product info">
                 </div>
                </div>
                <!-- /.card-footer -->
              {{Form::close()}}
            </div>


@endsection 