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
        $idempleado = auth()->User()->empleado_id;
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
    public function store(Request $request)//carga un pago nuevo 
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

        $newpago = new Pago;//se registra un nuevo pago 
        $id_deuda=$request->input('deuda_id');
        $newpago->deuda_id = $request->input('deuda_id');
        $newpago->numero_pago = $request->input('numero_pago');
        $newpago->folio=$request->input('folio');
        $newpago->tipopago_id = $request->input('tipopago_id');
        $newpago->saldo_anterior = $request->input('saldo_anterior');
        $SaldoAnterior= $request->input('saldo_anterior');//recupero el saldo anterior 
        $MontoAbonado= $request->input('monto_abonado');//recupero el monto abonado en el pago actual
        $newpago->monto_abonado = $request->input('monto_abonado');
        $newpago->saldo_actual = $SaldoAnterior-$MontoAbonado;
        $newSaldo = $SaldoAnterior-$MontoAbonado;
        $newpago->detalles = $request->input('detalles');
        $newpago->save();
       
        $MontoPagado = DB::table('deudas')->select('deudas.monto_abonado')->where('id',$id_deuda)->value('monto_abonado');//recupero lo que ha pagado de su deuda

        $NewMonto=$MontoPagado+$MontoAbonado;//suma lo pagado al nuevo pago

        $UpdateDeuda = DB::table('deudas')
              ->where('id', $id_deuda)
              ->update(['monto_abonado' =>$NewMonto,'monto_restante'=>$newSaldo]);//actualiza en la deuda el monto abonado a la fecha y su deuda restante.
        /*$CuentaID = DB::table('clientes')//recupero el id de la cuenta, la consulta es muy grande solo para el id de la cuenta, no se para que el join
                ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
                ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
                ->select('deudas.cuenta_id')->where('deudas.id',$id_deuda)
                ->value('id');*/
                $CuentaID = DB::table('deudas')->select('cuenta_id')->where('id',$id_deuda)->value('id');//la consulta de arriba pero mas corta
        $CuentaU= Cuenta::find($CuentaID);//recupero la cuenta a la que pertenece la deuda
        $montoRestante=($CuentaU->monto_restante)-$MontoAbonado;//resto el pago al monto restante de la cuenta total.
        $UpdateCuenta = DB::table('cuentas')
                ->where('id',$CuentaID)
                ->update(['monto_abonado'=>$NewMonto,'monto_restante'=>$montoRestante]);//actualizo el monto restante de la cuenta
        if($newSaldo==0)//si el saldo restante de la deuda es igual a 0 entonces se deshabilita ya que se termino de pagar.
        {
            $UpdateDeuda = DB::table('deudas')
                ->where('id',$id_deuda)
                ->update(['activo'=>0]);
        }
        return redirect()->route('pagos.index');//redirije a la ruta pagos
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
                ->select('pagos.folio')->get()->last();//recupera el ultimopago
        $panel= "Deuda: ";
                if(!empty($folios))//verifica si ya hay pagos
                {
                    $ultfolio = $folios->folio;
                    $split = preg_split("/[-]/", $ultfolio);//separa el ultimo pago para aumentar uno 
                    $clave= $split[0]."-".($split[1]+1);
                }
                else
                {
                    $clave="P-1";//en caso de no haber pagos se manda el 1
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
