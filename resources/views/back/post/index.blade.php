@extends('layouts.master')

@section('content')
<section class="show-post">
    <div class="add-post">
        <a href="{{route('post.create')}}">Ajouter un post</a>
    </div>

    {{$posts->links()}}

    @include('back.post.partials.flash')

    <table class="post-table table-responsive">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Prix</th>
                <th>Etudiant max</th>
                <th>Status</th>

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

                @if($post->status === 0) 
                    <td><i class="fas fa-circle non-publier"></i></td>
                @else 
                    <td><i class="fas fa-circle publier"></i></td>
                @endif

                <td><a href="{{route('post.show', $post->id)}}"><i class="fas fa-eye"></i></a></td>
                <td><a href="{{route('post.edit', $post->id)}}"><i class="fas fa-edit"></i></a></td>
                
                <td>
                    <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <input class="btn" type="submit" value="Supprimer">
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

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection































