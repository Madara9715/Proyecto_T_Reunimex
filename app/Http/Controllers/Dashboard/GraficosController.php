<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cuenta;
class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //subconsulta
       /* $users = User::where(function ($query) {
            $query->select('type')
                ->from('membership')
                ->whereColumn('user_id', 'users.id')
                ->orderByDesc('start_date')
                ->limit(1);
        }, 'Pro')->get();*/
        //Union
     /*   $first = DB::table('users')
            ->whereNull('first_name');

        $users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();*/
        //consulta por mes
           /* $users = DB::table('users')
                ->whereMonth('created_at', '12')
                ->get();*/
                //Consulta por fecha
              /*  $users = DB::table('users')
                ->whereDate('created_at', '2016-12-31')
                ->get();*/
        //Jon interna
       /* $namepanel= "Administrador";
        $panel= "Pagos";
                $pagos = DB::table('clientes')
                ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
                ->join('deudas', 'ventas.id', '=', 'deudas.venta_id')
                ->join('pagos', 'deudas.id','=','pagos.deuda_id')
                ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
                ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
                //,'presentacionproductos.nombre_presentacionP','producto_venta.cantidad','pagos.saldo_anterior','pagos.monto_abonado','pagos.saldo_actual'
                ->select('pagos.id','pagos.created_at','Clientes.nombre_cliente','Clientes.apellido_p',
                'Clientes.apellido_m','productos.nombre_producto','pagos.saldo_anterior','pagos.monto_abonado','pagos.saldo_actual')
                ->whereMonth('pagos.created_at', 11)
                ->distinct()
                ->get();
                $AñoMes = date("Y-m");
               $ventas= DB::table('clientes')
                ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
                ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
                ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
                ->join('productos_presentacion', 'productos.id','=', 'productos_presentacion.producto_id')
                ->join('presentacionproductos', 'productos_presentacion.presentacion_id', '=', 'presentacionproductos.id')
                ->join('tipoventas', 'tipoventas.id','=','ventas.tipoventa_id')
                ->select('clientes.nombre_cliente','productos.nombre_producto','producto_venta.cantidad','tipoventas.nombre_tipoV')
                ->distinct()
                ->get();
                $ProductosVentas = DB::table('productos')
                ->join('producto_venta','productos.id','=','producto_venta.producto_id')
                ->join('ventas', 'ventas.id','=','producto_venta.venta_id')
                ->select('productos.nombre_producto','producto_venta.cantidad')
                ->distinct()
                ->get();
              
                
                return view('dashboard.graficas',compact('pagos','ProductosVentas','ventas'))->with('name', $namepanel)->with('panel', $panel)->with('AñoMes',$AñoMes);*/
                $idCliente=3;
                $totalventa=240;
                $totalcuenta=0;
                $monto_restante=0;
                $cantidad=Cuenta::where('cliente_id',$idCliente)->count();
                if($cantidad!=0)
                {
                    $idCuenta=Cuenta::where('cliente_id',$idCliente)->value('id');
                    $cuenta=Cuenta::find($idCuenta);
                    $totalcuenta= $cuenta->valor_total;
                    $totalcuenta+=$totalventa;
                    $monto_restante+=$totalventa;
                    $cuenta->valor_total=$totalcuenta;
                    $cuenta->monto_restante=$monto_restante;
                    $cuenta->save();
                }
                else{
                    $cuenta=Cuenta::create([
                        'cliente_id'  => $request->cliente,
                        'valor_total' => $totalventa,
                        'monto_restante' => $totalventa,
                        'activo' => 1,
                        ]
                    );
                }
                
                return view('dashboard.cuentasprueba',compact('cuenta'))->with('total',$totalcuenta)->with('cantidad',$cantidad);
        //Join tables
        /*
        DB::table('users')
        ->join('contacts', function ($join) {
            $join->on('users.id', '=', 'contacts.user_id')->orOn(...);
        })
        ->get();*/
        //Union simple
       /* $sizes = DB::table('sizes')
            ->crossJoin('colors')
            ->get();*/
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
}
