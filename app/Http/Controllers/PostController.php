<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post; //import des alias
use App\Picture;
use App\Category;
use Storage;
use Carbon\Carbon;

class PostController extends Controller
{

    private $paginate = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('picture', 'category')->paginate($this->paginate); 

        foreach($posts as $post){
            $post->begin_date = Carbon::parse($post->begin_date)->format('Y-m-d');
            $post->end_date = Carbon::parse($post->end_date)->format('Y-m-d');
        }

        return view('back.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::pluck('name', 'id')->all();
        return view('back.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'post_type' => 'in:formation,stage',
            'title' => 'required',
            'description' => 'required|string',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
            'price' => 'required|numeric',
            'max_students' => 'required|integer',
            'id_category' => 'required|integer',
            'picture' => 'required|image|max:3000',
            'status' => 'boolean'
        ]);
        
        $post = Post::create($request->all());

        $link = $request->file('picture')->store('/');

        $post->picture()->create([
            'link' => $link
        ]);

        $post->save();

        return redirect()->route('post.index')->with('message', 'Le post a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('back.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('back.post.edit', ['categories' => $categories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'post_type' => 'in:formation,stage',
            'title' => 'required',
            'description' => 'required|string',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
            'price' => 'required|numeric',
            'max_students' => 'required|integer',
            'id_category' => 'required|integer',
            'picture' => 'image|max:3000',
            'status' => 'boolean'
        ]);

        //On recup le post souhaité
        $post = Post::find($id);
        //On met a jour les données de ce post
        $post->update($request->all());

        $im = $request->file('picture');

        if(!empty($im)) {

            if(is_null($post->picture) == false) {
                Storage::disk('local')->delete($post->picture->link); //on supprime physiquement l'image
                $post->picture()->delete(); //Supprime l'information en base
            }

            $link = $request->file('picture')->store('/');

            $post->picture()->create([
                'link' => $link
            ]);

        }

        return redirect()->route('post.index')->with('message', 'Le post a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::find($id);

        $picture = $request->file('picture');
        if($post->picture){
           Storage::disk('local')->delete($post->picture->link);
        }

        $post->delete();
        return redirect()->route('post.index')->with('message', 'Le post a bien été supprimé');
    }

}
