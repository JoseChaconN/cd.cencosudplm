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
        Schema::create('frigorificos_razones_sociales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_frigorifico')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('rut')->nullable();
            $table->string('marca')->nullable();
            $table->string('sif')->nullable();
            $table->integer('status')->default(1);
            $table->json('planillas')->nullable();
            $table->integer('pais')->nullable();
            $table->string('ciclo_3')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frigorificos_razones_sociales');
    }
};
