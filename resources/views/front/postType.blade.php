@extends('layouts.master')

@section('content')
    <section class="formation-stage">
        <div class="left-content">
            {{$posts->links()}}
            @forelse($posts as $post)
                <div class="child-item">
                    <div class="left-item">
                        @if($post->picture)
                            <img class="image" src="{{url('images', $post->picture->link)}}" alt="">
                        @endif
                    </div>
                
                    <div class="right-item">
                        @if($post->post_type === "formation")
                        <h2><a href="{{url('formation', $post->id)}}">{{$post->title}}</a></h2>
                        @elseif($post->post_type === "stage")
                        <h2><a href="{{url('stage', $post->id)}}">{{$post->title}}</a></h2>
                        @endif
                        <p>{{$post->description}}</p>
                        <span>Date de début: {{$post->begin_date}}</span>
                    </div>
                </div>
            @empty
                Aucun post
            @endforelse
        </div>

        <div class="right-content">
            <form method="get" action="{{route('search')}}" enctype="multipart/form-data" class="form-search">
                @csrf
                <label>Moteur de recherche</label>
                <input name="search" type="search" placeholder="Rechercher" aria-label="Search">
                <button type="submit">Rechercher</button>
            </form>
        </div>

    </section>
@endsection









































