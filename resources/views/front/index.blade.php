@extends('layouts.master')

<!-- HEADER -->
<header>
    <h1>Formations/Stages</h1>
    <div>
        <ul>
            <li><a href="{{url('/')}}">Accueil</a></li>
            <li><a href="{{url('formation')}}">Formation</a></li>
            <li><a href="{{url('stage')}}">Stage</a></li>
            <li><a href="{{url('contact')}}">Contact</a></li>
        </ul>
</header>

<?php
    if (Auth::check()) { 
        ?>
            <a href="{{url('/login')}}">Admin</a>
            <a href="{{url('/logout')}}">Logout</a>
        <?php
    }
?>

@section('content')
    @forelse($posts as $post)
        <ul>
            <li>{{$post->post_type}}</li>
                @if($post->post_type === "formation")
                    <li><a href="{{url('formation', $post->id)}}">{{$post->title}}</a></li>
                @elseif($post->post_type === "stage")
                    <li><a href="{{url('stage', $post->id)}}">{{$post->title}}</a></li>
                @endif
            <li>{{$post->description}}</li>
        </ul>
        @empty
            <li>Aucun posts</li>
    @endforelse
@endsection


<!-- 
*
*
*
* ICI AJOUT DU FOOTER (MENU EQUIVALENT AU HEADER)
* ICI AJOUT EGALEMENT DU MOTEUR DE RECHERCHE
*
**
-->




















