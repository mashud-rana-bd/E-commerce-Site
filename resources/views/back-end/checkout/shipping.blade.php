@extends('front-end.master')



@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 well">
			
			Dere {{ Session::get('customerName') }}. You have to give us product shipping info to complete yolur valuatale order
		</div>

		<div class="col-md-6 col-md-offset-3">

		{{ Form::open(['route'=>'addShipping' ,'class' => 'form-horizontal', 'method' => 'POST']) }}
					
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Full Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" name="first_name" value="{{ $customer->first_name.' '.$customer->last_name }}" class="form-control" name="Full Name"  placeholder="Enter your Name"/>
							</div>
							<span class="text-danger"> {{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
						</div>
					</div>

						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" value="{{ $customer->email_address }}" class="form-control" name="email_address"   placeholder="Enter your Email"/>
								</div>
									<span class="text-danger"> {{$errors->has('email_address') ? $errors->first('email_address') : ''}}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Phone Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="text" value="{{ $customer->phone_number }}" class="form-control" name="phone_number"  placeholder="Phone Number"/>
								</div>
									<span class="text-danger"> {{$errors->has('phone_number') ? $errors->first('phone_number') : ''}}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i aria-hidden="true"></i></span>
									<textarea class="form-control fa fa-address-card-o" name="address" placeholder="Address">{{ $customer->address }}</textarea>
								</div>
								<span class="text-danger"> {{$errors->has('address') ? $errors->first('address') : ''}}</span>	
							</div>
						</div>
						<div class="form-group ">
							<input type="submit" class="btn btn-success btn-block" value="Save Shipping order">
						</div>
					{{ Form::close() }}
		</div>
		<div class="col-md-3"></div>



	</div>
</div>



@endsection 