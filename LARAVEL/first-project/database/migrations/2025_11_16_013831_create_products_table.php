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
        Schema::create('products', function (Blueprint $table) {//LARAVEL lee las tablas en plural
            $table->id();
            $table->string('name');
            $table->decimal('price',8,2);//8 digitos en total, 2 decimales
            $table->text('description')->nullable();//El campo puede ser nulo
            $table->timestamps();//Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
