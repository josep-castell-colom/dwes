<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $validate = $request->validate([
        //     'titulo' => 'required',
        //     'extracto' => 'required',
        //     'contenido' => 'required',
        // ]);

        // Validación con FormRequest
        $validated = $request->validated();

        $comentable = $request->get('comentable') === 'on' ? true : false;
        $caducable = $request->get('caducable') === 'on' ? true : false;

        Post::factory()->create([
            'titulo' => $request->get('titulo'),
            'extracto' => $request->get('extracto'),
            'contenido' => $request->get('contenido'),
            'comentable' => $comentable,
            'caducable' => $caducable,
            'acceso' => $request->get('acceso'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (! Gate::allows('edit-post', $post)){
            abort(403);
        }

        return view('post.edit', ['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if (! Gate::allows('edit-post', $post)){
            abort(403);
        }

        $validated = $request->validated();

        $caducable = $request->get('caducable') === 'on' ? true : false;
        $comentable = $request->get('comentable') === 'on' ? true : false;

        $post->titulo = $request->get('titulo');
        $post->extracto = $request->get('extracto');
        $post->contenido = $request->get('contenido');
        $post->caducable = $caducable;
        $post->comentable = $comentable;
        $post->acceso = $request->get('acceso');

        $post->update();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (! Gate::allows('delete-post', $post)){
            abort(403);
        }

        $post->delete();

        return redirect('/posts');
    }
}
