<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');//Le agregamos columnas extras
            $table->text('content');
            //Esta será nuestra Foreign Key (Llave foránea) 
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade')->onUpdate('cascade');//con constrained le agragamos a qué tabla referenciamos y luego a qué columna referenciamos
            //con onDelete: qué va a pasar cuando se elimine ese usuario, le decimos que en cascada elimine los post de ese usuario
            //con onUpdate:  si se actualiza los id usuarios en casacada, vas a actualizar el id al que está referenciando
            $table->timestamps();//Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
