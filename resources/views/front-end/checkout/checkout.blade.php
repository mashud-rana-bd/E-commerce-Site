@extends('front-end.master')


@section('content')

<div class="container">
			<div class="row">
			<div class="col-md-5 col-md-offset-2">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">New Shop</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					
					{{ Form::open(['route' => 'new-brand', 'class' => 'form-horizontal', 'method' => 'POST', 'file' => true]) }}
					{{-- <form class="form-horizontal" method="post" action="{{ route('customer-info') }}"> --}}
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="first_name"  placeholder="Enter your Name"/>
								</div>
								<span class="text-danger"> {{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="last_name" placeholder="Enter your last Name"/>
								</div>
									<span class="text-danger"> {{$errors->has('last_name') ? $errors->first('last_name') : ''}}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email_address"   placeholder="Enter your Email"/>
								</div>
									<span class="text-danger"> {{$errors->has('email_address') ? $errors->first('email_address') : ''}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password"  placeholder="Enter your Password"/>
								</div>
									<span class="text-danger"> {{$errors->has('password') ? $errors->first('password') : ''}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Phone Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone_number"  placeholder="Phone Number"/>
								</div>
									<span class="text-danger"> {{$errors->has('phone_number') ? $errors->first('phone_number') : ''}}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i aria-hidden="true"></i></span>
									<textarea class="form-control fa fa-address-card-o" name="address" placeholder="Address"></textarea>


								</div>
								<span class="text-danger"> {{$errors->has('address') ? $errors->first('address') : ''}}</span>	
							</div>
						</div>
						<div class="form-group ">
							<input type="submit" class="btn btn-success btn-block" value="Regintation">
						</div>
					{{ Form::close() }}
				</div>
				</div>




		<div class="col-md-5">
			<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Customer login Form</h1>
	               		<hr/>
	               		<h5 class="text-center text-danger">{{ Session::get('message') }}</h5>
	               	</div>
	            </div> 
				<div class="main-login main-center">

			<form method="POST" action="{{ route('customer-login') }}" >
			                        @csrf

			        <div class="form-group has-feedback">
			                <input id="email" placeholder="Email" type="email" class="form-control" name="email_address" >

			            
			        </div>
			        <div class="form-group has-feedback">
			                <input id="password" placeholder="Password" type="password" class="form-control" name="password">
			         
			        </div>


			        <div class="form-group row">
			            <div class="text-center">
			                <div class="form-check">
			                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			                    <label class="form-check-label" for="remember">
			                        {{ __('Remember Me') }}
			                    </label>
			                </div>
			            </div>
			        </div>
			        
			        <div class="form-group row mb-0">
			            <div class="col-md-12">
			                <button type="submit" class="btn btn-primary btn-block">
			                    {{ __('Login') }}
			                </button>

			                <a class="btn btn-link" href="{{ route('password.request') }}">
			                    {{ __('Forgot Your Password?') }}
			                </a>
			            </div>
			        </div>

      </form>
  </div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>

@endsection 