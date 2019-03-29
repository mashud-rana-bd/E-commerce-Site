@extends('layouts.home')

@section('content')

<table class="table table-bordered">

<strong><h5 class="text-center text-success">{{Session::get('message')}}</h5></strong>

	<tr class="bg-primary text-center">
		<th>Sl No.</th>
		<th>Brand Name</th>
		<th>Brand Discription</th>
		<th>Published Status</th>
		<th>Action</th>
	</tr>
	@php($i=1)
	@foreach ($brands as $brand)
		<tr class="text-center">
			<td>{{$i++}}</td>
			<td>{{$brand->brand_name}}</td>
			<td>{{$brand->brand_description}}</td>
			<td>{{$brand->publication_status==1 ? 'Published':'Unpublished'}}</td>
			<td>
				@if ($brand->publication_status==1)
					<a href="{{route('publickstatus',['id'=>$brand->id])}}" class="btn btn-info btn-xs">
					<span class="fa fa-arrow-up"></span>
					</a>
				@else
					<a href="{{route('publickstatus',['id'=>$brand->id])}}" class="btn btn-warning btn-xs">
					<span class="fa fa-arrow-down"></span>
					</a>
				@endif
				
			
			<a href="{{route('updatebrand',['id'=>$brand->id])}}" class="btn btn-success btn-xs">
				<span class="fa fa-pencil-square-o"></span>
			</a>

			<a href="{{route('deletebrand',['id'=>$brand->id])}}" class="btn btn-danger btn-xs">
				<span class="fa fa-trash"></span>
			</a>
			</td>
		</tr>
	@endforeach
	
</table>





@endsection