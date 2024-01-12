<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('inspecciones', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('planilla')->nullable();
            $table->integer('id_razon_social')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('n_resolucion')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->string('t_apertura')->nullable();
            $table->date('fecha_recepcion')->nullable();
            $table->string('n_camion')->nullable();
            $table->integer('n_cortes_factura')->nullable();
            $table->date('fecha_revision')->nullable();
            $table->string('retiro_muestra')->nullable();
            $table->decimal('peso_neto', 10, 2)->nullable();
            $table->string('t_entre_cortes')->nullable();
            $table->integer('dias_traslado')->nullable();
            $table->integer('n_cajas')->nullable();
            $table->string('t_rotulada')->nullable();
            $table->string('orden_compra')->nullable();
            $table->decimal('porcent_cajas_revisadas',10,2)->nullable();
            $table->date('fecha_elaboracion_otorgada')->nullable();
            $table->integer('pais_origen')->nullable();
            $table->date('fecha_vencimiento_otorgada')->nullable();
            $table->string('respaldo_microbiologico')->nullable();
            $table->string('frigorifico_elaborador')->nullable();
            $table->string('n_planta_faenadora')->nullable();
            $table->date('fecha_despacho_origen')->nullable();
            $table->string('porc_vida_util')->nullable();
            $table->string('porc_vida_util_unidad')->nullable();
            $table->string('n_factura')->nullable();
            $table->string('autorizado_por')->nullable();
            $table->string('tipo_importacion')->nullable();
            $table->string('n_guia_despacho')->nullable();
            $table->string('tipo_termografo')->nullable();
            $table->string('n_termografo')->nullable();
            $table->string('t_min_max_termografo')->nullable();
            $table->string('embalaje')->nullable();
            $table->string('tipo_estiba')->nullable();
            $table->integer('status')->default(1);
            $table->json('tecnologos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspecciones');
    }
};
