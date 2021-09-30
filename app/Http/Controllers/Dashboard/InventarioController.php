<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Inventario;
use App\Almacene;
use App\Movimiento;
use App\PresentacioneProducto;
use App\Empleado;
use App\Venta;
use App\InventarioProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namepanel= "administrador";
        $panel= "inventarios";
        $nuevo= "inventario";
        $encabezadotablas = array("inventarios", "inventarios","productos del");
        $inventarios = Inventario::all();
        $empleados= Empleado::all();
        
       /* if(!empty($inventarios->Last()))
        {
            $UltClave = $inventarios->Last()->clave;
        }
        else
        {
            $UltClave="0000";
        }*/
        return view('dashboard.inventarios',compact('inventarios','empleados'))->with('name', $namepanel)->with('tablas', $encabezadotablas)->with('panel', $panel)->with('nuevo', $nuevo); 
    }

    public function almacen()
    {
        $namepanel= "administrador";
        $panel= "almacen";
        $nuevo= "almacen";
        $encabezadotablas = array("almacen", "inventarios","productos del");
        $almacenes = Almacene::find(1);
        $inventarios = Inventario::all();
        return view('dashboard.almacenes',compact('almacenes','inventarios'))->with('name', $namepanel)->with('tablas', $encabezadotablas)->with('panel', $panel)->with('nuevo', $nuevo);
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
            'empleado_id' => 'required',
            'detalle'=>'max:100',
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        
        $newinventario=Inventario::create($request->all());
        /*$newinventario = new Inventario;
        $newinventario->empleado_id = $request->input('empleado_id');
        $newinventario->clave = $request->input('clave');
        $newinventario->detalles=$request->input('detalles');
        $newinventario->save();*/
        $productosinventario= PresentacioneProducto::all();
        
        
        foreach ($productosinventario as $Producto) {
            $newInventarioProducto = new InventarioProducto;
            $newInventarioProducto->inventario_id = $newinventario->id;
            $newInventarioProducto->producto_id = $Producto->producto_id;
            $newInventarioProducto->presentacione_id=$Producto->presentacione_id;
            $newInventarioProducto->presentacioneproducto_id= $Producto->id;
            $newInventarioProducto->stock=0;
            $newInventarioProducto->stock_restante=0;
            $newInventarioProducto->status =1;
            $newInventarioProducto->save();
        }
        return redirect()->route('inventarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function showventa($id)
    {
        $namepanel= "administrador";
        $panel= "inventarios";
        $fecha= date("Y-m-d");
        $idEmpleado= Inventario::find($id)->empleado_id;
        $ventas = Venta::where('empleado_id',$idEmpleado)
        ->paginate(10);

        return view('dashboard.inventarioventas',compact('ventas'))->with('name', $namepanel)->with('panel', $panel)->with('fecha',$fecha);
    }
    public function show($id)
    {
        $namepanel = "administrador";
        $encabezadotablas = array("productos actualmente en inventario", "movimientos");
        $inventario = Inventario::find($id);
        $prod = $inventario->productosactivos()->get()->unique('id');

        $productosactivos = $inventario ->presentacioneproductosactiva;

        $cant = $prod->count(); 
        $panel = "inventario: ".$inventario->empleado->nombre_empleado." ".$inventario->empleado->apellido_p."";
        

        return view('dashboard.showinventario', compact('inventario','productosactivos'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel)->with('cantidad', $cant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }

    public function surtir(Request $request)
    {
        $inv = Inventario::find($request->id);
        $entradas = 0;
        $salidas = 0;

        foreach ($inv->productosactivos as $relacion) {//Desactivar productos del inventario anterior
            $relacion->pivot->status = 0; 
            $relacion->pivot->updated_at = now();
            $relacion->pivot->save();
         }

        $todo = $request->get('todo');
        
        foreach($todo as $all){
            $checar_es = explode (",", $all); 
            if($checar_es[1] != "0"){
                if($checar_es[2] == "+"){
                    $entradas = $entradas+1;
                } else{
                    $salidas = $salidas+1;
                }
            } 
        }

        $almace = Almacene::find(1);

        if($entradas>0){
           // echo "Vamos a generar un movimiento de entrada y su origen y destino ".$entradas;
            $move = Movimiento::create(
                [
                 'descripcion'  =>'Surtido de productos al inventario '.$inv->empleado->nombre_empleado." ".$inv->empleado->apellido_p." ".$inv->empleado->apellido_m,
                ]
                );

                $almace->origenes()->create(//Surtir inventario
                    [
                        'movimiento_id'=>$move->id
                    ]
                );

                $inv->destinos()->create(//Surtir inventario
                    [
                        'movimiento_id'=>$move->id
                    ]
                );
        }
        if ($salidas>0){
            //echo "<br>Vamos a generar un movimiento de salida y su origen y destino ".$salidas;
            $movs = Movimiento::create(
                [
                'descripcion'  =>'Retirado productos al inventario '.$inv->empleado->nombre_empleado." ".$inv->empleado->apellido_p." ".$inv->empleado->apellido_m,
                ]
            );
            $inv->origenes()->create(//Surtir inventario
                [
                    'movimiento_id'=>$movs->id
                ]
            );

            $almace->destinos()->create(//Surtir inventario
                [
                    'movimiento_id'=>$movs->id
                ]
            );
        }

         
     
      foreach($todo as $td){
          $resurtir = explode (",", $td);  
          $preprod = PresentacioneProducto::find($resurtir[0]);

          if($resurtir[3] != "0"){//Añadir nuevos productos al inventario
           // echo "<br><br><br>Resurtiendo producto: ".$preprod->producto->nombre_producto." cantidad ".$resurtir[3]."<br>";
              $inv->productos()->attach([
                $preprod->producto_id =>[
                    'presentacione_id' => $preprod->presentacione_id,
                    'presentacioneproducto_id'=>$preprod->id,
                    'stock' => $resurtir[3],
                    'stock_restante' => $resurtir[3],
                    'status' => 1,
                    ]
              ]
                
             );
          }


             
        if($resurtir[1] != "0"){//Movimiento entrada y salida del inventario
            if($resurtir[2] == "+"){
                //echo "<br> -Entrada al inventario, cantidad: ".$resurtir[1];
                 $move->productos()->attach(
                    $preprod->producto_id,[
                    'presentacione_id' => $preprod->presentacione_id,
                    'presentacioneproducto_id'=>$preprod->id,
                    'operacione_id' => 1,
                    'cantidad' => $resurtir[1],
                    'valor' => 0,
                    ]
                 ); 
            }
            else{
               // echo "<br> -Salida del inventario, cantidad: ".$resurtir[1];
                $movs->productos()->attach(
                    $preprod->producto_id,[
                    'presentacione_id' => $preprod->presentacione_id,
                    'presentacioneproducto_id'=>$preprod->id,
                    'operacione_id' => 2,
                    'cantidad' => $resurtir[1],
                    'valor' => 0,
                    ]
                 );
            }
        }
        // echo "<br>id presentacion_producto: ".$preprod->id." producto_id: ".$preprod->producto_id." presentacion_id: ".$preprod->presentacione_id."<br>";
      }  

    }
}