<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Traer el comentario con su usuario y post asociado
        //Con eloquent
        //$comments = Comment::with(['user', 'post'])->get();

        //Con ELOQUENT pero trayendo el comentario, el nombre del usuario y el titulo del post
        $comments = Comment::with(['user:id,name','post:id,title'])->get();


        //Traer los comentarios con Query Builder de la forma antigua del modelo Comment
        //$commentsQB = Comment::getCommentWithUsersAndPostsQueryBuilder

        return response()->json([
            'message' => 'Comments retrieved succesfully',
            'data' => $comments,
            'status' => 200
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'content' => 'required|string',
                'post_id' => 'required|integer|exists:posts,id'
            ]);

            //Create con los modelos relacionados, esta es otra forma de hacerlo a la de abajo
            //$comment = $request->user()->comments()->create($request->all());

            $comment = Comment::create([
                'content' => $request->content,
                'post_id' => $request->post_id,
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => 'Comment created succefully',
                'data' => $comment,
                'status' => 201
            ], 201);

        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            //Buscar el comentario por su id y ver si no falla la ejecución
            $comment = Comment::findOrFail($id); //En una variable $comment accedemos al modelo (Comment) y busca el id y si falla te manda al catch


            $request->validate([
                'content' => 'required|string'
            ]);

            $comment->update([
                'content' => $request->content
            ]);

            return response()->json([
                'message' => 'Comment updated succefully',
                'data' => $comment,
                'status' => 201
            ], 201);


        }catch(\Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
