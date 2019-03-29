@extends('layouts.home')



@section('content')

<h5 class="text-center text-success">{{Session::get('message')}}</h5>


<div class="table-responsive">
	<table class="table table-bordered">
	<tr class="bg-primary text-center">
		<th>Sl No.</th>
		<th>Category Name</th>
		<th>Brand Name</th>
		<th>Product Name</th>
		<th>Product Image</th>
		<th>Product Prize</th>
		<th>Product Quantity</th>
		<th>Publication Status</th>
		<th>Action</th>
	</tr>

@php($i=1)
@foreach ($products as $product)
	
	<tr class="text-center">
		<td>{{$i++}}</td>
		<td>{{$product->category_name}}</td>
		<td>{{$product->brand_name}}</td>
		<td>{{$product->product_name}}</td>
		<td>
			<img src="{{asset($product->product_image)}}" alt="" height="100px" width="100px" >
		</td>
		<td>{{$product->product_prize}}</td>
		<td>{{$product->product_quantity}}</td>
		<td>{{$product->publication_status==1? 'Published':'Unpublished'}}</td>
		<td>
			@if ($product->publication_status==1)
				<a href="{{route('productpublication', ['id' => $product->id])}}" class="btn btn-info btn-xs">
					<span class="fa fa-arrow-up"></span>
				</a>
			@else
				<a href="{{route('productpublication', ['id' => $product->id])}}" class="btn btn-warning btn-xs">
					<span class="fa fa-arrow-down"></span>
				</a>
			@endif

			<a href="{{route('productedit',['id'=> $product->id ])}}" class="btn btn-success btn-xs">
				<span class="fa fa-pencil-square-o"></span>
			</a>

			<a href="{{route('productdeletinfo',['id' => $product->id ])}}" class="btn btn-danger btn-xs">
				<span class="fa fa-trash"></span>
			</a>

		</td>
	</tr>
@endforeach
</table>
</div>


@endsection