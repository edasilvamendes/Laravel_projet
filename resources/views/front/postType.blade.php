@extends('layouts.master')

<li>test</li>


@section('content')
    @forelse($posts as $post)
        <ul>
            <li>{{$post->post_type}}</li>
            <li>{{$post->title}}</li>
            <li>{{$post->description}}</li>
            <li>{{$post->begin_date}}</li>
            ----
        </ul>
        @empty
            <li>Aucun posts</li>
    @endforelse
@endsection























