
@extends('layouts.app1')

@section('konten')

<div class="limiter">
	
		<div class="container-login100">
			<div class="wrap-login100">
                        
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('logincss/images/img-01.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf	
                    <span class="login100-form-title">
						Please Login Here
					</span>
					@if (session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						
						<input class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" type="email" placeholder="Email" autofocus>
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" placeholder="Password">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a><br>
						<a class="txt2" href="{{ url('/') }}">
						<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Back to Home
							
						</a>
					</div>
				</form>
            
			</div>
		</div>
	</div>

@endsection