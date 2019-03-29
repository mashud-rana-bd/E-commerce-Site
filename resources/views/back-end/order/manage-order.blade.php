@extends('layouts.home')



@section('content')
<h5 class="text-center text-success">{{Session::get('message')}}</h5>
<table class="table table-bordered">
	<tr class="bg-primary text-center">
		<th>Sl No.</th>
		<th>Customer Name</th>
		<th>Order Total</th>
		<th>Order Date</th>
		<th>Order Status</th>
		<th>Payment Type</th>
		<th>Payment Status</th>
		<th>Action</th>
	</tr>

@php($i=1)
@foreach ($orders as $order)
	<tr class="text-center">
		<td>{{$i++}}</td>
		<td>{{ $order->first_name.' '.$order->last_name }}</td>
		<td>{{ $order->order_total }}</td>
		<td>{{ $order->created_at }}</td>
		<td>{{ $order->order_status }}</td>
		<td>{{ $order->payment_type }}</td>
		<td>{{ $order->payment_status }}</td>
		<td>
			<a href="{{route('view-oreder-detail',['id'=>$order->id])}}" class="btn btn-info btn-xs" title="View Order Datails">
				<span class="fa fa-search-plus"></span>
			</a>

			<a href="{{route('view-oreder-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-xs" title="View Order Invoice">
				<span class="fa fa-search-minus"></span>
			</a>

			<a href="{{route('download-pdf',['id'=>$order->id])}}" class="btn btn-primary btn-xs" title="Download Order Invoice">
				<span class="fa fa-download"></span>
			</a>

			<a href="{{route('updatebrand',['id'=>$order->id])}}" class="btn btn-success btn-xs" title="Edit Order">
				<span class="fa fa-pencil-square-o"></span>
			</a>

			<a href="{{route('updatebrand',['id'=>$order->id])}}" class="btn btn-danger btn-xs" title="Delete Order">
				<span class="fa fa-trash-o"></span>
			</a>

		</td>
	</tr>
@endforeach
	
	

</table>



@endsection