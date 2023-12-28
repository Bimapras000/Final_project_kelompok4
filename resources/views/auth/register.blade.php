@extends('layouts.app1')

@section('konten')

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                        
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('logincss/images/img-01.png') }}" alt="IMG">
                </div>

				<form class="login100-form validate-form" method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                    @csrf	
                    <span class="login100-form-title">
						Register Here
					</span>
					@if (session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
                    <label for="name">Nama</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid name is required: ex@abc.xyz">
                        
						<input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>
                    <label for="name">Alamat</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid alamat is required: ex@abc.xyz">
                        
						<input id="alamat" type="text" class="input100 @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="Alamat">
						@error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>
                    <label for="name">Nomor Telepon</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid no_tlp is required: ex@abc.xyz">
                        
						<input id="no_tlp" type="text" class="input100 @error('no_tlp') is-invalid @enderror" name="no_tlp" value="{{ old('no_tlp') }}" required autocomplete="no_tlp" autofocus placeholder="Nomor Telepon">
						@error('no_tlp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
                    <label for="name">Tanggal Bergabung</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid tgl_bergabung is required: ex@abc.xyz">
                        
						<input id="tgl_bergabung" type="date" class="input100 @error('tgl_bergabung') is-invalid @enderror" name="tgl_bergabung" value="{{ date('Y-m-d') }}" readonly required autocomplete="tgl_bergabung" autofocus placeholder="Tanggal Bergabng">
						@error('tgl_bergabung')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
                    <label for="email">Email</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        
						<input id="email" type="text" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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
                    <label for="password">Password</label>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" placeholder="Password">
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
                    <label for="password">Confirm Password</label>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<label for="password">Foto</label>
					<div class="wrap-input100 validate-input" data-validate = "Foto is required">
						<input id="foto" class="input100 @error('foto') is-invalid @enderror" name="foto" required autocomplete="current-foto" type="file" placeholder="Foto">
						@error('foto')
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
						<button class="login100-form-btn btn" type="submit">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('login')}}">						
                        Login if you already have an account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
            
			</div>
		</div>
	</div>

@endsection