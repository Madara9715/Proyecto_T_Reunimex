<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empleado;
use App\Tipoempleado;
use App\Departamento;
use App\Cliente;
use App\ClienteEmpleado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namepanel= "administrador";
        $panel= "empleados";
        $nuevo= "empleado";
        $tipoempleados= Tipoempleado::all();
        $empleados = Empleado::where('activo',1)->paginate(10);
        
        $departamentos= Departamento::all();
        $clientes = DB::table('clientes')->whereNotIn('id', DB::table('cliente_empleado')->pluck('cliente_id'))->get();
        /*if(!empty($empleados->Last()))
        {
            $ultClave = $empleados->last()->clave;
            $clave = preg_split("/[-]/", $ultClave);
        }
        else
        {
            $clave="0";
        }*/
        return view('dashboard.empleados',compact('empleados','tipoempleados','departamentos','clientes'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo', $nuevo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function asignacion(Request $request)
    {
        $this->validate($request,[
            'empleado_id' => 'required',
            
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra asignado en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $agregado= $request->input('agrega');
        foreach ($agregado as $id_cliente) {
        $newclienteempleado = new ClienteEmpleado;
        $newclienteempleado->empleado_id = $request->input('empleado_id');
        $newclienteempleado->cliente_id =$id_cliente;
        $newclienteempleado->save();
        }
        /*$newclienteempleado = new ClienteEmpleado;
        $newclienteempleado->empleado_id = $request->input('empleado_id');
        $newclienteempleado->cliente_id = $request->input('cliente_id');
        $newclienteempleado->save();*/
        
        return redirect()->route('empleados.index');
        //return $agregado;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tipoempleado_id' => 'required',
            'departamento_id' => 'required',
            'nombre_empleado'=> 'required|max:30',
            'apellido_p'=> 'required|max:30',
            'apellido_m'=> 'required|max:30',
            'telefono_fijo'=> 'max:10',
            'telefono_movil'=> 'max:10',
            'direccion'=> 'required|max:100',
            'correo_electronico'=> 'max:50',
            'edad'=> 'required',
            'sexo'=> 'required',
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        Empleado::create($request->all());
        /*$newempleado = new Empleado;
        $newempleado->tipoempleado_id = $request->input('tipoempleado_id');
        $newempleado->departamento_id = $request->input('departamento_id');
        $newempleado->clave=$request->input('clave');
        $newempleado->nombre_empleado = $request->input('nombre_empleado');
        $newempleado->apellido_p = $request->input('apellido_p');
        $newempleado->apellido_m = $request->input('apellido_m');
        $newempleado->telefono_fijo = $request->input('telefono_fijo');
        $newempleado->telefono_movil = $request->input('telefono_movil');
        $newempleado->direccion = $request->input('direccion');
        $newempleado->correo_electronico = $request->input('correo_electronico');
        $newempleado->edad = $request->input('edad');
        $newempleado->sexo = $request->input('sexo');
        $newempleado->save();*/
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $namepanel= "administrador";
        $encabezadotablas= array("empleado", "clientes");
        $empleado = Empleado::find($id);
        $panel= "empleado: ".$empleado->nombre;
        $clientes = $empleado->clientes;
        $idEmpleado= $id;
        return view('dashboard.showempleado',compact('empleado','clientes'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel)->with('idEmpleado',$idEmpleado);
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
        $panel= "empleados";
        $nuevo= "empleado";
        $empleado = Empleado::find($id);
        $tipoempleadoA= Tipoempleado::find($empleado->tipoempleado_id);
        $tipoempleados= Tipoempleado::all();
        $departamentoA= Departamento::find($empleado->departamento_id);
        $departamentos= Departamento::all();
        return view('dashboard.editempleados',compact('empleado','tipoempleados','departamentos','tipoempleadoA','departamentoA'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo', $nuevo);
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
            'tipoempleado_id' => 'required',
            'departamento_id' => 'required',
            'nombre_empleado'=> 'required|max:30',
            'apellido_p'=> 'required|max:30',
            'apellido_m'=> 'required|max:30',
            'telefono_fijo'=> 'max:10',
            'telefono_movil'=> 'max:10',
            'direccion'=> 'required|max:100',
            'correo_electronico'=> 'max:50',
            'edad'=> 'required',
            'sexo'=> 'required',
            'activo'=>'required',
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);

        $newempleado = Empleado::find($id);
        $newempleado->tipoempleado_id = $request->input('tipoempleado_id');
        $newempleado->departamento_id = $request->input('departamento_id');
        $newempleado->nombre_empleado = $request->input('nombre_empleado');
        $newempleado->apellido_p = $request->input('apellido_p');
        $newempleado->apellido_m = $request->input('apellido_m');
        $newempleado->telefono_fijo = $request->input('telefono_fijo');
        $newempleado->telefono_movil = $request->input('telefono_movil');
        $newempleado->direccion = $request->input('direccion');
        $newempleado->correo_electronico = $request->input('correo_electronico');
        $newempleado->edad = $request->input('edad');
        $newempleado->sexo = $request->input('sexo');
        $newempleado->activo= $request->input('activo');
        $newempleado->save();
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infodelete($id)
    {

        $empleado = Empleado::find($id);
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        //
        $empleado = Empleado::find($id);
        $empleado->activo=0;
        $empleado->save();
        return json_encode(array('statusCode' => 200));
    }
}
