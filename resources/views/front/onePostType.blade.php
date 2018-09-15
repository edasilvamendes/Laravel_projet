@extends('layouts.master')

@section('content')
    <section class="formation-stage">
        <div class="left-content">
            <div class="child-item Onechild-item">
                <div class="left-item">
                    @if($onePost->picture)
                        <img class="image" src="{{url('images', $onePost->picture->link)}}" alt="">
                    @endif
                </div>
            
                <div class="right-item">
                    @if($onePost->post_type === "formation")
                    <h2><a href="{{url('formation', $onePost->id)}}">{{$onePost->title}}</a></h2>
                    @elseif($onePost->post_type === "stage")
                    <h2><a href="{{url('stage', $onePost->id)}}">{{$onePost->title}}</a></h2>
                    @endif
                    <span>{{$onePost->post_type}}</span>
                    <p>{{$onePost->description}}</p>
                    <span>Date de début: {{$onePost->begin_date}}</span>
                    <span>Date de fin: {{$onePost->end_date}}</span>
                    <span>Nombre max d'étudiants: {{$onePost->max_students}}</span>
                    <span>Prix: {{$onePost->price}} $</span>
                </div>
            </div>
        </div>
    </section>
@endsection































































