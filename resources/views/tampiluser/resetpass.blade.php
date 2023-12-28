@extends('tampiluser.layout.app')
@section('user')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="shopify-grid padding-large">
      <div class="container">
      <h3>Reset Password</h3><br><br>
        <div class="row">
        
<div class="card shadow mb-4">
    <div class="card-body">
<form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">Old Password</h6>
		</div>
		<div class="col-sm-9 text-secondary">
			<input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
        @error('old_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">New Password</h6>
		</div>
		<div class="col-sm-9 text-secondary">
			<input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
	</div>
	<div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">Confirm Password</h6>
		</div>
		<div class="col-sm-9 text-secondary">
		<input type="password" class="form-control" name="password_confirmation">
        
    </div>
	</div>
  <div class="form-group row">
    <div class="offset-3 col-8">
    
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-secondary " onclick="window.location.href='{{ url('user') }}'">Cancel</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection