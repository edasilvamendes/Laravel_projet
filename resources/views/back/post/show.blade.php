@extends('layouts.master')

@section('content')
    <section class="home">
        <div class="left-content">
                <div class="child-item Onechild-item">
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
                        <span>{{$post->post_type}}</span>
                        <p>{{$post->description}}</p>
                        <span>Date de début: {{$post->begin_date}}</span>
                        <span>Date de fin: {{$post->end_date}}</span>
                        <span>Nombre max d'étudiants: {{$post->max_students}}</span>
                        <span>Prix: {{$post->price}} $</span>
                    </div>
                </div>
        </div>
    </section>
@endsection






