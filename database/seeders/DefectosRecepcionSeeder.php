<?php

namespace Database\Seeders;

use App\Models\DefectosRecepcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectosRecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DefectosRecepcion::insert([
            ['nombre' => 'Fechas Mezcladas'],
            ['nombre' => 'Sin Rotulación'],
            ['nombre' => 'Sin Sello Alto en'],
            ['nombre' => 'Sello "Alto en " no corresponde'],
            ['nombre' => 'Fuera rango vida util aceptable'],
            ['nombre' => 'Envases Abollados'],
            ['nombre' => 'envases Hinchados'],
            ['nombre' => 'Envases con filtración'],
            ['nombre' => 'Envase roto'],
            ['nombre' => 'Envase con sello debil'],
            ['nombre' => 'Etiquetado de origen en mal estado'],
            ['nombre' => 'Diseño defecuoso o envase defectuoso'],
            ['nombre' => 'Fecha Ilegible/sin Fecha'],
            ['nombre' => 'Sin etiqueta/suelta'],
            ['nombre' => 'Presencia de hongos'],
            ['nombre' => 'Sin etiqueta nutricional de origen'],
            ['nombre' => 'Sin Sello Alto en de origen'],
            ['nombre' => 'Etiqueta rota'],
            ['nombre' => 'Perdida de vacio'],
            ['nombre' => 'Daño mecanico'],
            ['nombre' => 'Sin contenido neto o falta de contenido neto'],
            ['nombre' => 'Envase y/o etiquetas manchadas'],
            ['nombre' => 'Envases Oxidados'],
            ['nombre' => 'Presencia de insectos'],
            ['nombre' => 'Analisis ACA'],
            ['nombre' => 'Muestra y analisis ACA, seremi, sag, laboratorio, etc.'],
            ['nombre' => 'Sin sello en tapa'],
            ['nombre' => 'Sin tapa / tapa rota'],
            ['nombre' => 'Presencia materia extraña'],
            ['nombre' => 'Envase oxidado'],
            ['nombre' => 'Unidades humedas'],
        ]);
    }
}
