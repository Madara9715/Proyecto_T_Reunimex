<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use App\Cliente;

class ClientesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    
    public function view(): View
    {
        return view('exports.tablaclientes', [
            'clientes' => Cliente::orderBy('nombre_cliente','ASC')->get()
        ]);
    }
}
