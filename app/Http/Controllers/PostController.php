<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Armazena todos os posts em uma variável ordenados por ordem de criação
        $posts = Post::all()->sortByDesc('created_at');

        // Mostra ao usuário a view resources/views/posts/index.blade.php com todos os psots
        return view("posts.index")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra ao usuário a view resources/views/posts/create.blade.php
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cria uma instancia da classe/model post
        $post = new Post;
        // Armazena os dados enviados pelo usuário
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // Armazena o usuário criador do post (usuário atualmente logado)
        $post->user_id = Auth::id();

        // Salva o post no banco de dados
        $post->save();

        // Mostra o post criado ao usuário
        return view("posts.show")->with("post", $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Armazena em uma variável os dados de um post específico
        $post = Post::find($id);

        // Mostra o post ao usuário
        return view("posts.show")->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Armazena em uma variável os dados de um post específico
        $post = Post::find($id);

        // Mostra ao usuário o formulário de edição de um post específico
        return view("posts.edit")->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Armazena em uma variável os dados de um post específico
        $post = Post::find($id);

        // Armazena os novos dados enviados pelo usuário
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        // Atualiza os dados do post no banco de dados
        $post->save();

        // Mostra ao usuário o post com os dados atualizados
        return view("posts.show")->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Apaga um post específico
        Post::destroy($id);

        // Mostra o usuário todos os posts
        return to_route('posts.index');
    }
}
