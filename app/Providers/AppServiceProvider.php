<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, config('app.locale'));

        Relation::morphMap([
            'cliente' => 'App\Cliente',
            'empleado' => 'App\Empleado',
            'proveedor' => 'App\Proveedore',

            'almacen' => 'App\Almacene',
            'inventario' => 'App\Inventario',
            'pedido' => 'App\Pedido',
            'venta' => 'App\Venta',
        ]);

        

        

        view()->composer('layouts.app', function($view){
            $user = Auth::user();
            if ( $user->esAdmin()){
                $navbr = array (
                    "empresa"=> array("empleados","usuarios","departamentos"),
                    "almacen"=> array("ver almacen","inventarios"),
                    "clientes"=> array("ver clientes","cuentas"),
                    "productos"=> array("ver productos"),
                    "ventas"=> array("ver ventas","nueva venta")
                   ); 

                   $route = array(
                    array("empleados.index","usuarios.index","departamentos.index"),
                    array("almacen","inventarios.index"),
                    array("clientes.index","cuentas.index"),
                    array("productos.index"),
                    array("admin","ventas.index")
                   );
            }
            else{
                $navbr = array (
                    "inventario"=> array("ver inventario"),
                    "clientes"=> array("ver clientes","deudas","pagos"),
                    "ventas"=> array("ver ventas","nueva venta")
                   );

                   $route = array(
                    array("Ainventario",),
                    array("clientes","deudas.index","pagos.index"),
                    array("asesor","ventas.index")
                   );
            }
            
           
            $view
            ->with('user', $user)
            ->with('nav', $navbr)
            ->with('ruta', $route);  
        });
    }
}
