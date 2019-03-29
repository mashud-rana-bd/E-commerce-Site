@extends('front-end.master')



@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-12 well">
			Dere {{ Session::get('customerName') }}. You have to give us product shipping info to complete yolur valuatale order. prement order
			</div>

		<div class="col-md-8 col-md-offset-2 well">
			{{ Form::open([ 'route'=> 'prementmethod', 'method' => 'POST']) }}
			<table class="table table-bordered">
				<tr>
					<th>
						Cash on Delivery
					</th>
					<td>
						<input type="radio" name="payment_type" value="cash">Cash on Delivery <br>
						<span style="color:red;" class="text-denger">{{ $errors->has('payment_type')?  $errors->first('payment_type') : ''  }}</span> 
					</td>
				</tr>
				
				<tr>
					<th>
						Paypal
					</th>
					<td><input type="radio" name="payment_type" value="Paypal">Paypal <br>
					<span style="color:red;" class="text-denger">{{ $errors->has('payment_type')?  $errors->first('payment_type') : ''  }}</span> 
					</td>
					
				</tr>
				<tr>
					<th>
						Bkash
					</th>
					<td><input type="radio" name="payment_type" value="Bkash">Bkash <br>
					<span style="color:red;" class="text-denger">{{ $errors->has('payment_type')?  $errors->first('payment_type') : ''  }}</span> 	
					</td>
				
				</tr>
				<tr>
					<th></th>
					<td>
						<input type="submit" class="btn btn-info" name="btn" value="Confirm Order">
					</td>
				</tr>
			</table>
		</div>
		<div class="com-md-2"></div>
	</div>
</div>


@endsection 