<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ngepinter.Com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link href="{{url('admin/assets/img/books.png')}}" rel="icon">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('logincss/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

@yield('konten')

<!--===============================================================================================-->	
<script src="{{asset('logincss/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logincss/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('logincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logincss/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logincss/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('logincss/js/main.js')}}"></script>

</body>
</html>