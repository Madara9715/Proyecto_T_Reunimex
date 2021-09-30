<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipopago;
use App\Pago;
use App\Cuenta;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namepanel= "asesor";
        $panel= "pago";
        $idempleado = auth()->id();
        $clientesinf = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->join('ventas', 'ventas.id', '=', 'deudas.venta_id')
                ->join('empleados', 'empleados.id','=','ventas.empleado_id')
                ->join('pagos', 'deudas.id', '=', 'pagos.deuda_id')
                ->select('deudas.id','clientes.nombre_cliente','pagos.numero_pago','pagos.monto_abonado','pagos.saldo_actual','pagos.created_at','deudas.fecha_limite')
                ->where('cuentas.activo',1)
                ->where('empleados.id',$idempleado)
                ->paginate(10);
                return view('dashboard.pagos',compact('clientesinf'))->with('name', $namepanel)->with('panel', $panel);
        //
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
            'deuda_id' => 'required',
            'numero_pago' => 'required',
            'folio'=>'max:10',
            'tipopago_id'=> 'required',
            'saldo_anterior'=> 'required',
            'monto_abonado'=> 'required',
            'detalles'=> 'max:100',
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);

        $newpago = new Pago;
        $id_deuda=$request->input('deuda_id');
        $newpago->deuda_id = $request->input('deuda_id');
        $newpago->numero_pago = $request->input('numero_pago');
        $newpago->folio=$request->input('folio');
        $newpago->tipopago_id = $request->input('tipopago_id');
        $newpago->saldo_anterior = $request->input('saldo_anterior');
        $SaldoAnterior= $request->input('saldo_anterior');
        $MontoAbonado= $request->input('monto_abonado');
        $newpago->monto_abonado = $request->input('monto_abonado');
        $newpago->saldo_actual = $SaldoAnterior-$MontoAbonado;
        $newSaldo = $SaldoAnterior-$MontoAbonado;
        $newpago->detalles = $request->input('detalles');
        $newpago->save();
       
        $MontoPagado = DB::table('deudas')->select('deudas.monto_abonado')->where('id',$id_deuda)->value('monto_abonado');

        $NewMonto=$MontoPagado+$MontoAbonado;

        $UpdateDeuda = DB::table('deudas')
              ->where('id', $id_deuda)
              ->update(['monto_abonado' =>$NewMonto,'monto_restante'=>$newSaldo]);
        $CuentaID = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('deudas.cuenta_id')->where('deudas.id',$id_deuda)
                ->value('id');
        $CuentaU= Cuenta::find($CuentaID);
        $montoRestante=($CuentaU->monto_restante)-$MontoAbonado;
        $UpateCuenta = DB::table('cuentas')
                ->where('id',$CuentaID)
                ->update(['monto_abonado'=>$NewMonto,'monto_restante'=>$montoRestante]);
        if($newSaldo==0)
        {
            $UpateCuenta = DB::table('deudas')
                ->where('id',$id_deuda)
                ->update(['activo'=>0]);
        }
        return redirect()->route('pagos.index');
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
        $namepanel= "administrador";
        
        $deuda = DB::table('clientes')
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('deudas.id','clientes.nombre_cliente','clientes.apellido_p','clientes.apellido_m','deudas.monto_restante')->where('deudas.id',$id)
                ->get();
        $pagos =DB::table('pagos')
                ->join('deudas', 'pagos.deuda_id','=', 'deudas.id')
                ->select('pagos.numero_pago')->where('deudas.id',$id)
                ->get()->last();
        $tipo_pago = Tipopago::all();
        $folios=DB::table('pagos')
                ->select('pagos.folio')->get()->last();
        $panel= "Deuda: ";
                if(!empty($folios))
                {
                    $ultfolio = $folios->folio;
                    $clave = preg_split("/[-]/", $ultfolio);
                }
                else
                {
                    $clave="P-00000001";
                }
        return view('dashboard.newpago',compact('deuda','pagos','tipo_pago','clave'))->with('name', $namepanel)->with('panel', $panel);
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
