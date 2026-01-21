<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    //
    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];

    // Declaraciones para que eloquent entienda las relaciones

    //Cada comentario pertenece a un post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //Cada comentario pertenece a un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Esto es si queremos ser específicos y usar la sintaxis de query builder, asi se hacia antes
    //Se pone en el Modelo en vez del Controlador ya que el Modelo es el encargado de trabajar con la BD directamente
    //Esto se hace si se va a usar Query Builder, Pero con Eloquent es posible hacerlo en el controlador
    public function getCommentsWithUsersAndPostsQueryBuilder(){
        return DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->join('posts','comments.post_id','=','posts.id')
        ->select('comments.*','users.name as author','posts.title as post_title')
        ->get();
    }
}
