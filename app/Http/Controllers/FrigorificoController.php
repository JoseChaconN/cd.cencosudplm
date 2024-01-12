<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\Frigorifico;
use App\Models\FrigorificoRazonSocial;
use App\Models\Pais;

class FrigorificoController extends Controller
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
        $data['frigorificos'] = Frigorifico::all();
        return view('frigorificos.list-frigorificos', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['frigorifico'] = New Frigorifico;
        $data['paises'] = Pais::all();
        return view('frigorificos.frigorifico-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        #nombre        
        try {
            DB::transaction(function () use ($request) {
                $razon_social = $request->input('razon_social');
                $rut = $request->input('rut');
                $marca = $request->input('marca');
                $sif = $request->input('sif');
                $pais = $request->input('pais');
                $planillas = $request->input('planillas');
                $id_razon_social = $request->input('id_razon_social');
                $frigorifico = Frigorifico::create([
                    'nombre' => $request->input('nombre'),
                ]);
                foreach ($request->input('id_razon_social') as $key => $value) {
                    
                    
                    if(!empty($value)){
                        $rzon_social = FrigorificoRazonSocial::create([
                            'id_frigorifico' => $frigorifico->id,
                            'razon_social' => $razon_social[$value],
                            'rut' => $rut[$value],
                            'marca' => $marca[$value],
                            'sif' => $sif[$value],
                            'pais' => $pais[$value],
                            'planillas' => json_encode($planillas[$value]),
                        ]);
                    }
                    $paises_to_frigorifico_a[$pais[$value]]=$pais[$value];
                    
                }
                foreach ($paises_to_frigorifico_a as $key => $value) {
                    $paises_to_frigorifico[]=$value;
                }
                $frigorifico->update(['paises' => $paises_to_frigorifico]);
            });
            return redirect()->route('frigorificos.index')
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Frigorifico creado correctamente!');
        }
        catch (\Exception $e) {
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('frigorificos.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el frigorifico: ' . $e->getMessage());
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
        #$frigorificos = Frigorifico::whereJsonContains('paises',"17")->get();
        $data['frigorifico'] = Frigorifico::with('razones_sociales')->find($id);
        $data['paises'] = Pais::all();
        return view('frigorificos.frigorifico-form', $data);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            DB::transaction(function () use ($request, &$id) {
                $id_razon_social = $request->input('id_razon_social');
                $razon_social = $request->input('razon_social');
                $rut = $request->input('rut');
                $marca = $request->input('marca');
                $sif = $request->input('sif');
                $pais = $request->input('pais');
                $planillas = $request->input('planillas');
                $frigorifico = Frigorifico::find($id);
                $frigorifico ->update([
                    'nombre' => $request->input('nombre'),
                ]);
                foreach ($request->input('id_razon_social') as $key => $value) {
                    $FrigorificoRazonSocial = FrigorificoRazonSocial::find($id_razon_social[$key]);
                    if(empty($FrigorificoRazonSocial)){
                        FrigorificoRazonSocial::create([
                            'id_frigorifico' => $frigorifico->id,
                            'razon_social' => $razon_social[$value],
                            'rut' => $rut[$value],
                            'marca' => $marca[$value],
                            'sif' => $sif[$value],
                            'pais' => $pais[$value],
                            'planillas' => json_encode($planillas[$value]),
                        ]);
                    }else{
                        $FrigorificoRazonSocial->update([
                            'razon_social' => $razon_social[$value],
                            'rut' => $rut[$value],
                            'marca' => $marca[$value],
                            'sif' => $sif[$value],
                            'pais' => $pais[$value],
                            'planillas' => json_encode($planillas[$value]),
                        ]);
                    }
                    $paises_to_frigorifico_a[$pais[$value]]=$pais[$value];
                    
                }
                foreach ($paises_to_frigorifico_a as $key => $value) {
                    $paises_to_frigorifico[]=$value;
                }
                $frigorifico->update(['paises' => $paises_to_frigorifico]);
            });
            return redirect()->route('frigorificos.edit',$id)
                    ->with('notification_type', 'success')
                    ->with('notification_message', 'Frigorifico guardado correctamente!');
        }
        catch (\Exception $e) {
            #return redirect()->route('auditorias.edit',$auditoria->id)->with('notification_type', 'success')->with('notification_message', 'Auditoria creada correctamente!');
            return redirect()->route('frigorificos.edit',$id)->with('notification_type', 'danger')->with('notification_message', 'Error al guardad el frigorifico: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
