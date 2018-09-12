@extends('layouts.master')

@section('content')
    <div>
        @forelse($posts as $post)
            <p>{{$post->title}}</p>
            <p>{{$post->description}}</p>
            @empty
        @endforelse
    </div>
@endsection
















