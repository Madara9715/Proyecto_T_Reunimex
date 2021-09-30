<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\Tipoventa;
use App\Tipopago;
use App\Inventario;
use App\Venta;
use App\ProductoVenta;
use App\PresentacioneProducto;
use App\InventarioProducto;
use App\Cuenta;
use App\Deuda;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id ==1){
            $namepanel = "administrador";
            $encabezadotablas = array("productos de la venta");
            $panel = "Registro Venta: ".$user->empleado->nombre_empleado." ".$user->empleado->apellido_p."";
            $productosactivos=PresentacioneProducto::all();
            $clientes=Cliente::all();
            $tipoventas = Tipoventa::all(); 
            $tipopagos = Tipopago::all(); 
            
           // dd($productosactivos);
            return view('dashboard.newadminventa', compact('clientes','productosactivos','tipoventas','tipopagos','user'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel);
        }
        if ($user->role_id ==2){
            $namepanel = "asesor";
            $encabezadotablas = array("productos de la venta");
            $panel = "Nueva Venta: ".$user->empleado->nombre_empleado." ".$user->empleado->apellido_p."";
            $clientes = $user->empleado->clientes;
            $inventario = $user->empleado->inventario; 
            $tipoventas = Tipoventa::all(); 
            $tipopagos = Tipopago::all(); 
            $productosactivos = $inventario ->presentacioneproductosactiva;
           // dd($productosactivos);
            return view('dashboard.newventa', compact('inventario','clientes','productosactivos','tipoventas','tipopagos','user'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel);
        }
       
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

        $validator = Validator::make(
            $request->all(),
            [
                'id' => [
                    'required',
                    'integer',
                ],
                'cliente' => [
                    'required',
                    'integer',
                ],
                'tipoventa' => [
                    'required',
                    'integer',
                ],
                'tipopago' => [
                    'required',
                    'integer',
                ],
            ],
            [
                'required' => 'Debe ingresar un :attribute',
                'integer' => 'El :attribute :input es inválido en el sistema',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {

            $inv = Inventario::find($request->id);

            $todo = $request->get('todo');
            $totalventa = 0;
            $totalreal = 0;
            $idCliente= $request->cliente;
            foreach($todo as $all){
                $checar_es = explode (",", $all); 
                $prod = $inv->presentacioneproductosactiva()->find($checar_es[0]);
                if(($checar_es[2])==1){
                    $totalventa=  $totalventa+ (($checar_es[1]) *  ($prod->precio_publico));	
                }else{
                    $totalventa=  $totalventa+ (($checar_es[1]) *  ($prod->precio_distribuidor));
                }
                $totalreal = $totalreal + (($checar_es[1]) *  ($prod->precio_publico));
                //$cantmax = $inv->productosactivos()->where('presentacioneproducto_id',$checar_es[0])->get();
            } 
            //dd($cantmax);

            if(($request->tipoventa)==1){
                $venta = Venta::create(
                    [
                    'cliente_id'  => $request->cliente,
                    'empleado_id'  => $inv->empleado->id,
                    'tipoventa_id'  => $request->tipoventa,
                    'tipopago_id'  => $request->tipopago,
                    'observaciones' => "Ninguna",
                    'subtotal_venta' => $totalreal,
                    'total_venta' => $totalventa,
                    'activo' => 1,
                    ]
                );
    
              
    
                foreach($todo as $all){
                    $checar_es = explode (",", $all); 
                    $prod = $inv->presentacioneproductosactiva()->find($checar_es[0]);
    
                    $importeind = 0;
                    if(($checar_es[2])==1){
                        $importeind=   (($checar_es[1]) *  ($prod->precio_publico));	
                    }else{
                        $importeind=   (($checar_es[1]) *  ($prod->precio_distribuidor));
                    }
    
                    $invprod =  $inv ->productosactivos()->where('presentacioneproducto_id',$prod->id)->first();
                    $invprod->pivot->stock_restante = $invprod->pivot->stock_restante - $checar_es[1];
                    $invprod->pivot->save();
                    $inporteU= $importeind/$checar_es[1];
                    ProductoVenta::create([
                        'venta_id' => $venta->id,
                        'producto_id' =>$prod->producto_id,
                        'presentacione_id' => $prod->presentacione_id,
                        'presentacioneproducto_id'=>$prod->id,
                        'cantidad' => $checar_es[1],
                        'importe' => $inporteU,
                        'descuento' => null,
                        'total_importe' => $importeind,
                        ]
                    ); 
                }
            }else{
                $venta = Venta::create(
                    [
                    'cliente_id'  => $request->cliente,
                    'empleado_id'  => $inv->empleado->id,
                    'tipoventa_id'  => $request->tipoventa,
                    'tipopago_id'  => $request->tipopago,
                    'observaciones' => "Ninguna",
                    'subtotal_venta' => $totalreal,
                    'total_venta' => $totalventa,
                    'activo' => 1,
                    ]
                );
    
              
                $importeind = 0;
                foreach($todo as $all){
                    $checar_es = explode (",", $all); 
                    $prod = $inv->presentacioneproductosactiva()->find($checar_es[0]);
    
                    
                    if(($checar_es[2])==1){
                        $importeind=   (($checar_es[1]) *  ($prod->precio_publico));	
                    }else{
                        $importeind=   (($checar_es[1]) *  ($prod->precio_distribuidor));
                    }
    
                    $invprod =  $inv ->productosactivos()->where('presentacioneproducto_id',$prod->id)->first();
                    $invprod->pivot->stock_restante = $invprod->pivot->stock_restante - $checar_es[1];
                    $invprod->pivot->save();
                    $inporteU= $importeind/$checar_es[1];
                    ProductoVenta::create([
                        'venta_id' => $venta->id,
                        'producto_id' =>$prod->producto_id,
                        'presentacione_id' => $prod->presentacione_id,
                        'presentacioneproducto_id'=>$prod->id,
                        'cantidad' => $checar_es[1],
                        'importe' => $inporteU,
                        'descuento' => null,
                        'total_importe' => $importeind,
                        ]
                    );  
                }
                $cantidad=Cuenta::where('cliente_id',$idCliente)->count();
                $totalcuenta=0;
                $monto_restante=0;
                if($cantidad!=0)
                {
                    $idCuenta=Cuenta::where('cliente_id',$idCliente)->value('id');
                    $cuenta=Cuenta::find($idCuenta);
                    $totalcuenta= $cuenta->valor_total;
                    $monto_restante= $cuenta->monto_restante;
                    $totalcuenta+=$totalventa;
                    $monto_restante+=$totalventa;
                    $cuenta->valor_total=$totalcuenta;
                    $cuenta->monto_restante=$monto_restante;
                    $cuenta->save();

                $FechaActual=date("Y-m-d");
                $fecha_limite= date("Y-m-d",strtotime($FechaActual."+2 week"));
                Deuda::create([
                    'cuenta_id' => $cuenta->id,
                    'venta_id' => $venta->id,
                    'valor_total' => $totalventa,
                    'monto_restante' => $importeind,
                    'fecha_limite'=> $fecha_limite,
                    'activo' => 1,
                    ]
                );
                }
                else{
                    $cuenta=Cuenta::create([
                        'cliente_id'  => $request->cliente,
                        'valor_total' => $totalventa,
                        'monto_restante' => $totalventa,
                        'activo' => 1,
                        ]
                    );
                $FechaActual=date("Y-m-d");
                $fecha_limite= date("Y-m-d",strtotime($FechaActual."+2 week"));
                Deuda::create([
                    'cuenta_id' => $cuenta->id,
                    'venta_id' => $venta->id,
                    'valor_total' => $totalventa,
                    'monto_restante' => $importeind,
                    'fecha_limite'=> $fecha_limite,
                    'activo' => 1,
                    ]
                );
                }
            }

             
            //return   $venta;
            return response()->json(['success' => 'Se guardó correctamente']);
        } 
          
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
    public function destroy($id)
    {
        //
    }

    public function getlimitcant(Request $request){
        $user = Auth::user();
        $inventario = $user->empleado->inventario;
        $cantmax = $inventario->productosactivos()->where('presentacioneproducto_id',$request->id)->get();
        return $cantmax;
    }

    public function getproducto(Request $request){
        $user = Auth::user();
        $inventario = $user->empleado->inventario;
        $preproducto = $inventario->presentacioneproductosactiva()->find($request->id);
        $cantmax = $inventario->productosactivos()->where('presentacioneproducto_id',$request->id)->get();
        $presentacion = $preproducto->presentacione; 
        $prod = array ($cantmax[0],$preproducto,$presentacion);
        return $prod;
    }
}