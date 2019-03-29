@extends('front-end.master')


@section('content')

<div class="cart-items">
				<div class="container">
					 <h2>My Shopping Bag (3)</h2>


					@php($i=1)
					@php($sum=0)
					
					 @foreach ($cardproducts as $cardproduct)
					 	
					
					 <div class="cart-header">
					 	<a href="{{ route('delete-cart', ['rowId' => $cardproduct->rowId] )}}" class="close1"></a>
						 <div class="cart-sec simpleCart_shelfItem">
								<div class="cart-item cyc">
									 <img src="{{asset( $cardproduct->options->image )}}" class="img-responsive" alt="">
								</div>
							   <div class="cart-item-info">
								<h3><a href="#">{{ $cardproduct->name }} </a><span>Pickup time:</span></h3>
								<ul class="qty">
									<li><p>Min. order value:</p></li>
									<li><p>FREE delivery</p></li>
								</ul>
									 <div class="delivery">
									 <p>Service Charges : TK. {{ $cardproduct->price }}</p><br>
									 <p>Service Quentity : 
									 	{{ Form::open(['route'=>'quanti-edit', 'method' =>'POST']) }}
											<input type="number" name="qty" value="{{ $cardproduct->qty }}" min="1">
											<input type="hidden" name="rowId" value="{{ $cardproduct->rowId }}">
											<input type="submit" class="btn btn-info" value="Edit Quentity">
									 	{{ Form::close() }}

									 </p><br>
									 <p>Service <strong>{{ $total = $cardproduct->price*$cardproduct->qty }}</strong></p>
									 <span>Delivered in 1-1:30 hours</span>
									 <div class="clearfix"></div>
								</div>	
							   </div>
							   <div class="clearfix"></div>
													
						  </div>
					 </div>
					 <?php
					 $sum = $sum+$total
					 ?>
					 @endforeach

			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<table class="table table-bordered">
							<tr>
								<th>Item Total (TK.)</th>
								<th>{{ $sum }}</th>
								<?php
								Session::put('orderTotal', $sum);
								?>
							</tr>
						</table>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<a href="{{ route('cartform') }}" class="btn btn-success">Ceheckout</a>
					</div>
					<div class="col-md-4 ">
						<a href="{{ route('/') }}" class="btn btn-success pull-right">Continue Shopping</a>
					</div>
		
				</div>
			</div>
			



@endsection