@extends('layouts.home')



@section('content')

 <div class="card-header">
                <h3 class="card-title">Add Brand Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form class="form-horizontal" method="POST" action="{{route('updatebrandinfo')}}">

               

              	{{csrf_field()}}
              	
                  <h5 class="text-center text-success">{{Session::get('message')}}</h5>
              
                
                <div class="card-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control" id="inputEmail3" placeholder="Brand Name">
                      <span class="text-denger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ''}} </span>
                       <input type="hidden" name="brand_id" value="{{$brand->id}}" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Description</label>
                    <div class="col-sm-10">
                      <textarea name="brand_description" class="form-control">{{$brand->brand_description}}</textarea>
                      <span class="text-denger">{{$errors->has('brand_description') ? $errors->first('brand_description'): ''}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-sm-10">
                      <label><input type="radio" @if ($brand->publication_status==1)
                      	checked
                      @endif  name="publication_status" value="1"/>Published</label>
                      <label><input type="radio" @if ($brand->publication_status==0)
                      	checked
                      @endif  name="publication_status" value="0"/>Unpublished</label>

                      <span class="text-denger">{{$errors->has('publication_status'? $errors->first('publication_status') : '')}} </span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="form-group">
                	<div class="col-md-5">
                  <input type="submit" class="btn btn-success btn-block" value="Update Brand info">
                 </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>



@endsection