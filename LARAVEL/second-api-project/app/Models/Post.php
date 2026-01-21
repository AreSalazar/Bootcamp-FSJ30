<?php
//El modelo es el que se conecta con la BD, no el controller
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use SoftDeletes;//Lo último que se ha hecho después de crar la copia de la tabla posts

    //ESTE ES EL MODELO DE POST
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    //le declaramos que este modelo tiene una relación el usuario
    public function user()
    {
        return $this->belongsTo(User::class); //belongsTo le dice a Laravel que este user_id va a salir del usuario que ejecutó esta petición
    }

    //Cada post puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    //Jairo lo puso aquí pero va en un controller se supone
    public function getAllPostsWithAuthorsQueryBuilder() //Quitalo en la tarea, creo que debe de ir aparte.... o no
    {
        return  DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name as author')->get();
    }
}
