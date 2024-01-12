<?php

namespace App\Http\Controllers;

use App\Models\FrigorificoRazonSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Inspeccion;
use App\Models\User;
use App\Models\Pais;
use App\Models\ProductosInspeccion;
use App\Models\ProductosCajasInspeccion;

class InspeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function pre_create(Request $request)
    {
        //
        $data['request'] = $request;
        $data['frigorificos'] = [];
        if(!empty($request->input('nombre_frigorifico')) || !empty($request->input('nombre_razon_social')) || !empty($request->input('rut_razon_social'))){
            #\DB::enableQueryLog();
            $frigorificos = FrigorificoRazonSocial::with('frigorifico_razon','pais_razon');
            if(!empty($request->input('nombre_frigorifico'))){
                $nombre_frigorifico=$request->input('nombre_frigorifico');
                $frigorificos->WhereHas('frigorifico_razon', function ($query) use ($nombre_frigorifico) {
                    $query->where('nombre', 'LIKE', "%$nombre_frigorifico%");
                });
            }
            if(!empty($request->input('nombre_razon_social'))){
                $nombre_razon_social=$request->input('nombre_razon_social');
                $frigorificos->orWhere('razon_social', 'LIKE', "%$nombre_razon_social%");
            }
            if(!empty($request->input('rut_razon_social'))){
                $rut_razon_social=$request->input('rut_razon_social');
                $frigorificos->orWhere('rut', 'LIKE', "%$rut_razon_social%");
            }
            $data['frigorificos']=$frigorificos->get();
            #dd(\DB::getQueryLog());
        }
        
        
        return view('inspecciones.pre-inspeccion', $data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id, string $planilla)
    {
        //
        $data['inspeccion'] = new Inspeccion;
        $data['razon_social'] = FrigorificoRazonSocial::with('frigorifico_razon')->find($id);
        $planilla_view = ($planilla == 1) ? 'sgl-re-cc-027-planilla' : ($planilla == 2 ? 'sgl-re-cc-074-planilla' : ''); #$planilla == 1 ) ? 'sgl-re-cc-027-planilla' : ;
        $data['tecnologos'] = User::all();
        $data['paises'] = Pais::orderBy('nombre', 'asc')->get();
        if(!empty($planilla_view)){
            return view('inspecciones/'.$planilla_view, $data);
        }else{
            return redirect()->route('inspecciones.pre.create')
            ->with('notification_type', 'danger')
            ->with('notification_message', 'Planilla no encontrada!');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id=NULL;
        try {            
            DB::transaction(function () use ($request, &$id) {
                if($request->input('planilla') == 1){
                    $inspeccion = Inspeccion::create([
                        'planilla' => 1,
                        'status' => 1,
                        'id_razon_social' => $request->input('id_razon_social'),
                        'id_user' => Auth::user()->id,
                        'n_resolucion' => $request->input('n_resolucion'),
                        'fecha_resolucion' => $request->input('fecha_resolucion'),
                        't_apertura' => $request->input('t_apertura'),
                        'fecha_recepcion' => date('Y-m-d'),#$request->input('fecha_recepcion'),
                        'n_camion' => $request->input('n_camion'),
                        'n_cortes_factura' => $request->input('n_cortes_factura'),
                        'fecha_revision' => $request->input('fecha_revision'),
                        'retiro_muestra' => $request->input('retiro_muestra'),
                        'peso_neto' => $request->input('peso_neto'),
                        't_entre_cortes' => $request->input('t_entre_cortes'),
                        'dias_traslado' => $request->input('dias_traslado'),
                        'n_cajas' => $request->input('n_cajas'),
                        't_rotulada' => $request->input('t_rotulada'),
                        'orden_compra' => $request->input('orden_compra'),
                        'porcent_cajas_revisadas' => $request->input('porcent_cajas_revisadas'),
                        'fecha_elaboracion_otorgada' => $request->input('fecha_elaboracion_otorgada'),
                        'pais_origen' => $request->input('pais_origen'),
                        'fecha_vencimiento_otorgada' => $request->input('fecha_vencimiento_otorgada'),
                        'respaldo_microbiologico' => $request->input('respaldo_microbiologico'),
                        'frigorifico_elaborador' => $request->input('frigorifico_elaborador'),
                        'n_planta_faenadora' => $request->input('n_planta_faenadora'),
                        'fecha_despacho_origen' => $request->input('fecha_despacho_origen'),
                        'porc_vida_util' => $request->input('porc_vida_util'),
                        'porc_vida_util_unidad' => $request->input('porc_vida_util_unidad'),
                        'n_factura' => $request->input('n_factura'),
                        'autorizado_por' => $request->input('autorizado_por'),
                        'tipo_importacion' => $request->input('tipo_importacion'),
                        'n_guia_despacho' => $request->input('n_guia_despacho'),
                        'tipo_termografo' => $request->input('tipo_termografo'),
                        'n_termografo' => $request->input('n_termografo'),
                        't_min_max_termografo' => $request->input('t_min_max_termografo'),
                        'embalaje' => $request->input('embalaje'),
                        'tipo_estiba' => $request->input('tipo_estiba'),
                        'tecnologos' => json_encode($request->input('id_tecnologo')),
                    ]);
                }
                if($request->input('planilla') == 2){
                    $inspeccion = Inspeccion::create([
                        'planilla' => 2,
                        'status' => 1,
                        'id_razon_social' => $request->input('id_razon_social'),
                        'id_user' => Auth::user()->id,
                        'n_resolucion' => $request->input('n_resolucion'),
                        'fecha_resolucion' => $request->input('fecha_resolucion'),
                        't_apertura' => $request->input('t_apertura'),
                        'fecha_recepcion' => date('Y-m-d'),#$request->input('fecha_recepcion'),
                        'n_camion' => $request->input('n_camion'),
                        'n_cortes_factura' => $request->input('n_cortes_factura'),
                        'fecha_revision' => $request->input('fecha_revision'),
                        'peso_neto' => $request->input('peso_neto'),
                        't_entre_cortes' => $request->input('t_entre_cortes'),
                        'n_cajas' => $request->input('n_cajas'),
                        'orden_compra' => $request->input('orden_compra'),
                        'porcent_cajas_revisadas' => $request->input('porcent_cajas_revisadas'),
                        'frigorifico_elaborador' => $request->input('frigorifico_elaborador'),
                        'fecha_despacho_origen' => $request->input('fecha_despacho_origen'),
                        'porc_vida_util' => $request->input('porc_vida_util'),
                        'porc_vida_util_unidad' => $request->input('porc_vida_util_unidad'),
                        'n_factura' => $request->input('n_factura'),
                        'tipo_termografo' => $request->input('tipo_termografo'),
                        'n_termografo' => $request->input('n_termografo'),
                        't_min_max_termografo' => $request->input('t_min_max_termografo'),
                        'tipo_estiba' => $request->input('tipo_estiba'),
                        'tecnologos' => json_encode($request->input('id_tecnologos')),
                    ]);
                }
                $id = $inspeccion->id;
                #DOCUMENTOS Y RESOLUCION SANITARIOA
                    $doc_origen_1 = $request->file('doc_origen_1');
                    if (!empty($doc_origen_1)) {
                        if ($doc_origen_1->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($doc_origen_1)->toMediaCollection('documento_origen_1');
                        }
                    }
                    $doc_origen_2 = $request->file('doc_origen_2');
                    if (!empty($doc_origen_2)) {
                        if ($doc_origen_2->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($doc_origen_2)->toMediaCollection('documento_origen_2');
                        }
                    }
                    $doc_origen_3 = $request->file('doc_origen_3');
                    if (!empty($doc_origen_3)) {
                        if ($doc_origen_3->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($doc_origen_3)->toMediaCollection('documento_origen_3');
                        }
                    }
                    $res_sanitaria_1 = $request->file('res_sanitaria_1');
                    if (!empty($res_sanitaria_1)) {
                        if ($res_sanitaria_1->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($res_sanitaria_1)->toMediaCollection('resolucion_sanitaria_1');
                        }
                    }
                    $res_sanitaria_2 = $request->file('res_sanitaria_2');
                    if (!empty($res_sanitaria_2)) {
                        if ($res_sanitaria_2->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($res_sanitaria_2)->toMediaCollection('resolucion_sanitaria_2');
                        }
                    }
                    $res_sanitaria_3 = $request->file('res_sanitaria_3');
                    if (!empty($res_sanitaria_3)) {
                        if ($res_sanitaria_3->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $inspeccion->addMedia($res_sanitaria_3)->toMediaCollection('resolucion_sanitaria_3');
                        }
                    }
                #$productos
                if(!empty($request->input('id_corte'))){
                    $vida_util_corte=$request->input('vida_util_corte');
                    $codigo_sap_corte=$request->input('codigo_sap_corte');
                    $id_producto=$request->input('id_producto');

                    $id_corte_box = $request->input('id_corte_box');
                    $f_faena_box = $request->input('f_faena_box');
                    $f_elaboracion_box = $request->input('f_elaboracion_box');
                    $f_vencimiento_box = $request->input('f_vencimiento_box');
                    $temperatura_box = $request->input('temperatura_box');
                    $frigorifico_origen_box = $request->input('frigorifico_origen_box');
                    $unidad_defectuosas_box = $request->input('unidad_defectuosas_box');
                    $kg_rechazados_box = $request->input('kg_rechazados_box');
                    $defecto_box = $request->input('defecto_box');
                    $observacion_box = $request->input('observacion_box');
                    $archivo_box = $request->file('archivo_box');
                    foreach ($request->input('id_corte') as $key => $value) {
                        $producto_inspeccion = ProductosInspeccion::create([
                            'id_inspeccion' => $inspeccion->id,
                            'id_producto' => $id_producto[$value],
                            'vida_util' => $vida_util_corte[$value],
                            'codigo_sap' => $codigo_sap_corte[$value],
                        ]);
                        if(!empty($id_corte_box[$value])){
                            foreach ($id_corte_box[$value] as $k => $v) {
                                $producto_caja_inspeccion = ProductosCajasInspeccion::create([
                                    'id_producto' => $producto_inspeccion->id,
                                    'id_inspeccion' => $inspeccion->id,
                                    'fecha_faena' => $f_faena_box[$value][$k],
                                    'fecha_elaboracion' => $f_elaboracion_box[$value][$k],
                                    'fecha_vencimiento' => $f_vencimiento_box[$value][$k],
                                    'temperatura' => $temperatura_box[$value][$k],
                                    'frigorifico_origen' => $frigorifico_origen_box[$value][$k],
                                    'unidades_defectuosas' => $unidad_defectuosas_box[$value][$k],
                                    'kg_rechazados' => $kg_rechazados_box[$value][$k],
                                    'defecto' => json_encode($defecto_box[$value][$value]),
                                    'observaciones' => $observacion_box[$value][$k],                                    
                                ]);
                                if (!empty($archivo_box[$value])) {
                                    foreach ($archivo_box[$value] as $imagen) {
                                        if ($imagen->isValid()) {
                                            // Guarda la imagen en la librería de medios del producto
                                            $producto_caja_inspeccion->addMedia($imagen)->toMediaCollection('inspeccion_imagen_producto_corte');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            });
            return redirect()->route('inspecciones.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Inspección creada correctamente!');
        } catch (\Exception $e) {
            echo "ERROR";
            echo "<br>";
            echo $e->getMessage();
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            #return redirect()->route('auditorias.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al crear la auditoría: ' . $e->getMessage());
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['inspeccion'] = Inspeccion::with('productos_inspeccion','productos_cajas_inspeccion')->find($id);
        $planilla_view = ($data['inspeccion']->planilla == 1) ? 'sgl-re-cc-027-planilla' : ($data['inspeccion']->planilla == 2 ? 'sgl-re-cc-074-planilla' : ''); #$planilla == 1 ) ? 'sgl-re-cc-027-planilla' : ;
        $data['tecnologos'] = User::all();
        $data['paises'] = Pais::orderBy('nombre', 'asc')->get();
        if(!empty($planilla_view)){
            return view('inspecciones/'.$planilla_view, $data);
        }else{
            return redirect()->route('inspecciones.pre.create')
            ->with('notification_type', 'danger')
            ->with('notification_message', 'Planilla no encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            DB::transaction(function () use ($request, &$id){
                $inspeccion = Inspeccion::find($id);
                #$old_data = $inspeccion->getOriginal();
                if($inspeccion->planilla == 1){
                    $inspeccion->update([
                        'status' => $request->input('status'),
                        'n_resolucion' => $request->input('n_resolucion'),
                        'fecha_resolucion' => $request->input('fecha_resolucion'),
                        't_apertura' => $request->input('t_apertura'),                    
                        'n_camion' => $request->input('n_camion'),
                        'n_cortes_factura' => $request->input('n_cortes_factura'),
                        'fecha_revision' => $request->input('fecha_revision'),
                        'retiro_muestra' => $request->input('retiro_muestra'),
                        'peso_neto' => $request->input('peso_neto'),
                        't_entre_cortes' => $request->input('t_entre_cortes'),
                        'dias_traslado' => $request->input('dias_traslado'),
                        'n_cajas' => $request->input('n_cajas'),
                        't_rotulada' => $request->input('t_rotulada'),
                        'orden_compra' => $request->input('orden_compra'),
                        'porcent_cajas_revisadas' => $request->input('porcent_cajas_revisadas'),
                        'fecha_elaboracion_otorgada' => $request->input('fecha_elaboracion_otorgada'),
                        'pais_origen' => $request->input('pais_origen'),
                        'fecha_vencimiento_otorgada' => $request->input('fecha_vencimiento_otorgada'),
                        'respaldo_microbiologico' => $request->input('respaldo_microbiologico'),
                        'frigorifico_elaborador' => $request->input('frigorifico_elaborador'),
                        'n_planta_faenadora' => $request->input('n_planta_faenadora'),
                        'fecha_despacho_origen' => $request->input('fecha_despacho_origen'),
                        'porc_vida_util' => $request->input('porc_vida_util'),
                        'porc_vida_util_unidad' => $request->input('porc_vida_util_unidad'),
                        'n_factura' => $request->input('n_factura'),
                        'autorizado_por' => $request->input('autorizado_por'),
                        'tipo_importacion' => $request->input('tipo_importacion'),
                        'n_guia_despacho' => $request->input('n_guia_despacho'),
                        'tipo_termografo' => $request->input('tipo_termografo'),
                        'n_termografo' => $request->input('n_termografo'),
                        't_min_max_termografo' => $request->input('t_min_max_termografo'),
                        'embalaje' => $request->input('embalaje'),
                        'tipo_estiba' => $request->input('tipo_estiba'),
                        'tecnologos' => json_encode($request->input('tecnologos')),
                    ]);
                }
                if($inspeccion->planilla == 2){
                    $inspeccion->update([
                        'status' => $request->input('status'),
                        'n_resolucion' => $request->input('n_resolucion'),
                        'fecha_resolucion' => $request->input('fecha_resolucion'),
                        't_apertura' => $request->input('t_apertura'),
                        'n_camion' => $request->input('n_camion'),
                        'n_cortes_factura' => $request->input('n_cortes_factura'),
                        'fecha_revision' => $request->input('fecha_revision'),
                        'peso_neto' => $request->input('peso_neto'),
                        't_entre_cortes' => $request->input('t_entre_cortes'),
                        'n_cajas' => $request->input('n_cajas'),
                        'orden_compra' => $request->input('orden_compra'),
                        'porcent_cajas_revisadas' => $request->input('porcent_cajas_revisadas'),
                        'frigorifico_elaborador' => $request->input('frigorifico_elaborador'),
                        'fecha_despacho_origen' => $request->input('fecha_despacho_origen'),
                        'porc_vida_util' => $request->input('porc_vida_util'),
                        'porc_vida_util_unidad' => $request->input('porc_vida_util_unidad'),
                        'n_factura' => $request->input('n_factura'),
                        'tipo_termografo' => $request->input('tipo_termografo'),
                        'n_termografo' => $request->input('n_termografo'),
                        't_min_max_termografo' => $request->input('t_min_max_termografo'),
                        'tipo_estiba' => $request->input('tipo_estiba'),
                        'tecnologos' => json_encode($request->input('id_tecnologos')),
                    ]);
                }
                #DOCUMENTOS Y RESOLUCION SANITARIOA
                 $doc_origen_1 = $request->file('doc_origen_1');
                 if (!empty($doc_origen_1)) {
                     if ($doc_origen_1->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                        $inspeccion->addMedia($doc_origen_1)->toMediaCollection('documento_origen_1');
                     }
                 }
                 $doc_origen_2 = $request->file('doc_origen_2');
                 if (!empty($doc_origen_2)) {
                     if ($doc_origen_2->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                         $inspeccion->addMedia($doc_origen_2)->toMediaCollection('documento_origen_2');
                     }
                 }
                 $doc_origen_3 = $request->file('doc_origen_3');
                 if (!empty($doc_origen_3)) {
                     if ($doc_origen_3->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                         $inspeccion->addMedia($doc_origen_3)->toMediaCollection('documento_origen_3');
                     }
                 }
                 $res_sanitaria_1 = $request->file('res_sanitaria_1');
                 if (!empty($res_sanitaria_1)) {
                     if ($res_sanitaria_1->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                         $inspeccion->addMedia($res_sanitaria_1)->toMediaCollection('resolucion_sanitaria_1');
                     }
                 }
                 $res_sanitaria_2 = $request->file('res_sanitaria_2');
                 if (!empty($res_sanitaria_2)) {
                     if ($res_sanitaria_2->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                         $inspeccion->addMedia($res_sanitaria_2)->toMediaCollection('resolucion_sanitaria_2');
                     }
                 }
                 $res_sanitaria_3 = $request->file('res_sanitaria_3');
                 if (!empty($res_sanitaria_3)) {
                     if ($res_sanitaria_3->isValid()) {
                         // Guarda la imagen en la librería de medios del producto
                         $inspeccion->addMedia($res_sanitaria_3)->toMediaCollection('resolucion_sanitaria_3');
                     }
                 }
                #$productos
                    if(!empty($request->input('id_corte'))){
                        $vida_util_corte=$request->input('vida_util_corte');
                        $codigo_sap_corte=$request->input('codigo_sap_corte');
                        $id_producto=$request->input('id_producto');

                        $id_corte_box = $request->input('id_corte_box');
                        $f_faena_box = $request->input('f_faena_box');
                        $f_elaboracion_box = $request->input('f_elaboracion_box');
                        $f_vencimiento_box = $request->input('f_vencimiento_box');
                        $temperatura_box = $request->input('temperatura_box');
                        $frigorifico_origen_box = $request->input('frigorifico_origen_box');
                        $unidad_defectuosas_box = $request->input('unidad_defectuosas_box');
                        $kg_rechazados_box = $request->input('kg_rechazados_box');
                        $defecto_box = $request->input('defecto_box');
                        $observacion_box = $request->input('observacion_box');
                        $archivo_box = $request->file('archivo_box');
                        foreach ($request->input('id_corte') as $key => $value) {
                            $producto_inspeccion = ProductosInspeccion::create([
                                'id_inspeccion' => $inspeccion->id,
                                'id_producto' => $id_producto[$value],
                                'vida_util' => $vida_util_corte[$value],
                                'codigo_sap' => $codigo_sap_corte[$value],
                            ]);
                            if(!empty($id_corte_box[$value])){
                                foreach ($id_corte_box[$value] as $k => $v) {
                                    $producto_caja_inspeccion = ProductosCajasInspeccion::create([
                                        'id_producto' => $producto_inspeccion->id,
                                        'id_inspeccion' => $inspeccion->id,
                                        'fecha_faena' => $f_faena_box[$value][$k],
                                        'fecha_elaboracion' => $f_elaboracion_box[$value][$k],
                                        'fecha_vencimiento' => $f_vencimiento_box[$value][$k],
                                        'temperatura' => $temperatura_box[$value][$k],
                                        'frigorifico_origen' => $frigorifico_origen_box[$value][$k],
                                        'unidades_defectuosas' => $unidad_defectuosas_box[$value][$k],
                                        'kg_rechazados' => $kg_rechazados_box[$value][$k],
                                        'defecto' => json_encode($defecto_box[$value][$value]),
                                        'observaciones' => $observacion_box[$value][$k],                                    
                                    ]);
                                    if (!empty($archivo_box[$value])) {
                                        foreach ($archivo_box[$value] as $imagen) {
                                            if ($imagen->isValid()) {
                                                // Guarda la imagen en la librería de medios del producto
                                                $producto_caja_inspeccion->addMedia($imagen)->toMediaCollection('inspeccion_imagen_producto_corte');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if(!empty($request->input('id_producto_exist'))){
                        $vida_util_corte=$request->input('vida_util_corte_exist');
                        $codigo_sap_corte=$request->input('codigo_sap_corte_exist');

                        $id_corte_box_exist = $request->input('id_corte_box_exist');
                        $f_faena_box_exist = $request->input('f_faena_box_exist');
                        $f_elaboracion_box_exist = $request->input('f_elaboracion_box_exist');
                        $f_vencimiento_box_exist = $request->input('f_vencimiento_box_exist');
                        $temperatura_box_exist = $request->input('temperatura_box_exist');
                        $frigorifico_origen_box_exist = $request->input('frigorifico_origen_box_exist');
                        $unidad_defectuosas_box_exist = $request->input('unidad_defectuosas_box_exist');
                        $kg_rechazados_box_exist = $request->input('kg_rechazados_box_exist');
                        $defecto_box_exist = $request->input('defecto_box_exist');
                        $observacion_box_exist = $request->input('observacion_box_exist');
                        $archivo_box_exist = $request->file('archivo_box_exist');
                        foreach ($request->input('id_producto_exist') as $key => $value) {
                            $producto_inspeccion = ProductosInspeccion::find($value);
                            $producto_inspeccion->update([
                                'vida_util' => $vida_util_corte[$value],
                                'codigo_sap' => $codigo_sap_corte[$value],
                            ]);
                            
                            if(!empty($id_corte_box_exist[$value])){
                                foreach ($id_corte_box_exist[$value] as $k => $v) {
                                    $producto_caja_inspeccion = ProductosCajasInspeccion::find($v);
                                    #dd($producto_caja_inspeccion);
                                    if(!empty($producto_caja_inspeccion)){
                                        $producto_caja_inspeccion->update([
                                            'fecha_faena' => $f_faena_box_exist[$value][$v],
                                            'fecha_elaboracion' => $f_elaboracion_box_exist[$value][$v],
                                            'fecha_vencimiento' => $f_vencimiento_box_exist[$value][$v],
                                            'temperatura' => $temperatura_box_exist[$value][$v],
                                            'frigorifico_origen' => $frigorifico_origen_box_exist[$value][$v],
                                            'unidades_defectuosas' => $unidad_defectuosas_box_exist[$value][$v],
                                            'kg_rechazados' => $kg_rechazados_box_exist[$value][$v],
                                            'defecto' => json_encode($defecto_box_exist[$value][$v]),
                                            'observaciones' => $observacion_box_exist[$value][$v],
                                        ]);
                                    }else{
                                        $producto_caja_inspeccion = ProductosCajasInspeccion::create([
                                            'id_producto' => $producto_inspeccion->id,
                                            'id_inspeccion' => $inspeccion->id,
                                            'fecha_faena' => $f_faena_box_exist[$value][$v],
                                            'fecha_elaboracion' => $f_elaboracion_box_exist[$value][$v],
                                            'fecha_vencimiento' => $f_vencimiento_box_exist[$value][$v],
                                            'temperatura' => $temperatura_box_exist[$value][$v],
                                            'frigorifico_origen' => $frigorifico_origen_box_exist[$value][$v],
                                            'unidades_defectuosas' => $unidad_defectuosas_box_exist[$value][$v],
                                            'kg_rechazados' => $kg_rechazados_box_exist[$value][$v],
                                            'defecto' => json_encode($defecto_box_exist[$value][$v]),
                                            'observaciones' => $observacion_box_exist[$value][$v],
                                        ]);
                                    }
                                    if (!empty($archivo_box_exist[$value])) {
                                        foreach ($archivo_box_exist[$value] as $imagen) {
                                            if ($imagen->isValid()) {
                                                // Guarda la imagen en la librería de medios del producto
                                                $producto_caja_inspeccion->addMedia($imagen)->toMediaCollection('inspeccion_imagen_producto_corte');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
            });
            return redirect()->route('inspecciones.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Inspección creada correctamente!');
        } catch (\Exception $e) {
            #echo "ERROR";
            #echo "<br>";
            #echo $e->getMessage();
            return redirect()->route('inspecciones.edit',$id)
            ->with('notification_type', 'danger')
            ->with('notification_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request)
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        $data = Inspeccion::withTrashed()->find($request->input('id'));
        if(!$data){
            return response()->json(['message' => 'Inspeccion no encontrada']);
        }
        activity()
                ->performedOn($data)
                ->causedBy(Auth::user())
                ->log('Inspeccion eliminada');
        $data->delete();
        return response()->json(['message' => 'Inspeccion borrados con éxito']);
    }
    public function inspeccion_proceso_list(Request $request)
    {
        $data['request'] = $request;
        $fecha_revision = $request->input('ano_creado').'-'.$request->input('mes_creado');
        $data['inspecciones']=Inspeccion::with('responsable','razon_social')->where('fecha_revision', 'LIKE', "%$fecha_revision%")->where('status',1)->get();
        return view('inspecciones.list-inspeccion-proceso',$data);
    }
    public function inspeccion_cerrada_list(Request $request)
    {
        $data['request'] = $request;
        $fecha_revision = $request->input('ano_creado').'-'.$request->input('mes_creado');
        $data['inspecciones']=Inspeccion::with('responsable','razon_social')->where('fecha_revision', 'LIKE', "%$fecha_revision%")->where('status',2)->get();
        return view('inspecciones.list-inspeccion-cerrado',$data);
    }
}
