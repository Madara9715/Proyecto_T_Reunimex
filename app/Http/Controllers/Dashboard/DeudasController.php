<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MessageAlert;
use Illuminate\Support\Facades\DB;



class DeudasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $namepanel= "Asesor";
        $panel= "Deuda";
        $idempleado = auth()->User()->empleado_id;
        $clientesinf = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->join('ventas', 'ventas.id', '=', 'deudas.venta_id')
                ->join('empleados', 'empleados.id','=','ventas.empleado_id')
                ->select('deudas.id','empleados.nombre_empleado','clientes.nombre_cliente','deudas.valor_total','deudas.monto_abonado','deudas.monto_restante','deudas.fecha_limite')
                ->where('deudas.activo',1)
                ->where('empleados.id',$idempleado)
                ->paginate(10);

        $FechaActual = date("Y-m-d");

        return view('dashboard.deudas',compact('clientesinf'))->with('name', $namepanel)->with('panel', $panel)->with('FechaActual',$FechaActual)->with('idempleado',$idempleado);
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
                ->select('deudas.id','clientes.nombre_cliente','clientes.apellido_p','clientes.apellid_m','deudas.monto_restante','deudas.fecha_limite')->where('deudas.id',$id)
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
