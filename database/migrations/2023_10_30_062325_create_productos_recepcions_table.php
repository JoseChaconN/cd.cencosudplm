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
        Schema::create('productos_recepcion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_recepcion')->nullable();
            $table->integer('id_producto')->nullable();
            $table->string('producto', 250)->nullable();
            $table->integer('vida_util')->nullable();
            $table->string('codigo_sap',250)->nullable();
            $table->integer('tolerancia_ingreso')->unsigned()->nullable()->default();
            $table->integer('tolerancia_despacho')->unsigned()->nullable()->default();
            $table->integer('dias_antes_vencer')->unsigned()->nullable()->default();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_recepcion');
    }
};
