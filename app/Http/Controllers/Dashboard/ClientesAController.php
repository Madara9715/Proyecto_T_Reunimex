<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteEmpleado;
use App\Tipocliente;
use Illuminate\Support\Facades\DB;

class ClientesAController extends Controller
{
    //
    public function index()
    {
        //muestra los clientes que tiene asignado el asesor
        $idempleado = auth()->User()->empleado_id;
        $namepanel= "Asesor";
        $panel= "clientes";
        $nuevo= "cliente_asesor";
        $tipoclientes = Tipocliente::all();
        $clientes = DB::table('clientes')
        ->join('cliente_empleado','clientes.id','=','cliente_empleado.cliente_id')
        ->join('empleados','empleados.id','=','cliente_empleado.empleado_id')
        ->select('clientes.clave','clientes.nombre_cliente','clientes.apellido_p','clientes.apellido_m','clientes.telefono_fijo','clientes.telefono_movil','clientes.direccion','clientes.activo')
        ->where('empleados.id',$idempleado)
        ->paginate(10);
       
        return view('dashboard.clientesasesor',compact('clientes','tipoclientes'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo',$nuevo);
    }

    public function nuevocliente(Request $request)//crear un nuevo cliente y lo asigna al asesor
    {
        //
        $this->validate($request,[
            'tipocliente_id' => 'required',
            'nombre_cliente' => 'required|max:30',
            'apellido_p' => 'max:30',
            'apellido_m' => 'max:30',
            'telefono_fijo' => 'required|max:10',
            'telefono_movil' => 'max:10',
            'direccion' => 'required|max:50',
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $idempleado = auth()->User()->empleado_id;
        Cliente::create($request->all());
        $UltimoCliente = Cliente::latest('id')->first();
        $idcliente= $UltimoCliente->id;

        $newclienteempleado = new ClienteEmpleado;
        $newclienteempleado->empleado_id = $idempleado;
        $newclienteempleado->cliente_id =$idcliente;
        $newclienteempleado->save();
        return redirect()->route('clientes');
    }
}
