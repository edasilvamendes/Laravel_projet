@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Edit d'un post: </h1>
			<form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('put')
				
				<div class="input-radio">
            		<h2>Type du post</h2>
		            <input type="radio" @if($post->post_type=='formation') checked @endif name="post_type" value="formation">Formation<br>
		            <input type="radio" @if($post->post_type=='stage') checked @endif name="post_type" value="stage">Stage<br>
	            </div>
				
				<label>Titre</label>
				<input type="text" name="title" value="{{$post->title}}" placeholder="Title" />
				@if($errors->has('title')) 
					<span class="error">{{$errors->first('title')}}</span>
				@endif

				<label>Description</label>
				<textarea name="description">{{$post->description}}</textarea>
				@if($errors->has('description')) 
					<span class="error">{{$errors->first('description')}}</span>
				@endif
				
				<label>Date de début</label>
				<input id="begin_date" type="date" name="begin_date" value="{{date('Y-m-d', strtotime($post->begin_date))}}">
				@if($errors->has('begin_date')) 
					<span class="error">{{$errors->first('begin_date')}}</span>
				@endif

				<label>Date de fin</label>
				<input id="end_date" type="date" name="end_date" value="{{date('Y-m-d', strtotime($post->end_date))}}">
				@if($errors->has('end_date')) 
					<span class="error">{{$errors->first('end_date')}}</span>
				@endif

				<label>Prix</label>
				<input id="price" type="number" name="price" value="{{$post->price}}" min="0" max="99999.99" step=0.01>
				@if($errors->has('price')) 
					<span class="error">{{$errors->first('price')}}</span>
				@endif

				<label>Max etudiants</label>
				<input id="max_students" type="number" name="max_students" value="{{$post->max_students}}" min="0" max="65535" step="1">
				@if($errors->has('max_students')) 
					<span class="error">{{$errors->first('max_students')}}</span>
				@endif
				
				<label for="id_category">Category :</label>
                <select id="id_category" name="id_category">
                    <option value="0" {{is_null($post->id_category == 0)? 'selected' : ''}}>Aucune catégory</option>
                    @foreach($categories as $id => $name)
                        <option {{ ($post->id_category == $id)? 'selected' : '' }}  value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>

				<div class="input-file">
	                <h2>File :</h2>
	                <input class="file" type="file" name="picture">
	                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
	            </div>
				
				<input type="submit" value="Editer le post" />
			</form>
		</div>
	</div>
</div>
@endsection 