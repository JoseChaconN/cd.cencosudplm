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
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre_corte')->nullable();
            $table->integer('status')->nullable();
            $table->integer('pais')->nullable();
            $table->string('codigo')->nullable();
            $table->string('categoria')->nullable();
            $table->string('descripcion_producto')->nullable();
            $table->longText('conformacion_muscular')->nullable();
            $table->string('id_creador')->nullable();
            $table->string('forma_consumo')->nullable();
            $table->string('formato')->nullable();
            $table->string('cobertura_grasa')->nullable();
            $table->string('cantidad_corte')->nullable();
            $table->string('peso_prom')->nullable();
            $table->string('kg_caja')->nullable();
            $table->char('denominacion_corte')->nullable();
            $table->char('categoria_canal')->nullable();
            $table->char('direccion_procesador')->nullable();
            $table->char('nombre_planta')->nullable();
            $table->char('direccion_importador')->nullable();
            $table->char('resolucion_sanitaria_importacion')->nullable();
            $table->char('peso_neto')->nullable();
            $table->char('pais_origen')->nullable();
            $table->char('condiciones_almacenamiento')->nullable();
            $table->char('fecha_beneficio')->nullable();
            $table->char('fecha_vencimiento')->nullable();
            $table->char('lote')->nullable();
            $table->char('tabla_nutricional')->nullable();
            $table->string('dimensiones_etiqueta')->nullable();
            $table->longText('materialidad_etiqueta')->nullable();
            $table->longText('materialidad_bolsa')->nullable();
            $table->char('denominacion_corte_1')->nullable();
            $table->char('categoria_canal_1')->nullable();
            $table->char('direccion_procesador_1')->nullable();
            $table->char('peso_bruto')->nullable();
            $table->char('fecha_beneficio_1')->nullable();
            $table->char('fecha_vencimiento_1')->nullable();
            $table->string('requerimientos_legales')->nullable();
            $table->string('certificado_sanitario')->nullable();
            $table->string('numero_planta')->nullable();
            $table->string('packing_list')->nullable();
            $table->string('resolucion_sag')->nullable();
            $table->longText('paletizado')->nullable();
            $table->longText('carga_estiba')->nullable();
            $table->longText('cadena_frio')->nullable();
            $table->longText('tolerancia_fechas')->nullable();
            $table->json('revisiones')->nullable(); #TABLA DE REVISIONES
            $table->longText('responsable_preparado')->nullable();
            $table->longText('responsable_aprobado')->nullable();
            #$table->string('foto_corte')->nullable(); VARIAS IMAGEN 
            #$table->string('etiqueta_superior')->nullable(); IMAGEN
            #$table->string('etiqueta_posterior')->nullable(); IMAGEN
            #$table->string('etiqueta_frontal')->nullable(); IMAGEN
            #$table->string('paleta_1')->nullable(); IMAGEN
            #$table->string('paleta_2')->nullable(); IMAGEN
            #$table->string('paleta_3')->nullable(); IMAGEN
            #$table->integer('id_procedimiento')->nullable(); NO SE USAN EN PLATAFORMA ANTIGUA
            #$table->string('origen')->nullable(); NO SE USAN EN PLATAFORMA ANTIGUA
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortes');
    }
};
