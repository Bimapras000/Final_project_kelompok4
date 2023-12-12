@extends('layouts.app')

@section('content')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="name " require autocomplete="name"
                                   value="{{old('name')}}" placeholder=" Nama" autofocus>

                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group row">
                        
                                <input type="text" class="form-control form-control-user @error('alamat') is-invalid @enderror" name="alamat" id="alamat " require autocomplete="alamat"
                                    value="{{old('alamat')}}" placeholder="Alamat" autofocus>
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                        </div>

                        <div class="form-group row">

                            <input type="text" class="form-control form-control-user @error('no_tlp') is-invalid @enderror" name="no_tlp" id="no_tlp " require autocomplete="no_tlp"
                                placeholder="Nomor Telepon" value="{{old('no_tlp')}}" autofocus>

                                @error('no_tlp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <input type="date" class="form-control form-control-user" name="tgl_bergabung" id="tgl_bergabung " require autocomplete="tgl_bergabung
                                    placeholder="Tanggal Bergabung" value="{{old('tgl_bergabung')}}" autofocus>

                                    @error('tgl_bergabung')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary btn-user btn-block">
                            Register Account
                            {{ __('Register') }}
                        </a> -->
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                            </button>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.html">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection