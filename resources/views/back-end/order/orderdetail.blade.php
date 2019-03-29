@extends('layouts.home')



@section('content')

<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<h3>Order Deails Information This order</h3>
				<table class="table table-bordered">
					<tr>
						<th>Order No.</th>
						<td>{{ $order->id }}</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td>{{ $order->order_total }}</td>
					</tr>
					<tr>
						<th>Order Status</th>
						<td>{{ $order->order_status }}</td>
					</tr>
					<tr>
						<th>Order Date</th>
						<td>{{ $order->created_at }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<h3>Customer Information This order</h3>
				<table class="table table-bordered">
					<tr>
						<th>Customer Name</th>
						<td>{{ $customer->first_name.' '.$customer->last_name }}</td>
					</tr>
					<tr>
						<th>Phone Number</th>
						<td>{{ $customer->phone_number }}</td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td>{{ $customer->email_address }}</td>
					</tr>
					<tr>
						<th>Customer Address</th>
						<td>{{ $customer->address }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<h3>Shipping Info This order</h3>
				<table class="table table-bordered">
					<tr>
						<th>Full Name</th>
						<td>{{ $shipping->first_name  }}</td>
					</tr>
					<tr>
						<th>Phone Number</th>
						<td>{{ $shipping->phone_number }}</td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td>{{ $shipping->email_address  }}</td>
					</tr>
					<tr>
						<th>Customer Address</th>
						<td>{{ $shipping->address  }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<h3>Payment Info This order</h3>
				<table class="table table-bordered">
					<tr>
						<th>Payment Type</th>
						<td>{{ $payment->payment_type }}</td>
					</tr>
					<tr>
						<th>Payment Status</th>
						<td>{{ $payment->payment_status }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>


	

<h3>Product Info For this order</h3>
	<table class="table table-bordered">
	<tr class="bg-info text-center">
		<th>Sl No.</th>
		<th>Product Id</th>
		<th>Product Name</th>
		<th>Product price</th>
		<th>Product Quantity</th>
		<th>Total Price</th>
	
	
	</tr>

@php($i=1)
	@foreach ($orderDatelses as $orderDatelse)
	
	<tr class="text-center">
		<td>{{$i++}}</td>
		<td>{{ $orderDatelse->product_id  }}</td>
		<td>{{ $orderDatelse->product_name  }}</td>
		<td>TK.{{ $orderDatelse->product_price   }}</td>
		<td>{{ $orderDatelse->product_quentity   }}</td>
		<td>TK.{{ $orderDatelse->product_price*$orderDatelse->product_quentity   }}</td>

		
	</tr>
	@endforeach

	
	

</table>


@endsection