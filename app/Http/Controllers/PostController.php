<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('post.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate(Post::rules(), Post::feedback());
        Post::create($request->only(['content', 'user_id', 'category_id' ,'picture', 'date', 'title']));

        return redirect()->back()->with('message', 'Notícia adicionada com sucesso!')->with('type', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function edit(Post $post)
    {
        return view('post.create_edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->only(['content', 'user_id', 'category_id' ,'picture', 'date', 'title']));
        $post->save();

        return redirect()->back()->with('message', 'Notícia editada com sucesso!')->with('type', 'alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('message', 'Noticia deletada com sucesso!')->with('type', 'alert-success');
    }
}
