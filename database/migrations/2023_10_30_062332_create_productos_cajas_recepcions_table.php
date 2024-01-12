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
        Schema::create('productos_cajas_recepcion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_recepcion')->nullable();
            $table->integer('id_producto')->nullable();
            $table->integer('vida_util_producto')->unsigned()->nullable();
            $table->integer('tolerancia_despacho')->unsigned()->nullable();
            $table->integer('tolerancia_ingreso')->unsigned()->nullable();
            $table->integer('dias_antes_vencer')->unsigned()->nullable();
            $table->date('fecha_elab')->nullable();
            $table->string('sap',250)->nullable();
            $table->string('lote', 100)->nullable();
            $table->string('marca', 100)->nullable();
            $table->date('vencimiento')->nullable();
            $table->integer('cant_cajas')->unsigned()->nullable();
            $table->string('requiere_etiquetado', 3)->nullable();
            $table->string('requiere_sello_alto', 3)->nullable();
            $table->string('requiere_trabajo', 3)->nullable();
            $table->decimal('porcentaje_vida_util', 5, 2)->nullable();
            $table->string('temp_producto', 100)->nullable();
            $table->integer('defectos')->unsigned()->nullable();
            $table->longText('obs')->nullable();
            #$table->string('revision_rotulo', 3)->nullable();
            #$table->integer('tec_aprueba')->unsigned()->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_cajas_recepcion');
    }
};
