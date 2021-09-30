<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namepanel= "administrador";
        $panel= "departamentos";
        $nuevo= "departamento";
        $departamentos = Departamento::paginate(10);
        return view('dashboard.departamentos',compact('departamentos'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo', $nuevo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_departamento' => 'required|unique:departamentos|max:30',
                'descripcion' => 'max:100',
            ],
            [
                'required' => 'Debe ingresar un :attribute',
                'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
                'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        Departamento::create($request->all());

        return response()->json(['success' => 'Se guardó correctamente']);
        /* $msg = array("¡LISTO!", "Se guardó correctamente");
        return redirect()->route('departamentos.index')->with('mensaje', $msg); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $namepanel = "administrador";
        $encabezadotablas = array("departamento", "empleados");
        $departamento = Departamento::find($id);
        $panel = "departamento: " . $departamento->nombre_departamento;
        $empleados = $departamento->empleados;

        return view('dashboard.showdepartamento', compact('departamento', 'empleados'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $departamento = Departamento::find($id);
        return response()->json($departamento);
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
        $departamento = Departamento::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_departamento' => [
                    'required',
                    'max:30',
                    Rule::unique('departamentos')->ignore($departamento->id),
                ],
                'descripcion' => 'max:100',
            ],
            [
                'required' => 'Debe ingresar un :attribute',
                'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
                'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $departamento->nombre_departamento = $request->nombre_departamento;
            $departamento->descripcion = $request->descripcion;
            $departamento->save();

            return json_encode(array('statusCode' => 200));
        }


        /*  return response()->json($id); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return json_encode(array('statusCode' => 200));
    }
}
