
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="{{ asset('admin/invoice/style.css') }}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="{{asset('admin/invoice/script.js')}}"></script>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address>
			<h2 style="color: orange; ;"><b>Shipping Info</b></h2>

				<p>{{ $shipping->first_name  }}</p>
				<p>{{ $shipping->address }}</p>
				<p>(+88) {{ $shipping->phone_number }}</p>
			</address>

			<address>
				<h2 style="color:orange;"><b>Billing Info</b></h2>
				<p>{{ $customer->first_name.' '.$customer->last_name }}</p>
				<p>{{ $customer->address }}</p>
				<p>(+88) {{ $customer->phone_number }}</p>
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address>
				
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>0000{{ $order->id }}</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>{{ $order->created_at }}</span></td>
				</tr>
				<tr>
					<th><span>Amount Due</span></th>
					<td><span id="prefix">TK.</span><span>{{ $order->order_total }}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Product Name</span></th>
						<th><span>Product price</span></th>
						<th><span>Product Quantity</span></th>
						<th><span>Total Price</span></th>
					
					</tr>
				</thead>
				<tbody>
					@php($sum=0)
					@foreach ($orderDatelses as $orderDatelse)
						<tr>
						<td style="text-align: center;"><span>{{ $orderDatelse->product_name }}</span></td>
						
						<td style="text-align: center;"><span data-prefix>TK.</span><span>{{ $orderDatelse->product_price  }}</span></td>
						<td style="text-align: center;"><span>{{ $orderDatelse->product_quentity  }}</span></td>
						<td style="text-align: center;"><span data-prefix>TK.</span><span>{{$total= $orderDatelse->product_price*$orderDatelse->product_quentity }}</span></td>
					</tr>
					@php($sum=$sum+$total)
					@endforeach
					
				</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>TK.</span><span>{{ $sum }}</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>
