<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //import des alias
use App\Picture;
use App\Category;
use Carbon\Carbon;

class FrontController extends Controller
{

    private $paginate = 5;

	// Récupère les posts et limite à 2, le nombre de post sur la page d'accueil
    public function index() {
        $posts = Post::orderBy('begin_date', 'desc')->with('picture', 'category')->where('status', '1')->limit(2)->get();

        foreach($posts as $post){
            $post->begin_date = Carbon::parse($post->begin_date)->format('Y-m-d');
            $post->end_date = Carbon::parse($post->end_date)->format('Y-m-d');
        }

    	return view('front.index', ['posts' => $posts]);
    }

    // Récupère les posts de type formation
    public function showPostByFormation() {
        $posts = Post::where('post_type', '=', 'formation')->where('status', '1')->paginate($this->paginate); 

        foreach($posts as $post){
            $post->begin_date = Carbon::parse($post->begin_date)->format('Y-m-d');
            $post->end_date = Carbon::parse($post->end_date)->format('Y-m-d');
        }

    	return view('front.postType', ['posts' => $posts]);
    }

    // Récupère les posts de type stage
    public function showPostByStage() {
        $posts = Post::where('post_type', '=', 'stage')->where('status', '1')->paginate($this->paginate);

        foreach($posts as $post){
            $post->begin_date = Carbon::parse($post->begin_date)->format('Y-m-d');
            $post->end_date = Carbon::parse($post->end_date)->format('Y-m-d');
        }

    	return view('front.postType', ['posts' => $posts]);
    }

    // Récupère le post formation par rapport à l'id
    public function showPostByOneFormation(int $id) {
        $onePost = Post::find($id);

        $onePost->begin_date = Carbon::parse($onePost->begin_date)->format('Y-m-d');
        $onePost->end_date = Carbon::parse($onePost->end_date)->format('Y-m-d');

    	return view('front.onePostType', ['onePost' => $onePost]);
    }

    // Récupère le post stage par rapport à l'id
    public function showPostByOneStage(int $id) {
        $onePost = Post::find($id);

        $onePost->begin_date = Carbon::parse($onePost->begin_date)->format('Y-m-d');
        $onePost->end_date = Carbon::parse($onePost->end_date)->format('Y-m-d');

    	return view('front.onePostType', ['onePost' => $onePost]);
    }

    public function showResearch(Request $request){
        $query = $request->search;
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate($this->paginate);

        foreach($posts as $post){
            $post->begin_date = Carbon::parse($post->begin_date)->format('Y-m-d');
            $post->end_date = Carbon::parse($post->end_date)->format('Y-m-d');
        }
        
        return view('front.search', ['posts' => $posts]); 
    }

}






