@extends('layouts.master')

@section('content')
<h1 class="title">Creation d'un post</h1>
<section class="create-edit-post">
	<div class="row">
		<div class="col-md-12">
			<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="input-radio">
            		<label>Type du post</label>
		            <input type="radio" @if(old('post_type')=='formation') checked @endif name="post_type" value="formation" checked>Formation
		            <input type="radio" @if(old('post_type')=='stage') checked @endif name="post_type" value="stage">Stage<br>
	            </div>
				<br/>	
				<div class="content-input">
					<div class="content-left-input">
						<label>Titre</label>
						<br/>
						<input type="text" name="title" value="{{old('title')}}" placeholder="Title" />
						@if($errors->has('title')) 
							<span class="error">{{$errors->first('title')}}</span>
						@endif
					</div>
					<br/>
					<div class="content-right-input">
						<label>Description</label>
						<br/>
						<textarea placeholder="Description" name="description">{{old('description')}}</textarea>
						@if($errors->has('description')) 
							<span class="error">{{$errors->first('description')}}</span>
						@endif
					</div>
				</div>
				<br/>
				<div class="content-input">
					<div class="content-left-input">
						<label>Date de début</label>
						<br/>
						<input id="begin_date" type="date" name="begin_date" value="{{old('begin_date')}}">
						@if($errors->has('begin_date')) 
							<span class="error">{{$errors->first('begin_date')}}</span>
						@endif
					</div>
					<br/>
					<div class="content-right-input">
						<label>Date de fin</label>
						<br/>
						<input id="end_date" type="date" name="end_date" value="{{old('end_date')}}">
						@if($errors->has('end_date')) 
							<span class="error">{{$errors->first('end_date')}}</span>
						@endif
					</div>
				</div>
				<br/>
				<div class="content-input">
					<div class="content-left-input">
						<label>Prix</label>
						<br/>
						<input id="price" type="number" name="price" value="{{old('price')}}" min="0" max="99999.99" placeholder="€">
						@if($errors->has('price')) 
							<span class="error">{{$errors->first('price')}}</span>
						@endif
					</div>
					<br/>
					<div class="content-right-input">
						<label>Max etudiants</label>
						<br/>
						<input id="max_students" type="number" name="max_students" value="{{old('max_students')}}" min="0" max="75535" step="1" placeholder="Etudiants maximum">
						@if($errors->has('max_students')) 
							<span class="error">{{$errors->first('max_students')}}</span>
						@endif
					</div>
				</div>
				<br/>
				<label for="id_category">Categories</label>
				<br/>
				<select id="id_category" name="id_category">
					<option>Sélectionner une categorie</option>
					@foreach($categories as $id => $name)
                        <option {{ old('id_category')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                    @endforeach
				</select>
				<div class="input-file">
	                <label>File</label>
	                <br/>
	                <input class="file" type="file" name="picture">
	                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
	            </div>
				<input type="submit" value="Ajouter le post" />
			</form>
		</div>
	</div>
</section>
@endsection 