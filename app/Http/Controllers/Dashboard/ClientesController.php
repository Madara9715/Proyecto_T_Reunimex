<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use App\Cuenta;
use App\Deuda;
use App\Tipocliente;
use App\Tipoventa;
use Illuminate\Support\Facades\DB;
use App\Exports\ClientesExport;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $namepanel= "administrador";
        $panel= "clientes";
        $nuevo= "cliente";
        $clientes = Cliente::orderBy('nombre_cliente','ASC')->where('activo',1)->paginate(20);
        $tipoclientes = Tipocliente::all();
        $clientesinf = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('clientes.id','clientes.nombre_cliente')
                ->get();
        /*if(!empty($clientes->Last()))
        {
            $ultimocliente = $clientes->Last()->clave;
        }
        else
        {
            $ultimocliente="0000";
        }*/
        return view('dashboard.clientes',compact('clientes','tipoclientes','clientesinf'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo',$nuevo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//descarga lista de clientes
    {
        //
        return  (new ClientesExport)->download('Clientes.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//crear nuevos clientes
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
        Cliente::create($request->all());
       /* $newcliente = new Cliente;
        $newcliente->tipocliente_id = $request->input('tipocliente_id');
        $newcliente->clave = $request->input('Clave');
        $newcliente->nombre_cliente = $request->input('nombre_cliente');
        $newcliente->apellido_p = $request->input('apellido_p');
        $newcliente->apellido_m = $request->input('apellido_m');
        $newcliente->telefono_fijo = $request->input('Telefono_Fijo');
        $newcliente->telefono_movil = $request->input('Telefono_Movil');
        $newcliente->direccion = $request->input('Direccion');
        $newcliente->save();*/
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $namepanel= "administrador";
        $encabezadotablas= array("Clientes", "empleados");
        $cliente = Cliente::find($id);
        $panel= "cliente: ".$cliente->nombre;
        $empleados = $cliente->empleados;
        $idCliente = $id;
        $tipocompra =Tipoventa::all();
        return view('dashboard.showcliente',compact('cliente','empleados','tipocompra'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel)->with('idCliente',$idCliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $namepanel= "administrador";
        $panel= "clientes";
        $nuevo= "cliente";
        $cliente = Cliente::find($id);
        $idtipocliente= $cliente->tipocliente_id;
        $tipoclienteActual = Tipocliente::find($idtipocliente);
        $tipoclientes=Tipocliente::all();

        return view('dashboard.editclientes',compact('cliente','tipoclientes','tipoclienteActual'))->with('name', $namepanel)->with('panel', $panel)->with('idtipocliente',$idtipocliente);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            'activo'=>'required',
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $newcliente = Cliente::find($id);
        $newcliente->tipocliente_id = $request->input('tipocliente_id');
        $newcliente->nombre_cliente = $request->input('nombre_cliente');
        $newcliente->apellido_p = $request->input('apellido_p');
        $newcliente->apellido_m = $request->input('apellido_m');
        $newcliente->telefono_fijo = $request->input('telefono_fijo');
        $newcliente->telefono_movil = $request->input('telefono_movil');
        $newcliente->direccion = $request->input('direccion');
        $newcliente->activo = $request->input('activo');
        $newcliente->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function infodelete($id)
    {

        $cliente = Cliente::find($id);
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        //
        $cliente = Cliente::find($id);
        $cliente->activo=0;
        $cliente->save();
        return json_encode(array('statusCode' => 200));
    }
}
