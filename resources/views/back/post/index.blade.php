@extends('layouts.master')

@section('content')
<section class="show-post">
    <div class="add-post">
        <a href="{{route('post.create')}}">Ajouter un post</a>
    </div>

    {{$posts->links()}}

    <table class="post-table">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Prix</th>
                <th>Etudiant max</th>

                <th>Show</th>
                <th>Edit</th>
                <th>Supprimer</th>
            </tr>
        </thead>


        <tbody class="content-post-table">

            @forelse($posts as $post)
            <tr>
                @if($post->post_type === "formation")
                    <td><a href="{{url('formation', $post->id)}}">{{$post->title}}</a></td>
                    @elseif($post->post_type === "stage")
                    <td><a href="{{url('stage', $post->id)}}">{{$post->title}}</a></td>
                @endif
                <td>{{$post->post_type}}</td>
                <td>{{$post->begin_date}}</td>
                <td>{{$post->end_date}}</td>
                <td>{{$post->price}}</td>
                <td>{{$post->max_students}}</td>

                <td><a href="{{route('post.show', $post->id)}}">Show</a></td>
                <td><a href="{{route('post.edit', $post->id)}}">Edit</a></td>
                
                <td>
                    <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="btn" type="submit" value="delete">
                    </form>
                </td>
            </tr>
            @empty
                Aucun post
            @endforelse
        </tbody>
    </table>
</section>
@endsection































