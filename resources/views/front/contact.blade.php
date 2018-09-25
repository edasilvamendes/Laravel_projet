@extends('layouts.master')

@section('content')
<h1 class="title">Contact</h1>

<section class="create-edit-post">
	@include('back.post.partials.flash')
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="{{route('contact')}}" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="content-input">
					<div class="content-left-input">
						<label>Email</label>
					    <input type="email" name="email">
					    <br/>
						<label>Message</label>
						<br/>
					    <textarea name="description"></textarea>
					</div>
				</div>
				<input type="submit">
			</form>
		</div>
	</div>
</section>
@endsection 









