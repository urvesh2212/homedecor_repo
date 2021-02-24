<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <!-- Vendor CSS -->
    <link href="{{URL::asset('assets/css/vendors.css')}}" rel="stylesheet" type="text/css">
    <!-- Main CSS -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" >

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <!-- Favicon -->
        <link rel="icon" href="{{URL::asset('assets/img/favicon.ico')}}">

        <link href="{{URL::asset('login/css/bootstrap.css')}}" rel="stylesheet" />

        <link href="{{URL::asset('login/css/login-register.css')}}" rel="stylesheet" />
</head>

<body>

@include('front.layouts.head')
@yield('content')
@include('front.layouts.footer')
@include('front.layouts.afterfooter')
@include('front.login')
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->

    <!-- Vendor JS -->
    <script src="{{URL::asset('assets/js/vendors.js')}}"></script>

    <!-- Active JS -->
    <script src="{{URL::asset('assets/js/active.js')}}"></script>

    <!--=====  End of JS files ======-->
<script src="{{URL::asset('js/main.js')}}"></script>

<script src="{{URL::asset('login/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('login/js/bootstrap.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('login/js/login-register.js')}}" type="text/javascript"></script>
</body>
</html>