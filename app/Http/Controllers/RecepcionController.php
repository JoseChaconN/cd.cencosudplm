<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\DefectosRecepcion;
use App\Models\Pais;
use App\Models\ProductosCajasRecepcion;
use App\Models\ProductosRecepcion;
use App\Models\Proveedor;
use App\Models\Recepcion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function pre_create(Request $request)
    {
        //
        $data['request'] = $request;
        $data['proveedores'] = [];
        if(!empty($request->input('nombre')) || !empty($request->input('rut'))){
            #\DB::enableQueryLog();
            $nombre = $request->input('nombre');
            $rut = $request->input('rut');
            $data['proveedores'] = Proveedor::where('nombre', 'LIKE', "%$nombre%")->where('nombre', 'LIKE', "%$rut%")->get();            
        }
        
        
        return view('recepciones.pre-recepcion', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_proveedor)
    {
        //
        $data = [];
        $data['paises'] = Pais::orderBy('nombre')->get();
        $data['tecnologos'] = User::where('tecnologo_cd',1)->orderBy('name')->get();
        $data['bodegas'] = Bodega::orderBy('nombre')->get();
        $data['proveedor'] = Proveedor::findOrfail($id_proveedor);
        $data['defectos'] = DefectosRecepcion::orderBy('nombre')->get();
        $data['recepcion'] = new Recepcion();
        return view('recepciones.recepcion-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            DB::transaction(function () use ($request, &$recepcion) {
                $proveedor_data= Proveedor::findOrfail($request->input('id_proveedor'));
                $recepcion = Recepcion::create([
                    'id_creador' => Auth::user()->id,
                    'status' => 1,
                    'id_proveedor' => $request->input('id_proveedor'),
                    'proveedor' => $proveedor_data->nombre,
                    'rut_proveedor' => $proveedor_data->rut,
                    'oc' => $request->input('oc'),
                    'contrato_marco' => $request->input('contrato_marco'),                    
                    'n_contenedor' => $request->input('n_contenedor'),
                    'pais_origen' => $request->input('pais_origen'),
                    'cantidad_contenedor' => $request->input('cantidad_contenedor'),
                    'f_recepcion' => $request->input('f_recepcion'),
                    'cantidad_contenedor_recepcionados' => $request->input('cantidad_contenedor_recepcionados'),
                    't_apertura' => $request->input('t_apertura'),
                    'cda' => $request->input('cda'),
                    'f_cda' => $request->input('f_cda'),
                    'toma_muestra' => $request->input('toma_muestra'),
                    'cant_recepcionadas' => $request->input('cant_recepcionadas'),
                    't_termografo' => $request->input('t_termografo'),
                    'cant_revisadas' => $request->input('cant_revisadas'),
                    'n_termografo_pallet' => $request->input('n_termografo_pallet'),
                    'tipo_termografo' => $request->input('tipo_termografo'),
                    'porcentaje_muestra' => $request->input('porcentaje_muestra'),
                    'almacenaje' => $request->input('almacenaje'),
                    'fecha_liberado_aca' => $request->input('fecha_liberado_aca'),
                    'fecha_liberado_parcial' => $request->input('fecha_liberado_parcial'),
                    'bodega' => $request->input('bodega'),
                    'revision_proyecto_rotulo' => $request->input('revision_proyecto_rotulo'),
                    'dias_recepcion_x_proyecto' => $request->input('dias_recepcion_x_proyecto'),
                    'tecnologo_aprueba' => $request->input('tecnologo_aprueba'),
                    'tecnologo_recepciona' => $request->input('tecnologo_recepciona'),
                    'uyd' => $request->input('uyd'),
                    'f_uyd' => $request->input('f_uyd'),
                    'seremi_f_inspeccion' => $request->input('seremi_f_inspeccion'),
                    'f_aprueba_proyecto' => $request->input('f_aprueba_proyecto'),
                    'seremi_resolucion' => $request->input('seremi_resolucion'),
                    'f_resolucion' => $request->input('f_resolucion'),
                    'etiquetado' => $request->input('etiquetado'),
                    'etiquetado_sello_alto_en' => $request->input('etiquetado_sello_alto_en'),
                ]);
                $id_producto_recepcion_array = $request->input('id_producto_recepcion');
                $id_producto_array = $request->input('id_producto');
                $producto_array = $request->input('producto');
                $sap_producto_array = $request->input('sap_producto');
                $vida_util_producto_array = $request->input('vida_util_producto');
                $tolerancia_ingreso_array = $request->input('tolerancia_ingreso');
                $tolerancia_despacho_array = $request->input('tolerancia_despacho');
                $dias_antes_vencer_array = $request->input('dias_antes_vencer');
                $fecha_elab_box_array = $request->input('fecha_elab_box');
                $sap_box_array = $request->input('sap_box');
                $lote_box_array = $request->input('lote_box');
                $marca_box_array = $request->input('marca_box');
                $vencimiento_box_array = $request->input('vencimiento_box');
                $cant_cajas_box_array = $request->input('cant_cajas_box');
                $requiere_etiquetado_box_array = $request->input('requiere_etiquetado_box');
                $requiere_sello_alto_box_array = $request->input('requiere_sello_alto_box');
                $requiere_trabajo_box_array = $request->input('requiere_trabajo_box');
                $porcentaje_vida_util_box_array = $request->input('porcentaje_vida_util_box');
                $temp_producto_box_array = $request->input('temp_producto_box');
                $defecto_box_array = $request->input('defecto_box');
                $observacion_box_array = $request->input('observacion_box');
                if (!empty($request->input('id_producto_recepcion'))) {
                    foreach ($request->input('id_producto_recepcion') as $key => $value) {
                        $producto_recepcion = ProductosRecepcion::create([
                            'id_recepcion' => $recepcion->id,
                            'id_producto' => $id_producto_array[$key],
                            'producto' => $producto_array[$key],
                            'codigo_sap' => $sap_producto_array[$key],
                            'vida_util' => $vida_util_producto_array[$key],
                            'tolerancia_ingreso' => $tolerancia_ingreso_array[$key],
                            'tolerancia_despacho' => $tolerancia_despacho_array[$key],
                            'dias_antes_vencer' => $dias_antes_vencer_array[$key],
                        ]);
                        if(!empty($sap_box_array[$value])){
                            foreach ($sap_box_array[$value] as $k => $v) {
                                $producto_caja_recepcion = ProductosCajasRecepcion::create([
                                    'id_recepcion' => $recepcion->id,
                                    'id_producto' => $producto_recepcion->id,
                                    'vida_util_producto' => $vida_util_producto_array[$key],
                                    'tolerancia_despacho' => $tolerancia_despacho_array[$key],
                                    'tolerancia_ingreso' => $tolerancia_ingreso_array[$key],
                                    'dias_antes_vencer' => $dias_antes_vencer_array[$key],
                                    'fecha_elab' => $fecha_elab_box_array[$value][$k],
                                    'sap' => $sap_box_array[$value][$k],
                                    'lote' => $lote_box_array[$value][$k],
                                    'marca' => $marca_box_array[$value][$k],
                                    'vencimiento' => $vencimiento_box_array[$value][$k],
                                    'cant_cajas' => $cant_cajas_box_array[$value][$k],
                                    'requiere_etiquetado' => $requiere_etiquetado_box_array[$value][$k],
                                    'requiere_sello_alto' => $requiere_sello_alto_box_array[$value][$k],
                                    'requiere_trabajo' => $requiere_trabajo_box_array[$value][$k],
                                    'porcentaje_vida_util' => $porcentaje_vida_util_box_array[$value][$k],
                                    'temp_producto' => $temp_producto_box_array[$value][$k],
                                    'defectos' => $defecto_box_array[$value][$k],
                                    'obs' => $observacion_box_array[$value][$k],
                                ]);
                            }
                        }
                    }
                }
            });
            return redirect()->route('recepciones.edit',$recepcion->id)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Recepción creada correctamente!');
        } catch (\Exception $e) {
            #print_r($request->input());
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('recepciones.create',$request->input('id_proveedor'))->with('notification_type', 'danger')->with('notification_message', 'Error al crear el la recepción: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Recepcion $recepcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [];
        $data['paises'] = Pais::orderBy('nombre')->get();
        $data['tecnologos'] = User::where('tecnologo_cd',1)->orderBy('name')->get();
        $data['bodegas'] = Bodega::orderBy('nombre')->get();
        #$data['proveedor'] = Proveedor::findOrfail($id_proveedor);
        $data['defectos'] = DefectosRecepcion::orderBy('nombre')->get();
        $data['recepcion'] = Recepcion::with('productos_recepcion','productos_cajas_recepcion')->find($id);
        return view('recepciones.recepcion-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            DB::transaction(function () use ($request, &$id) {
                $recepcion = Recepcion::findOrfail($id);
                $recepcion->update([
                    'status' => $request->input('status'),
                    'oc' => $request->input('oc'),
                    'contrato_marco' => $request->input('contrato_marco'),
                    'n_contenedor' => $request->input('n_contenedor'),
                    'pais_origen' => $request->input('pais_origen'),
                    'cantidad_contenedor' => $request->input('cantidad_contenedor'),
                    'f_recepcion' => $request->input('f_recepcion'),
                    'cantidad_contenedor_recepcionados' => $request->input('cantidad_contenedor_recepcionados'),
                    'cda' => $request->input('cda'),
                    'f_cda' => $request->input('f_cda'),
                    'toma_muestra' => $request->input('toma_muestra'),
                    'cant_recepcionadas' => $request->input('cant_recepcionadas'),
                    't_apertura' => $request->input('t_apertura'),
                    't_termografo' => $request->input('t_termografo'),
                    'cant_revisadas' => $request->input('cant_revisadas'),
                    'n_termografo_pallet' => $request->input('n_termografo_pallet'),
                    'tipo_termografo' => $request->input('tipo_termografo'),
                    'porcentaje_muestra' => $request->input('porcentaje_muestra'),
                    'almacenaje' => $request->input('almacenaje'),
                    'fecha_liberado_aca' => $request->input('fecha_liberado_aca'),
                    'fecha_liberado_parcial' => $request->input('fecha_liberado_parcial'),
                    'bodega' => $request->input('bodega'),
                    'revision_proyecto_rotulo' => $request->input('revision_proyecto_rotulo'),
                    'dias_recepcion_x_proyecto' => $request->input('dias_recepcion_x_proyecto'),
                    'tecnologo_aprueba' => $request->input('tecnologo_aprueba'),
                    'tecnologo_recepciona' => $request->input('tecnologo_recepciona'),
                    'uyd' => $request->input('uyd'),
                    'f_uyd' => $request->input('f_uyd'),
                    'seremi_f_inspeccion' => $request->input('seremi_f_inspeccion'),
                    'f_aprueba_proyecto' => $request->input('f_aprueba_proyecto'),
                    'seremi_resolucion' => $request->input('seremi_resolucion'),
                    'f_resolucion' => $request->input('f_resolucion'),
                    'etiquetado' => $request->input('etiquetado'),
                    'etiquetado_sello_alto_en' => $request->input('etiquetado_sello_alto_en'),
                ]);
                $id_producto_recepcion_array = $request->input('id_producto_recepcion');
                $id_producto_array = $request->input('id_producto');
                $producto_array = $request->input('producto');
                $sap_producto_array = $request->input('sap_producto');
                $vida_util_producto_array = $request->input('vida_util_producto');
                $tolerancia_ingreso_array = $request->input('tolerancia_ingreso');
                $tolerancia_despacho_array = $request->input('tolerancia_despacho');
                $dias_antes_vencer_array = $request->input('dias_antes_vencer');
                $fecha_elab_box_array = $request->input('fecha_elab_box');
                $sap_box_array = $request->input('sap_box');
                $lote_box_array = $request->input('lote_box');
                $marca_box_array = $request->input('marca_box');
                $vencimiento_box_array = $request->input('vencimiento_box');
                $cant_cajas_box_array = $request->input('cant_cajas_box');
                $requiere_etiquetado_box_array = $request->input('requiere_etiquetado_box');
                $requiere_sello_alto_box_array = $request->input('requiere_sello_alto_box');
                $requiere_trabajo_box_array = $request->input('requiere_trabajo_box');
                $porcentaje_vida_util_box_array = $request->input('porcentaje_vida_util_box');
                $temp_producto_box_array = $request->input('temp_producto_box');
                $defecto_box_array = $request->input('defecto_box');
                $observacion_box_array = $request->input('observacion_box');
                ProductosRecepcion::where('id_recepcion',$id)->delete();
                ProductosCajasRecepcion::where('id_recepcion',$id)->delete();
                foreach ($request->input('id_producto_recepcion') as $key => $value) {
                    $producto_recepcion = ProductosRecepcion::create([
                        'id_recepcion' => $recepcion->id,
                        'id_producto' => $id_producto_array[$key],
                        'producto' => $producto_array[$key],
                        'codigo_sap' => $sap_producto_array[$key],
                        'vida_util' => $vida_util_producto_array[$key],
                        'tolerancia_ingreso' => $tolerancia_ingreso_array[$key],
                        'tolerancia_despacho' => $tolerancia_despacho_array[$key],
                        'dias_antes_vencer' => $dias_antes_vencer_array[$key],
                    ]);
                    if(!empty($sap_box_array[$value])){
                        foreach ($sap_box_array[$value] as $k => $v) {
                            $producto_caja_recepcion = ProductosCajasRecepcion::create([
                                'id_recepcion' => $recepcion->id,
                                'id_producto' => $producto_recepcion->id,
                                'vida_util_producto' => $vida_util_producto_array[$key],
                                'tolerancia_despacho' => $tolerancia_despacho_array[$key],
                                'tolerancia_ingreso' => $tolerancia_ingreso_array[$key],
                                'dias_antes_vencer' => $dias_antes_vencer_array[$key],
                                'fecha_elab' => $fecha_elab_box_array[$value][$k],
                                'sap' => $sap_box_array[$value][$k],
                                'lote' => $lote_box_array[$value][$k],
                                'marca' => $marca_box_array[$value][$k],
                                'vencimiento' => $vencimiento_box_array[$value][$k],
                                'cant_cajas' => $cant_cajas_box_array[$value][$k],
                                'requiere_etiquetado' => $requiere_etiquetado_box_array[$value][$k],
                                'requiere_sello_alto' => $requiere_sello_alto_box_array[$value][$k],
                                'requiere_trabajo' => $requiere_trabajo_box_array[$value][$k],
                                'porcentaje_vida_util' => $porcentaje_vida_util_box_array[$value][$k],
                                'temp_producto' => $temp_producto_box_array[$value][$k],
                                'defectos' => $defecto_box_array[$value][$k],
                                'obs' => $observacion_box_array[$value][$k],
                            ]);
                        }
                    }
                }
            });
            return redirect()->route('recepciones.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Recepción actualizada correctamente!');
        } catch (\Exception $e) {
            print_r($request->input());
            #print_r($e->getMessage());
            dd($e->getMessage());
            #print_r($request->input());
            // Manejar la excepción o responder con un mensaje de error
            #return redirect()->route('recepciones.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al actualizar el la recepción: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
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
        $data = Recepcion::withTrashed()->find($request->input('id'));
        if(!$data){
            return response()->json(['message' => 'Recepcion no encontrada']);
        }
        activity()
                ->performedOn($data)
                ->causedBy(Auth::user())
                ->log('Recepcion eliminada');
        $data->delete();
        return response()->json(['message' => 'Recepcion borrados con éxito']);
    }
    public function recepcion_proceso_list(Request $request)
    {
        $data['request'] = $request;
        $f_recepcion = $request->input('ano_creado').'-'.$request->input('mes_creado');
        $data['recepciones']=Recepcion::where('f_recepcion', 'LIKE', "%$f_recepcion%")->where('status',1)->get();
        return view('recepciones.list-recepcion-proceso',$data);
    }
    public function recepcion_cerrada_list(Request $request)
    {
        $data['request'] = $request;
        $f_recepcion = $request->input('ano_creado').'-'.$request->input('mes_creado');
        $data['recepciones']=Recepcion::where('f_recepcion', 'LIKE', "%$f_recepcion%")->where('status',2)->get();
        return view('recepciones.list-recepcion-cerrado',$data);
    }
}
