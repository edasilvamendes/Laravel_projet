@extends('layouts.master')

<?php
    if (Auth::check()) { 
        ?>
            <a href="{{url('/')}}">Accueil</a>s
            <a href="{{url('/logout')}}">Logout</a>
        <?php
    }
?>

<a href="{{route('post.create')}}">Ajouter un post</a>

@section('content')
    @forelse($posts as $post)
        <ul>
            @if($post->post_type === "formation")
                <li><a href="{{url('formation', $post->id)}}">{{$post->title}}</a></li>
            @elseif($post->post_type === "stage")
                <li><a href="{{url('stage', $post->id)}}">{{$post->title}}</a></li>
            @endif
            <li>{{$post->post_type}}</li>
            <li>{{$post->description}}</li>
            <li>{{$post->begin_date}}</li>
            <li>{{$post->max_students}}</li>
            <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn" type="submit" value="delete">
            </form>
            
            <a href="{{route('post.show', $post->id)}}">Show</a>
            <a href="{{route('post.edit', $post->id)}}">Edit</a>
        </ul>
        @empty
            <li>Aucun posts</li>
    @endforelse
@endsection






















