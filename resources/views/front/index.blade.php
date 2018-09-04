@extends('layouts.master')

<!-- HEADER -->
<header>
    <h1>Formations/Stages</h1>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Accueil</a></li>
            <li><a href="{{url('formation')}}">Formation</a></li>
            <li><a href="{{url('stage')}}">Stage</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
</header>

@section('content')
    @forelse($posts as $post)
        <ul>
            <li>{{$post->post_type}}</li>
            <li>{{$post->title}}</li>
            <li>{{$post->description}}</li>
        </ul>
        @empty
            <li>Aucun posts</li>
    @endforelse
@endsection























