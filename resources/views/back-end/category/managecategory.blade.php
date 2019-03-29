@extends('layouts.home')



@section('content')
<h5 class="text-center text-success">{{Session::get('message')}}</h5>
<table class="table table-bordered">
	<tr class="bg-primary text-center">
		<th>Sl No.</th>
		<th>Category Name</th>
		<th>Category Description</th>
		<th>Publication Status</th>
		<th>Action</th>
	</tr>

@php($i=1)
@foreach ($categories as $category)
	
	<tr class="text-center">
		<td>{{$i++}}</td>
		<td>{{$category->category_name}}</td>
		<td>{{$category->category_description}}</td>
		<td>{{$category->publication_status==1? 'Published':'Unpublished'}}</td>
		<td>
			@if ($category->publication_status==1)
				<a href="{{route('unpublicshed-category', ['id' => $category->id])}}" class="btn btn-info btn-xs">
					<span class="fa fa-arrow-up"></span>
				</a>
			@else
				<a href="{{route('published-category',['id' => $category->id])}}" class="btn btn-warning btn-xs">
					<span class="fa fa-arrow-down"></span>
				</a>
			@endif

			<a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-xs">
				<span class="fa fa-pencil-square-o"></span>
			</a>

			<a href="{{route('delete-category',['id' => $category->id])}}" class="btn btn-danger btn-xs">
				<span class="fa fa-trash"></span>
			</a>

		</td>
	</tr>
@endforeach
</table>



@endsection