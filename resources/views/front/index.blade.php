@extends('layouts.master')

<?php
    if (Auth::check()) { 
        ?>
            <a href="{{url('/login')}}">Admin</a>
            <a href="{{url('/logout')}}">Logout</a>
        <?php
    }
?>

@section('content')
    <section class="home">

        <div class="left-content flex">
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
        </div>

        <div class="right-content flex">
            <form method="get" action="{{route('search')}}" enctype="multipart/form-data">
                @csrf
                <input name="search" type="search" placeholder="Search" aria-label="Search">
                <button type="submit">Search</button>
            </form>
        </div>

    </section>
@endsection



















