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
			<div class="col-md-12">
				<h1 class="title flex">Formations/Stages</h1>
				@include('partials.menu')
			</div>
		</div>
		<div class="row content-page">
			<div class="col-md-12">
				@yield('content')
			</div>
		</div>
	</div>

	<footer>
		@include('partials.menu')
	</footer>
	
	@section('scripts')
	<script src="{{asset('js/app.js')}}"></script>
	@show
</body>
</html>