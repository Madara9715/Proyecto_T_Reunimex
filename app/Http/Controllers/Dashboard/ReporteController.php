<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\VentasExport;
use App\Exports\CuentasExport;
class ReporteController extends Controller
{
    //

    public function ClienteCompras(Request $request)
    {
        //
        $this->validate($request,[
            'idCliente' => 'required',
            'tipoventa_id' => 'required',
            'fechainicial' => 'required',
            'fechafin' => 'required',
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $namepanel= "Administrador";
        $panel= "Compras";
        $fechainicio = $request->input('fechainicial');
        $fechafin=$request->input('fechafin');
        $mes= date('m');
        $tipoventa=$request->input('tipoventa_id');
        $id= $request->input('idCliente');
        if($tipoventa=='todo')
        {
            $ventas= DB::table('clientes')
            ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
            ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
            ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
            ->join('presentacione_producto', 'productos.id','=', 'presentacione_producto.producto_id')
            ->join('presentaciones', 'presentacione_producto.presentacione_id', '=', 'presentaciones.id')
            ->join('tipoventas', 'tipoventas.id','=','ventas.tipoventa_id')
            ->select('clientes.nombre_cliente','productos.nombre_producto',
            'producto_venta.cantidad','producto_venta.importe','producto_venta.total_importe','tipoventas.nombre_tipoV','ventas.created_at')
            ->distinct()
            ->where('clientes.id',$id)
            ->whereBetween('ventas.created_at', [$fechainicio, $fechafin])
            ->paginate(10);
        }
        else
        {
            $ventas= DB::table('clientes')
            ->join('ventas', 'clientes.id', '=', 'ventas.cliente_id')
            ->join('producto_venta', 'ventas.id', '=', 'producto_venta.venta_id')
            ->join('productos', 'producto_venta.producto_id', '=', 'productos.id')
            ->join('presentacione_producto', 'productos.id','=', 'presentacione_producto.producto_id')
            ->join('presentaciones', 'presentacione_producto.presentacion_id', '=', 'presentaciones.id')
            ->join('tipoventas', 'tipoventas.id','=','ventas.tipoventa_id')
            ->select('clientes.nombre_cliente','productos.nombre_producto',
            'producto_venta.cantidad','producto_venta.importe','producto_venta.total_importe','tipoventas.nombre_tipoV','ventas.created_at')
            ->distinct()
            ->where('clientes.id',$id)
            ->where('tipoventas.id',$tipoventa)
            ->whereBetween('ventas.created_at', [$fechainicio, $fechafin])
            ->paginate(10);
        }
       
        return view('dashboard.showcomprasclientes',compact('ventas'))->with('name', $namepanel)->with('panel', $panel)->with('fechainicio',$fechainicio)->with('fechafin',$fechafin);
    }
    public function ComprasExcel(Request $request)
    {
        //
        $this->validate($request,[
            'idCliente' => 'required',
            'tipoventa_id' => 'required',
            'fechainicial' => 'required',
            'fechafin' => 'required',
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $fechainicio = $request->input('fechainicial');
        $fechafin=$request->input('fechafin');
        $tipoventa=$request->input('tipoventa_id');
        $id= $request->input('idCliente');
        $VentaExport = new VentasExport;
        return  $VentaExport->Datos($id,$fechainicio,$fechafin,$tipoventa)->download('Compras'.$id.'.xlsx');
    }
    public function CuentasExcel()
    {
        $CuentaExport = new CuentasExport;
        return  $CuentaExport->download('CuentasExport.xlsx');
    }
}
