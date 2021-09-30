<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClientesAController extends Controller
{
    //
    public function index()
    {
        //
        $idempleado = auth()->User()->empleado_id;
        $namepanel= "Asesor";
        $panel= "clientes";
        $nuevo= "cliente";
        $clientes = DB::table('clientes')
        ->join('cliente_empleado','clientes.id','=','cliente_empleado.cliente_id')
        ->join('empleados','empleados.id','=','cliente_empleado.empleado_id')
        ->select('clientes.clave','clientes.nombre_cliente','clientes.apellido_p','clientes.apellido_m','clientes.telefono_fijo','clientes.telefono_movil','clientes.direccion','clientes.activo')
        ->where('empleados.id',$idempleado)
        ->paginate(10);
       
        return view('dashboard.clientesasesor',compact('clientes'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo',$nuevo);
    }
}
