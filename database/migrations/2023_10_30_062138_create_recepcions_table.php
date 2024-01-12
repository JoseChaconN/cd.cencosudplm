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
        Schema::create('recepciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_creador')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->string('oc', 100)->nullable();
            $table->string('contrato_marco', 100)->nullable();
            $table->string('proveedor', 100)->nullable();
            $table->integer('id_proveedor')->unsigned()->nullable();
            $table->string('rut_proveedor', 100)->nullable();
            $table->string('n_contenedor', 100)->nullable();
            $table->integer('cantidad_contenedor')->unsigned()->nullable();
            $table->integer('cantidad_contenedor_recepcionados')->unsigned()->nullable();
            $table->integer('pais_origen')->unsigned()->nullable();
            $table->date('f_recepcion')->nullable();
            $table->string('t_apertura', 100)->nullable();
            $table->string('cda', 250)->nullable();
            $table->date('f_cda')->nullable();
            $table->string('uyd', 250)->nullable();
            $table->date('f_uyd')->nullable();
            $table->date('seremi_f_inspeccion')->nullable();
            $table->date('f_resolucion')->nullable();
            $table->integer('seremi_resolucion')->nullable();
            $table->string('revision_proyecto_rotulo', 100)->nullable();
            $table->date('f_aprueba_proyecto')->nullable();
            $table->string('dias_recepcion_x_proyecto', 5)->nullable();
            $table->string('etiquetado',50)->nullable();
            $table->string('etiquetado_sello_alto_en',50)->nullable();
            $table->string('toma_muestra',5)->nullable();
            $table->integer('cant_recepcionadas')->unsigned()->nullable();
            $table->integer('cant_revisadas')->unsigned()->nullable();
            $table->decimal('porcentaje_muestra', 5, 2)->nullable();
            $table->string('n_termografo_pallet', 100)->nullable();
            $table->string('t_termografo', 100)->nullable();
            $table->string('tipo_termografo', 100)->nullable();
            $table->integer('almacenaje')->nullable();
            $table->date('fecha_liberado_aca')->nullable();
            $table->date('fecha_liberado_parcial')->nullable();
            $table->date('fecha_liberado_total')->nullable();
            $table->integer('bodega')->unsigned()->nullable();
            $table->integer('tecnologo_aprueba')->unsigned()->nullable();
            $table->integer('tecnologo_recepciona')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepciones');
    }
};
