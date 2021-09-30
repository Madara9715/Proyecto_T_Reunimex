<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PresentacioneProducto;
use Illuminate\Support\Facades\DB;

class PresentacionPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presentacion = DB::table('presentaciones')
        ->join('presentacione_producto', 'presentaciones.id', '=', 'presentacione_producto.presentacione_id')
        ->select('presentacione_producto.id','presentaciones.nombre_presentacionP','presentacione_producto.cantidad','presentacione_producto.unidad','presentacione_producto.precio_publico','presentacione_producto.precio_distribuidor')
        ->get();
       
        return view('dashboard.presentacionproducto',compact('presentacion'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'producto_id' => 'required',
            'presentacion_id'=> 'required',
            'cantidadpresentacion'=> 'required',
            'unidadpresentacion'=> 'required',
            'precio_publico'=> 'required',
            'precio_distribuidor'=> 'required',
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);

        $newproductoP = new PresentacioneProducto;
        $newproductoP->producto_id=$request->input('producto_id');
        $newproductoP->presentacione_id = $request->input('presentacion_id');
        $newproductoP->cantidad = $request->input('cantidadpresentacion');
        $newproductoP->unidad = $request->input('unidadpresentacion');
        $newproductoP->precio_adquisicion = $request->input('precio_adquisicion');
        $newproductoP->precio_publico = $request->input('precio_publico');
        $newproductoP->precio_distribuidor = $request->input('precio_distribuidor');
        $newproductoP->save();
        return redirect()->route('productos.index');
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
       /* $presentacion = DB::table('presentaciones')
        ->join('presentacione_producto', 'presentaciones.id', '=', 'presentacione_producto.presentacione_id')
        ->select('presentacione_producto.id','presentaciones.nombre_presentacionP','presentacione_producto.cantidad','presentacione_producto.unidad','presentacione_producto.precio_publico','presentacione_producto.precio_distribuidor')
        ->where('presentacione_producto.id', $id)
        ->get();
       dd($presentacion);*/
       $presentacion= PresentacioneProducto::find($id);
        return view('dashboard.showpresentacionproducto',compact('presentacion'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infodelete($id)
    {
       /* $presentacion = DB::table('presentaciones')
        ->join('presentacione_producto', 'presentaciones.id', '=', 'presentacione_producto.presentacione_id')
        ->select('presentacione_producto.id','presentaciones.nombre_presentacionP')
        ->where('presentacione_producto.id', $id)
        ->get();*/
        $presentacion= PresentacioneProducto::find($id);
        return response()->json($presentacion);
    }
    public function destroy($id)
    {
        //
        $presentacion = PresentacioneProducto::find($id);
        $presentacion->activo=0;
        $presentacion->save();
        return json_encode(array('statusCode' => 200));
    }
}
