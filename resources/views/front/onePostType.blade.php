@extends('layouts.master')

@section('content')
    {{$onePost->post_type}}<br/>

    {{$onePost->title}}<br/>
    {{$onePost->description}}<br/>
    {{$onePost->begin_date}}<br/>
    {{$onePost->end_date}}<br/>
    {{$onePost->max_students}}<br/>
    {{$onePost->price}}<br/>
    --
@endsection























