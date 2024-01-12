<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Frigorifico;
use App\Models\FrigorificoRazonSocial;

class FrigorificoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Frigorifico::insert([
            ['nombre' => 'Frigorifico 1', 'paises' => json_encode([152])],
            ['nombre' => 'Frigorifico 2', 'paises' => json_encode([152])]
        ]);
        FrigorificoRazonSocial::insert([
            ['id_frigorifico' => 1,'razon_social' => 'Razon Social 1', 'rut' => '26080447-2', 'marca' => 'Marca 1', 'sif' => '01-02,03-04', 'pais' => 152],
            ['id_frigorifico' => 2,'razon_social' => 'Razon Social 2', 'rut' => '25662937-3', 'marca' => 'Marca 2', 'sif' => '05-06,07-08', 'pais' => 152],
            ['id_frigorifico' => 2,'razon_social' => 'Razon Social 3', 'rut' => '22642957-5', 'marca' => 'Marca 3', 'sif' => '09-023,0127-032', 'pais' => 152]
        ]);
        #PERMISOS PARA CD
            #PERMISOS PARA MODULO INSPECCIONES
            #Permission::create(['name' => 'preReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor,$rol_tienda]);
            #Permission::create(['name' => 'crearReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor,$rol_tienda]);
            #Permission::create(['name' => 'listAprobarReclamo'])->syncRoles([$rol_admin,$rol_supervisor]);
            #Permission::create(['name' => 'listProcesoReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor]);
            #Permission::create(['name' => 'procesoReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor]);
            #Permission::create(['name' => 'listCerradoReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor]);
            #Permission::create(['name' => 'cerradoReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor]);
            #Permission::create(['name' => 'pdfReclamo'])->syncRoles([$rol_admin,$rol_administrador,$rol_tecnologo,$rol_supervisor,$rol_tienda]);
    }
}