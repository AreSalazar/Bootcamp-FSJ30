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
        //Esta es una copia porque accede a una tabla, en cambio en la real fijate que dice create en vez de table
        Schema::table('posts', function (Blueprint $table) {
            //Agregamos el softDeletes
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //Agregamos el dropSoftDeletes
            $table->dropSoftDeletes();
        });
    }
};
