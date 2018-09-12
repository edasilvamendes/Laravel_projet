@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Creation d'un post: </h1>
			<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="input-radio">
            		<h2>Type du post</h2>
		            <input type="radio" @if(old('post_type')=='formation') checked @endif name="post_type" value="formation" checked>Formation<br>
		            <input type="radio" @if(old('post_type')=='stage') checked @endif name="post_type" value="stage">Stage<br>
	            </div>
				
				<label>Titre</label>
				<input type="text" name="title" value="{{old('title')}}" placeholder="Title" />
				@if($errors->has('title')) 
					<span class="error">{{$errors->first('title')}}</span>
				@endif

				<label>Description</label>
				<textarea name="description">{{old('description')}}</textarea>
				@if($errors->has('description')) 
					<span class="error">{{$errors->first('description')}}</span>
				@endif

				<label>Date de début</label>
				<input id="begin_date" type="date" name="begin_date" value="{{old('begin_date')}}">
				@if($errors->has('begin_date')) 
					<span class="error">{{$errors->first('begin_date')}}</span>
				@endif

				<label>Date de fin</label>
				<input id="end_date" type="date" name="end_date" value="{{old('end_date')}}">
				@if($errors->has('end_date')) 
					<span class="error">{{$errors->first('end_date')}}</span>
				@endif

				<label>Prix</label>
				<input id="price" type="number" name="price" value="{{old('price')}}" min="0" max="99999.99">
				@if($errors->has('price')) 
					<span class="error">{{$errors->first('price')}}</span>
				@endif

				<label>Max etudiants</label>
				<input id="max_students" type="number" name="max_students" value="{{old('max_students')}}" min="0" max="65535" step="1">
				@if($errors->has('max_students')) 
					<span class="error">{{$errors->first('max_students')}}</span>
				@endif

				<select name="id_category">
					<option>Sélectionner une category</option>
					<option value="0" {{ is_null(old('id_category'))? 'selected' : '' }}>Pas de category</option>
						@foreach($categories as $id => $name)
                            <option {{ old('id_category')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
				</select>

				<div class="input-file">
	                <h2>File :</h2>
	                <input class="file" type="file" name="picture">
	                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
	            </div>
				
				<input type="submit" value="Ajouter le post" />
			</form>
		</div>
	</div>
</div>
@endsection 