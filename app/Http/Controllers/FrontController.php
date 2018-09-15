<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //import des alias
use App\Picture;
use App\Category;

class FrontController extends Controller
{

    private $paginate = 5;

	// Récupère les posts et limite à 2, le nombre de post sur la page d'accueil
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->with('picture', 'category')->limit(2)->get(); 
    	return view('front.index', ['posts' => $posts]);
    }

    // Récupère les posts de type formation
    public function showPostByFormation() {
        $posts = Post::where('post_type', '=', 'formation')->paginate($this->paginate); 
    	return view('front.postType', ['posts' => $posts]);
    }

    // Récupère les posts de type stage
    public function showPostByStage() {
        $posts = Post::where('post_type', '=', 'stage')->paginate($this->paginate);
    	return view('front.postType', ['posts' => $posts]);
    }

    // Récupère le post formation par rapport à l'id
    public function showPostByOneFormation(int $id) {
        $onePost = Post::find($id);
    	return view('front.onePostType', ['onePost' => $onePost]);
    }

    // Récupère le post stage par rapport à l'id
    public function showPostByOneStage(int $id) {
        $onePost = Post::find($id);
    	return view('front.onePostType', ['onePost' => $onePost]);
    }

    public function showResearch(Request $request){
        $query = $request->search;
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate($this->paginate);
        return view('front.search', ['posts' => $posts]); 
    }

}






