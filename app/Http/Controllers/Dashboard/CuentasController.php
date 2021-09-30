<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MessageAlert;
use App\Cuenta;
use App\Deuda;
use App\Pago;
use App\Cliente;
use Illuminate\Support\Facades\DB;


class CuentasController extends Controller
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
        $panel= "Cuenta";
        $clientesinf = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('cuentas.id','clientes.nombre_cliente','cuentas.valor_total',
                'cuentas.monto_abonado','cuentas.monto_restante','cuentas.valor_interes',
                'deudas.fecha_limite')
                ->where('cuentas.activo',1)
                ->distinct()
                ->paginate(10);
        $FechaActual = date("Y-m-d");
                return view('dashboard.cuentas',compact('clientesinf'))->with('name', $namepanel)->with('panel', $panel)->with('FechaActual',$FechaActual);
    }

    public function infoCuenta($id)
    {
        $namepanel= "administrador";
        $panel= "Cuenta";
        $encabezadotablas= array("pagos", "deudas");
        $cuenta=Cuenta::find($id);
        $deudas=Deuda::where('cuenta_id',$id)->where('activo',1)->get();
        $nombre=Cliente::where('id',$cuenta->cliente_id)->get();
        $pagos=DB::table('pagos')
        ->join('deudas','deudas.id','=','pagos.deuda_id')
        ->join('cuentas','cuentas.id','=','deudas.cuenta_id')
        ->select('pagos.folio','pagos.numero_pago','pagos.saldo_anterior','pagos.monto_abonado','pagos.saldo_actual','pagos.created_at')
        ->where('cuentas.id',$id)
        ->where('deudas.activo',1)
        ->distinct()
        ->get();
        return view('dashboard.showcuenta',compact('cuenta','deudas','nombre','pagos'))->with('tablas', $encabezadotablas)->with('name', $namepanel)->with('panel', $panel);
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
        $deuda = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('deudas.id','clientes.nombre_cliente','clientes.apellido_p','clientes.apellido_m','deudas.monto_restante','deudas.fecha_limite')
                ->where('cuentas.id',$id)
                ->where('deudas.activo',1)
                ->get();
                Mail::to('fermin.valdez.reyes@gmail.com')->send(new MessageAlert($deuda));
        //return view('dashboard.correoalerta');
        return new MessageAlert($deuda);
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
        $panel= "Cuenta";
        $clientesinf = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->join('ventas', 'ventas.id', '=', 'deudas.venta_id')
                ->join('empleados', 'empleados.id','=','ventas.empleado_id')
                ->select('cuentas.id','clientes.nombre_cliente','cuentas.valor_total',
                'cuentas.monto_abonado','cuentas.monto_restante')
                ->where('cuentas.activo',1)
                ->where('empleados.id',$id)
                ->distinct()
                ->paginate(10);
        $FechaActual = date("Y-m-d");
                return view('dashboard.cuentas',compact('clientesinf'))->with('name', $namepanel)->with('panel', $panel)->with('FechaActual',$FechaActual);
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
