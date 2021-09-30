<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;



class VentasExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function Datos(int $id,string $fechainicio,string $fechafin, string $tipoventa)
    {
        $this->id = $id;     
        $this->fechainicio = $fechainicio;
        $this->fechafin = $fechafin;
        $this->tipoventa = $tipoventa;
        return $this;
    }
    public function view(): View
    {
        if($this->tipoventa=='todo')
        {
        $consulta= DB::table('clientes')
        ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
        ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
        ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
        ->join('productos_presentacion', 'productos.id','=', 'productos_presentacion.producto_id')
        ->join('presentacionproductos', 'productos_presentacion.presentacion_id', '=', 'presentacionproductos.id')
        ->join('tipoventas', 'tipoventas.id','=','ventas.tipoventa_id')
        ->select('clientes.nombre_cliente','productos.nombre_producto',
        'producto_venta.cantidad','producto_venta.importe','producto_venta.total_importe','tipoventas.nombre_tipoV','ventas.created_at')
        ->distinct()
        ->where('clientes.id',$this->id)
        ->whereBetween('ventas.created_at', [$this->fechainicio, $this->fechafin])
        ->get();
        }
        else
        {
        $consulta= DB::table('clientes')
        ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
        ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
        ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
        ->join('productos_presentacion', 'productos.id','=', 'productos_presentacion.producto_id')
        ->join('presentacionproductos', 'productos_presentacion.presentacion_id', '=', 'presentacionproductos.id')
        ->join('tipoventas', 'tipoventas.id','=','ventas.tipoventa_id')
        ->select('clientes.nombre_cliente','productos.nombre_producto',
        'producto_venta.cantidad','producto_venta.importe','producto_venta.total_importe','tipoventas.nombre_tipoV','ventas.created_at')
        ->distinct()
        ->where('clientes.id',$this->id)
        ->where('tipoventas.id',$this->tipoventa)
        ->whereBetween('ventas.created_at', [$this->fechainicio, $this->fechafin])
        ->get();
        }
        return view('exports.tablacomprascliente', [
            'ventas' => $consulta
        ]);
    }
}
