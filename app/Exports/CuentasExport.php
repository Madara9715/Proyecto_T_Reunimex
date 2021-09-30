<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class CuentasExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function view(): View
    {
        return view('exports.tablacuentas', [
            'clientesinf' => DB::table('clientes')
            ->join('cuentas', 'clientes.id', '=', 'cuentas.cliente_id')
            ->join('deudas', 'cuentas.id', '=', 'deudas.cuenta_id')
            ->select('cuentas.id','clientes.nombre_cliente','cuentas.valor_total',
            'cuentas.monto_abonado','cuentas.monto_restante','cuentas.valor_interes',
            'deudas.fecha_limite')
            ->where('cuentas.activo',1)
            ->distinct()
            ->get()
        ]);
    }
}
