<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            // Query Builder
            //Esto lo traje de Post.php
            //return Post::getAllPostsWithAuthorsQueryBuilder();


            //Eloquent
            $posts = Post::with(['user'])->get();

            return response()->json([
                'data' => $posts,
                'status' => 200
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string'
            ]);

            //Create con eloquent y sin los modelos relacionados
            //$post = Post::create($request->all());

            //Create con los modelos relacionados
            $post = $request->user()->posts()->create($request->all()); //gracias a esto, no tengo que pone el user_id, solo el title y content en el body del http://localhost:8000/api/posts


            // Create extrayendo los datos del request y extrayendo el user_id del usuario autenticado
            /*
            $postcito = Post::create([
                'title' => $request->title,
                'content' => $requeste->content,
                'user_id' => $request->user()->id
            ])Esta es otra forma de hacerlo, pero nos quedamos con el de arriba*/

            return response()->json([
                'message' => 'Post Created Successfully',
                'data' => $post,
                'status' => 201
            ], 201);

        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //No hay necesidad que me pasen todo el post, en este caso solo necesito el id
    {
        //
        try {
            //Buscar el post por su id y ver si no falla la ejecución
            $post = Post::findOrFail($id); //En una variable $post accedemos al modelo (Post) y busca el id y si falla te manda al catch

            //En caso que funcione, actualizamos el post
            $post->update($request->all());

            //Segunda forma de actualizar
            /*$request->title && $post->title = $request->title;
            $post->content = $request->content;
            $post->save();*/

            //Tercera forma de actualizar, más recomendable por ser más específico según Jairo'
            /*$post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);*/

            return response()->json([
                'message' => 'Post updated succesfully',
                'data' => $post,
                'status' => 200
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * SoftDeletes at the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $post = Post::findOrFail($id);

            $post->delete();

            return response()->json([
                'message' => 'Post Deleted Succesfully',
                'status' => 200
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    public function restore(string $id)
    {
        try {
            //Buscar el post por su id dentro de los eliminados
            $post = Post::withTrashed()->findOrFail($id); //withTrashed buscar dentro de los eliminados

            $post->restore();

            return response()->json([
                'message' => 'Post Restored Succesfully',
                'data' => $post,
                'status' => 200
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }
}
