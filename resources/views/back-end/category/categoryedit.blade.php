@extends('layouts.home')

@section('content')

<div class="card card-info">

              <div class="card-header">
                <h3 class="card-title">Add Category Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form class="form-horizontal" method="POST" action="{{route('update-category')}}">
              	{{csrf_field()}}
                <div class="card-body">

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="category_name" class="form-control" value="{{$categories->category_name}}" id="" placeholder="Category Name">

                      <input type="hidden" name="category_id" class="form-control" value="{{$categories->id}}" id="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Category Description</label>
                    <div class="col-sm-10">
                      <textarea name="category_description" class="form-control">{{$categories->category_description}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Publication status</label>
                    <div class="col-sm-10">
                      <label><input type="radio" @if ($categories->publication_status ==1)
                      	checked
                      @endif  name="publication_status" value="1"/>Published</label>
                      <label><input type="radio" @if ($categories->publication_status ==0)
                      	checked
                      @endif name="publication_status" value="0"/>Unpublished</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="form-group">
                	<div class="col-md-5">
                  <input type="submit" class="btn btn-success btn-block" value="Update Category info">
                 </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>



@endsection