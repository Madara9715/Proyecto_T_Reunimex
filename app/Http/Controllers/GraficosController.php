<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
                $clientesinf = DB::table('clientes')
                ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
                ->join('deudas', 'ventas.id', '=', 'deudas.venta_id')
                ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
                ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
                ->join('presentacionproductos', 'productos.presentacionproducto_id', '=', 'presentacionproductos.id')
                ->select('ventas.folio','clientes.nombre_cliente','productos.nombre_producto','presentacionproductos.nombre_presentacionP','deudas.monto_restante','deudas.monto_abonado')
                ->get();
                
                $ProductosVentas = DB::table('productos')
                ->join('producto_venta','productos.id','=','producto_venta.producto_id')
                ->select('productos.nombre_producto')
                ->get()->pluck('nombre_producto');
                $ProductosCantidad = DB::table('producto_venta')
                ->select('producto_venta.cantidad')
                ->get()->pluck('cantidad');
                
                return view('dashboard.graficas',compact('clientesinf','ProductosVentas','ProductosCantidad'));
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
