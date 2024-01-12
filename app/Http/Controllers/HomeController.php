<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use App\Models\Seccion;
use App\Models\User;
use App\Models\CentroCompetencia;
use App\Models\UsuarioCentroCompetencia;
use App\Models\UsuarioTienda;
use App\Models\UsuarioSeccion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data= [];
        return view('dashboard.index',$data);
    }

    public function set_tienda_usuario(Request $request)
    {
        $tienda = Tienda::find($request->input('tienda'));
        $request->session()->forget('u_id_tienda');
        $request->session()->forget('u_codigo_tienda');
        $request->session()->forget('u_nombre_tienda');
        session(['u_id_tienda' => $request->input('tienda')]);
        session(['u_codigo_tienda' => $tienda->codigo]);
        session(['u_nombre_tienda' => $tienda->nombre]);
        session(['u_area_tienda' => $tienda->area]);
        session(['u_categoria_tienda' => $tienda->categoria]);
        session(['u_zona_tienda' => $tienda->zona]);
        #print_r(session()->all());
        #session('u_id_tienda',$request->input('tienda'));
        return redirect()->intended();
        #return redirect()->route('home');
    }
}
    