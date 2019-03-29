@extends('layouts.home')



@section('content')
       		<div class="card card-info">

              <div class="card-header">
                <h3 class="card-title">Add Category Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form class="form-horizontal" method="POST" action="{{route('new-category')}}">
                
                  <h5 class="text-center text-success">{{Session::get('message')}}</h5>
              
                
              	{{csrf_field()}}
                <div class="card-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="category_name" class="form-control" id="inputEmail3" placeholder="Category Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category Description</label>
                    <div class="col-sm-10">
                      <textarea name="category_description" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-sm-10">
                      <label><input type="radio" checked name="publication_status" value="1"/>Published</label>
                      <label><input type="radio" checked name="publication_status" value="0"/>Unpublished</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="form-group">
                	<div class="col-md-5">
                  <input type="submit" class="btn btn-success btn-block" value="Save Category info">
                 </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          
@endsection