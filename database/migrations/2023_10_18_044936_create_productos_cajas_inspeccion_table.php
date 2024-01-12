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
        Schema::create('productos_cajas_inspeccion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_inspeccion')->nullable();
            $table->integer('id_producto')->nullable();
            $table->date('fecha_faena')->nullable();
            $table->date('fecha_elaboracion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('frigorifico_origen')->nullable();
            $table->decimal('unidades_defectuosas', 10, 2)->nullable();
            $table->decimal('kg_rechazados', 10, 2)->nullable();
            $table->json('defecto')->nullable();
            $table->longText('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_cajas_inspeccion');
    }
};
