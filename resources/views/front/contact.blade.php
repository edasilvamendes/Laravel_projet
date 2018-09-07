@extends('layouts.master')

@section('content')
	<form method="post" action="{{route('contact.ship')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label>Email</label>
		    <input type="email" name="email">
		<label>Description</label>
		    <textarea name="message"></textarea>
		<input type="submit">
	</form>
@endsection 









