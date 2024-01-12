<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CorteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['cortes'] = Corte::with('responsable')->get();
        return view('cortes.list-cortes', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['corte'] = new Corte;
        return view('cortes.corte-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        #'paleta_1' => $request->input('paleta_1'),
        #'paleta_2' => $request->input('paleta_2'),
        #'paleta_3' => $request->input('paleta_3'),
        #'etiqueta_superior' => $request->input('etiqueta_superior'),
        #'etiqueta_posterior' => $request->input('etiqueta_posterior'),
        #'etiqueta_frontal' => $request->input('etiqueta_frontal'),
        #imagen_corte
        $nuevoCorte = NULL;
        try {
            DB::transaction(function () use ($request, &$nuevoCorte) {
                $corte = Corte::create([
                    'id_creador' => Auth::user()->id,
                    'nombre_corte' => $request->input('nombre_corte'),
                    'codigo' => $request->input('codigo'),
                    'categoria' => $request->input('categoria'),
                    'descripcion_producto' => $request->input('descripcion_producto'),
                    'conformacion_muscular' => $request->input('conformacion_muscular'),
                    'forma_consumo' => $request->input('forma_consumo'),
                    'formato' => $request->input('formato'),
                    'cobertura_grasa' => $request->input('cobertura_grasa'),
                    'cantidad_corte' => $request->input('cantidad_corte'),
                    'peso_prom' => $request->input('peso_prom'),
                    'kg_caja' => $request->input('kg_caja'),
                    'denominacion_corte' => $request->input('denominacion_corte'),
                    'categoria_canal' => $request->input('categoria_canal'),
                    'direccion_procesador' => $request->input('direccion_procesador'),
                    'nombre_planta' => $request->input('nombre_planta'),
                    'direccion_importador' => $request->input('direccion_importador'),
                    'resolucion_sanitaria_importacion' => $request->input('resolucion_sanitaria_importacion'),
                    'peso_neto' => $request->input('peso_neto'),
                    'pais_origen' => $request->input('pais_origen'),
                    'condiciones_almacenamiento' => $request->input('condiciones_almacenamiento'),
                    'fecha_beneficio' => $request->input('fecha_beneficio'),
                    'fecha_vencimiento' => $request->input('fecha_vencimiento'),
                    'lote' => $request->input('lote'),
                    'tabla_nutricional' => $request->input('tabla_nutricional'),
                    'dimensiones_etiqueta' => $request->input('dimensiones_etiqueta'),
                    'materialidad_etiqueta' => $request->input('materialidad_etiqueta'),
                    'materialidad_bolsa' => $request->input('materialidad_bolsa'),
                    'denominacion_corte_1' => $request->input('denominacion_corte_1'),
                    'categoria_canal_1' => $request->input('categoria_canal_1'),
                    'direccion_procesador_1' => $request->input('direccion_procesador_1'),
                    'peso_bruto' => $request->input('peso_bruto'),
                    'fecha_beneficio_1' => $request->input('fecha_beneficio_1'),
                    'fecha_vencimiento_1' => $request->input('fecha_vencimiento_1'),
                    'requerimientos_legales' => $request->input('requerimientos_legales'),
                    'certificado_sanitario' => $request->input('certificado_sanitario'),
                    'numero_planta' => $request->input('numero_planta'),
                    'packing_list' => $request->input('packing_list'),
                    'resolucion_sag' => $request->input('resolucion_sag'),
                    'paletizado' => $request->input('paletizado'),
                    'carga_estiba' => $request->input('carga_estiba'),
                    'cadena_frio' => $request->input('cadena_frio'),
                    'tolerancia_fechas' => $request->input('tolerancia_fechas'),
                    'responsable_preparado' => $request->input('responsable_preparado'),
                    'responsable_aprobado' => $request->input('responsable_aprobado'),
                ]);
                $nuevoCorte = $corte->id;
                #IMAGEN CORTE
                $fotografia = $request->file('imagen_corte');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $corte->addMedia($imagen)->toMediaCollection('imagen_corte');
                        }
                    }
                }
                #IMAGENES PALETAS
                $paleta_1 = $request->file('paleta_1');
                $paleta_2 = $request->file('paleta_2');
                $paleta_3 = $request->file('paleta_3');
                if (!empty($paleta_1) && $paleta_1->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_1)->toMediaCollection('paleta_1');
                }
                if (!empty($paleta_2) && $paleta_2->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_2)->toMediaCollection('paleta_2');
                }
                if (!empty($paleta_3) && $paleta_3->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_3)->toMediaCollection('paleta_3');
                }
                #IMAGENES ETIQUETAS
                $etiqueta_superior = $request->file('etiqueta_superior');
                $etiqueta_posterior = $request->file('etiqueta_posterior');
                $etiqueta_frontal = $request->file('etiqueta_frontal');
                if (!empty($etiqueta_superior) && $etiqueta_superior->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_superior)->toMediaCollection('etiqueta_superior');
                }
                if (!empty($etiqueta_posterior) && $etiqueta_posterior->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_posterior)->toMediaCollection('etiqueta_posterior');
                }
                if (!empty($etiqueta_frontal) && $etiqueta_frontal->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_frontal)->toMediaCollection('etiqueta_frontal');
                }
            });
            return redirect()->route('cortes.edit',$nuevoCorte)->with('notification_type', 'success')->with('notification_message', 'Corte creado con exito!');
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('cortes.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el corte: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Corte $corte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corte $corte)
    {
        //
        $data['corte'] = $corte;
        $imagen_corte = $corte->getMedia('imagen_corte');
        $data['paleta_1'] = (empty($corte->getMedia('paleta_1')->last())) ? NULL : $corte->getMedia('paleta_1')->last()->getUrl();
        $data['paleta_2'] = (empty($corte->getMedia('paleta_2')->last())) ? NULL : $corte->getMedia('paleta_2')->last()->getUrl();
        $data['paleta_3'] = (empty($corte->getMedia('paleta_3')->last())) ? NULL : $corte->getMedia('paleta_3')->last()->getUrl();
        $data['etiqueta_superior'] = (empty($corte->getMedia('etiqueta_superior')->last())) ? NULL : $corte->getMedia('etiqueta_superior')->last()->getUrl();
        $data['etiqueta_posterior'] = (empty($corte->getMedia('etiqueta_posterior')->last())) ? NULL : $corte->getMedia('etiqueta_posterior')->last()->getUrl();
        $data['etiqueta_frontal'] = (empty($corte->getMedia('etiqueta_frontal')->last())) ? NULL : $corte->getMedia('etiqueta_frontal')->last()->getUrl();
        
        if(!empty($imagen_corte)){
            foreach ($imagen_corte as $item) {
                $data['imagenes_corte'][] = ['id' => $item->id , 'url' => $item->getUrl()];
            }
        }
        return view('cortes.corte-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Corte $corte)
    {
        try {
            DB::transaction(function () use ($request, &$corte) {
                $revisiones=[];
                $fecha_revision = $request->input('fecha_revision');
                $obs_revision = $request->input('obs_revision');
                if(!empty($request->input('fecha_revision'))){
                    foreach ($request->input('fecha_revision') as $key => $value) {
                        $revisiones[]=[
                            'fecha_revision' => $fecha_revision[$key],
                            'obs_revision' => $obs_revision[$key],
                        ];
                    }
                }
                
                $corte->update([
                    'nombre_corte' => $request->input('nombre_corte'),
                    'codigo' => $request->input('codigo'),
                    'categoria' => $request->input('categoria'),
                    'descripcion_producto' => $request->input('descripcion_producto'),
                    'conformacion_muscular' => $request->input('conformacion_muscular'),
                    'forma_consumo' => $request->input('forma_consumo'),
                    'formato' => $request->input('formato'),
                    'cobertura_grasa' => $request->input('cobertura_grasa'),
                    'cantidad_corte' => $request->input('cantidad_corte'),
                    'peso_prom' => $request->input('peso_prom'),
                    'kg_caja' => $request->input('kg_caja'),
                    'denominacion_corte' => $request->input('denominacion_corte'),
                    'categoria_canal' => $request->input('categoria_canal'),
                    'direccion_procesador' => $request->input('direccion_procesador'),
                    'nombre_planta' => $request->input('nombre_planta'),
                    'direccion_importador' => $request->input('direccion_importador'),
                    'resolucion_sanitaria_importacion' => $request->input('resolucion_sanitaria_importacion'),
                    'peso_neto' => $request->input('peso_neto'),
                    'pais_origen' => $request->input('pais_origen'),
                    'condiciones_almacenamiento' => $request->input('condiciones_almacenamiento'),
                    'fecha_beneficio' => $request->input('fecha_beneficio'),
                    'fecha_vencimiento' => $request->input('fecha_vencimiento'),
                    'lote' => $request->input('lote'),
                    'tabla_nutricional' => $request->input('tabla_nutricional'),
                    'dimensiones_etiqueta' => $request->input('dimensiones_etiqueta'),
                    'materialidad_etiqueta' => $request->input('materialidad_etiqueta'),
                    'materialidad_bolsa' => $request->input('materialidad_bolsa'),
                    'denominacion_corte_1' => $request->input('denominacion_corte_1'),
                    'categoria_canal_1' => $request->input('categoria_canal_1'),
                    'direccion_procesador_1' => $request->input('direccion_procesador_1'),
                    'peso_bruto' => $request->input('peso_bruto'),
                    'fecha_beneficio_1' => $request->input('fecha_beneficio_1'),
                    'fecha_vencimiento_1' => $request->input('fecha_vencimiento_1'),
                    'requerimientos_legales' => $request->input('requerimientos_legales'),
                    'certificado_sanitario' => $request->input('certificado_sanitario'),
                    'numero_planta' => $request->input('numero_planta'),
                    'packing_list' => $request->input('packing_list'),
                    'resolucion_sag' => $request->input('resolucion_sag'),
                    'paletizado' => $request->input('paletizado'),
                    'carga_estiba' => $request->input('carga_estiba'),
                    'cadena_frio' => $request->input('cadena_frio'),
                    'tolerancia_fechas' => $request->input('tolerancia_fechas'),
                    'responsable_preparado' => $request->input('responsable_preparado'),
                    'responsable_aprobado' => $request->input('responsable_aprobado'),
                    'revisiones' => json_encode($revisiones),
                ]);
                #IMAGEN CORTE
                $fotografia = $request->file('imagen_corte');
                if (!empty($fotografia)) {
                    foreach ($fotografia as $imagen) {
                        if ($imagen->isValid()) {
                            // Guarda la imagen en la librería de medios del producto
                            $corte->addMedia($imagen)->toMediaCollection('imagen_corte');
                        }
                    }
                }
                #IMAGENES PALETAS
                $paleta_1 = $request->file('paleta_1');
                $paleta_2 = $request->file('paleta_2');
                $paleta_3 = $request->file('paleta_3');
                if (!empty($paleta_1) && $paleta_1->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_1)->toMediaCollection('paleta_1');
                }
                if (!empty($paleta_2) && $paleta_2->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_2)->toMediaCollection('paleta_2');
                }
                if (!empty($paleta_3) && $paleta_3->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($paleta_3)->toMediaCollection('paleta_3');
                }
                #IMAGENES ETIQUETAS
                $etiqueta_superior = $request->file('etiqueta_superior');
                $etiqueta_posterior = $request->file('etiqueta_posterior');
                $etiqueta_frontal = $request->file('etiqueta_frontal');
                if (!empty($etiqueta_superior) && $etiqueta_superior->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_superior)->toMediaCollection('etiqueta_superior');
                }
                if (!empty($etiqueta_posterior) && $etiqueta_posterior->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_posterior)->toMediaCollection('etiqueta_posterior');
                }
                if (!empty($etiqueta_frontal) && $etiqueta_frontal->isValid()) {
                    // Guarda la imagen en la librería de medios del producto
                    $corte->addMedia($etiqueta_frontal)->toMediaCollection('etiqueta_frontal');
                }
            });
             return redirect()->route('cortes.edit',$corte->id)->with('notification_type', 'success')->with('notification_message', 'Corte creado con exito!');
        } catch (\Exception $e) {
            // Manejar la excepción o responder con un mensaje de error
            return redirect()->route('cortes.edit',$corte->id)->with('notification_type', 'danger')->with('notification_message', 'Error al guardar el corte: ' . $e->getMessage());
            #return redirect()->route('orders.index')->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corte $corte)
    {
        //
    }
    public function delete(Request $request)
    {
        //
        #$factura = Factura::withTrashed()->find($id);
        $corte = Corte::withTrashed()->find($request->input('id'));
        if(!$corte){
            return response()->json(['message' => 'Auditoría no encontrada']);
        }
        activity()
                ->performedOn($corte)
                ->causedBy(Auth::user())
                ->log('Corte eliminado');
        $corte->delete();
        return response()->json(['message' => 'Corte borrado con éxito']);
    }
    public function search(Request $request)
    {
        //
        $cortes_q = [];
        $a=0;
        if(!empty($request->input('nombre_corte')) || !empty($request->input('codigo_corte'))){
            $cortes=Corte::where('status',1);
            if(!empty($request->input('nombre_corte'))){
                $nombre_corte = $request->input('nombre_corte');
                $cortes->where('nombre_corte', 'LIKE' , "%$nombre_corte%");
                $a++;
            }
            if(!empty($request->input('codigo_corte'))){
                $codigo_corte = $request->input('codigo_corte');
                $cortes->where('codigo', 'LIKE' , "%$codigo_corte%");
                $a++;
            }
            $cortes_q = $cortes->get();
        }
        return response()->json(['isSuccessful' => TRUE, 'cortes' => $cortes_q, 'a' => $a]);
        
    }
}
