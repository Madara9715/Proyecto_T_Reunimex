<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\Categoriaproducto;
use App\Tipoproducto;
use App\Proveedore;
use App\Marca;
use App\Descuento;
use App\Presentacione;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
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
        $panel= "productos";
        $nuevo= "producto";
        $productos = Producto::where('activo',1)->paginate(10);
        $nombreproducto= Producto::select('nombre_producto','id')->where('activo',1)->get();
        /*$ultclave = DB::table('productos')
        ->select('productos.clave')
        ->get()->last();*/
        $categorias= Categoriaproducto::all();
        $presentaciones= Presentacione::all();
        $tipoproductos= Tipoproducto::all();
        $proveedores= Proveedore::all();
        $marcas= Marca::all();
        $descuentos= Descuento::all();
        return view('dashboard.productos',compact('productos','categorias','presentaciones','tipoproductos','proveedores','marcas','descuentos','nombreproducto'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo',$nuevo);
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
            'categoriaproducto_id'=> 'required',
            'nombre_producto'=> 'required|unique:productos',
            'descripcion',
            'tipoproducto_id',
            'proveedore_id',
            'marca_id',


        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        Producto::create($request->all());
       /* $newproducto = new Producto;
        $newproducto->clave = $request->input('clave');
        $newproducto->categoriaproducto_id = $request->input('categoriaproducto_id');
        $newproducto->nombre_producto = $request->input('nombre_producto');
        $newproducto->descripcion = $request->input('descripcion');
        $newproducto->tipoproducto_id = $request->input('tipoproducto_id');
        $newproducto->proveedore_id = $request->input('proveedore_id');
        $newproducto->marca_id = $request->input('marca_id');
        $newproducto->save();*/
       
       
        return redirect()->route('productos.index');
        
        
    }
    public function shownewproducto()
    {
        //
        $productos = Producto::all();
        $categorias= Categoriaproducto::all();
        $tipoproductos= Tipoproducto::all();
        $proveedores= Proveedore::all();
        $marcas= Marca::all();
        return view('dashboard.productos',compact('productos','categorias','tipoproductos','proveedores','marcas'));
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
        $encabezadotablas= array("Producto", "Presentaciones");
        $producto = Producto::find($id);
       // dd($producto);
       // $presentacionproducto= ProductosPresentacion::where('producto_id',$id)->first();
       // $nombrepresentacion=Presentacionproducto::find($presentacionproducto->presentacion_id);
        $categoria= $producto->categoriaproducto;
        $tipoproducto= $producto->tipoproducto;
        $panel= "producto: ".$producto->nombre_producto;
        $prueba= $producto->presentaciones;
        $presentacion = DB::table('presentaciones')
        ->join('presentacione_producto', 'presentaciones.id', '=', 'presentacione_producto.presentacione_id')
        ->select('presentacione_producto.id','presentaciones.nombre_presentacionP','presentacione_producto.cantidad','presentacione_producto.unidad','presentacione_producto.precio_publico','presentacione_producto.precio_distribuidor')
        ->where('presentacione_producto.producto_id', $id)
        ->get();
       
        return view('dashboard.showproducto',compact('producto','presentacion','categoria','tipoproducto','prueba'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel);
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
        $panel= "productos";
        $nuevo= "producto";
        $productos = Producto::find($id);
        $catActual= $productos->categoriaproducto;
        $categorias= Categoriaproducto::all();
        $tipoproductos= Tipoproducto::all();
        $tipActual= $productos->tipoproducto;
        $proveedores= Proveedore::all();
        $provActual= $productos->proveedore;
        $marcas= Marca::all();
        $marActual= $productos->marca;
        return view('dashboard.editproductos',compact('productos','categorias','tipoproductos','proveedores','marcas'))->with('catActual',$catActual)->with('tipActual',$tipActual)->with('provActual',$provActual)->with('marActual',$marActual)->with('name', $namepanel)->with('panel', $panel)->with('nuevo',$nuevo);
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
            'categoriaproducto_id'=> 'required',
            'nombre_producto'=> 'required',
            'descripcion',
            'tipoproducto_id'=> 'required',
            'proveedore_id'=> 'required',
            'marca_id'=> 'required',


        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);

        $newproducto = Producto::find($id);
        $newproducto->categoriaproducto_id = $request->input('categoriaproducto_id');
        $newproducto->nombre_producto = $request->input('nombre_producto');
        $newproducto->descripcion = $request->input('descripcion');
        $newproducto->tipoproducto_id = $request->input('tipoproducto_id');
        $newproducto->proveedore_id = $request->input('proveedore_id');
        $newproducto->marca_id = $request->input('marca_id');
        $newproducto->save();
       
       
        return redirect()->route('productos.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infodelete($id)
    {

        $producto = Producto::find($id);
        return response()->json($producto);
    }

    public function destroy($id)
    {
        //
        $producto = Producto::find($id);
        $producto->activo=0;
        $producto->save();
        return json_encode(array('statusCode' => 200));
    }
}
