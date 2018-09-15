<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post</title>
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">

		<div class="row header">
			<div class="col-md-12 content-menu">
				@include('partials.menu')

				<?php
					if (Auth::check()) { 
				        ?>
					        <div class="content-admin">
					            <a href="{{url('/login')}}">Admin | </a>
					            <a href="{{url('/logout')}}">Logout</a>
					        </div>
				        <?php
			    	}
			    ?>
			</div>
		</div>
		<div class="row content-page content">
			<div class="col-md-12">
				@yield('content')
			</div>
		</div>
		<div class="row footer">
			<div class="col-md-12 content-menu">
				@include('partials.menu')
			</div>
		</div>
	</div>

	@section('scripts')
	<script src="{{asset('js/app.js')}}"></script>
	@show
</body>
</html>