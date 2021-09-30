<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;//Quitar despues de haber creado un usuario desde aqui
//use Maatwebsite\Excel\Facades\Excel;


Auth::routes();


Route::group([//Usuarios no registrados, usuarios no activos o usuarios sin rol
    'middleware' => 'nouser'
],function(){
    Route::get('/', function () {return view('auth.login');});
    
    Route::get('/noaccess', function () {return view('noaccess');});
    Route::get('/excel',function(){
       
        //return $ClientesExport->download('Clientes.xlsx');
        //return Excel::download(new ProductosExport, 'productos.xlsx');
    });
});

Route::group([//Usuarios admin activos
    'middleware' => 'auth'
],function(){  
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'administrador',
    ],function(){
        Route::get('/', 'AdministradorController@index')->name('admin');

        Route::group([
            'namespace' => 'Dashboard'
        ],function(){
            Route::resource('/departamentos', 'DepartamentoController');
            Route::get('/empleados/paginacion', 'EmpleadoController@paginacion');
            Route::get('/borrar/{id}/empleado','EmpleadoController@infodelete')->name('eliminar');
            Route::resource('/empleados', 'EmpleadoController');
            Route::get('/almacen','InventarioController@almacen')->name('almacen');
            Route::get('inventarios/{id}/ventas', 'InventarioController@showventa')->name('ventasinventario');
            Route::post('/inventarios/surtir', 'InventarioController@surtir')->name('surtir');
            Route::resource('/inventarios', 'InventarioController');
            Route::post('/asignacion','EmpleadoController@asignacion')->name('clienteempleado');
            Route::get('/borrar/{id}/usuario','UserController@infodelete')->name('eliminarUsuario');
            Route::resource('/usuarios', 'UserController');
            Route::get('/borrar/{id}/cliente','ClientesController@infodelete')->name('eliminarCliente');
            Route::resource('/clientes','ClientesController');
            Route::get('/borrar/{id}/presentacion','PresentacionPController@infodelete')->name('eliminarPresentacion');
            Route::resource('/presentaciones','PresentacionPController');
            Route::get('/borrar/{id}/producto','ProductosController@infodelete')->name('eliminarProducto');
            Route::resource('/productos','ProductosController');
            Route::resource('/graficas','GraficosController');
            Route::get('/cuenta/{id}','CuentasController@infoCuenta')->name('infoCuenta');
            Route::resource('/cuentas', 'CuentasController');
            Route::post('/cliente/compras','ReporteController@ClienteCompras')->name('reportecompras');
            Route::post('/cliente/compras/descarga','ReporteController@ComprasExcel')->name('reportedescarga');
            Route::get('/cuentasD/descarga','ReporteController@CuentasExcel')->name('cuentasdescarga');
            Route::resource('/ventas', 'VentaController');
            Route::resource('/pagos', 'PagoController');
            Route::resource('/deudas', 'DeudasController');
        });
        
     });

     Route::group([
        'prefix' => 'asesor',
        'middleware' => 'asesor',
    ],function(){
        Route::get('/', 'AsesorController@index')->name('asesor');
        Route::group([
            'namespace' => 'Dashboard'
        ],function(){
            Route::resource('/ventas', 'VentaController');
            Route::resource('/pagos', 'PagoController');
            Route::resource('/deudas', 'DeudasController');
            Route::get('/clientes','ClientesAController@index')->name('clientes');
           
        });

     });
});

Route::group([//Usuarios no registrados, usuarios no activos o usuarios sin rol
    'middleware' => 'auth'
],function(){
    Route::group([
        'namespace' => 'Dashboard'
    ],function(){
        Route::post('/getproducto', 'VentaController@getproducto')->name('getproducto');
        Route::post('/getlimitcant', 'VentaController@getlimitcant')->name('getlimitcant');
        Route::resource('/ventas', 'VentaController');
    });
});



Route::get('/pruebas', function () 
{
    
       /* $tipoc = App\Tipocliente::create(
       [
        'clave' => '01',
        'nombre' => 'Empresa', 
        'descripcion' => 'Cliente tipo empresa'
       ]
       );

       $tipoc2 = App\Tipocliente::create(
        [
         'clave' => '02',
         'nombre' => 'Persona', 
         'descripcion' => 'Cliente tipo persona'
        ]
        );
   
       $cliente1 = App\Cliente::create([
        'tipocliente_id' =>2,
        'clave'=>'001',
        'nombre' => 'Eduardo', 
        'apellido_p' => 'Martinez',
        'apellido_m' => 'Flores',
        'telefono_fijo' => 468521214,
        'direccion' => 'Emiliano Zapata #528'
       ]);

       $cliente2 = App\Cliente::create([
        'tipocliente_id' =>1,
        'clave'=>'002',
        'nombre' => 'Tienda Minorista Bajio', 
        'telefono_fijo' => 478921121,
        'direccion' => 'Zapopan 258'
       ]);

       $cliente3 = App\Cliente::create([
        'tipocliente_id' =>2,
        'clave'=>'003',
        'nombre' => 'Jose', 
        'apellido_p' => 'Antellez',
        'apellido_m' => 'Rosales',
        'telefono_fijo' => 477895621,
        'telefono_movil' => 478754588,
        'direccion' => 'Benito Juarez #478'
       ]); */


       /* $rol1 = App\Role::create(
        [
         'clave' => '01',
         'nombre' => 'administrador', 
         'descripcion' => 'Administrador del sistema'
        ]
        );

        $rol2 = App\Role::create(
        [
         'clave' => '02',
         'nombre' => 'asesor', 
         'descripcion' => 'Asesor de ventas'
        ]
        ); */

        /* $tipoe1 = App\Tipoempleado::create(
        [
        'clave' => '01',
        'nombre' => 'administrador', 
        'descripcion' => 'Administrador de registros'
        ]
        );

        $tipoe2 = App\Tipoempleado::create(
        [
        'clave' => '02',
        'nombre' => 'asesor', 
        'descripcion' => 'Asesor de ventas'
        ]
        );

        $tipoe3 = App\Tipoempleado::create(
        [
        'clave' => '03',
        'nombre' => 'almacenista', 
        'descripcion' => 'Almacenista control de stock'
        ]
        );

        $dep1 = App\Departamento::create(
            [
             'clave' => '01',
             'nombre' => 'administracion', 
             'descripcion' => 'Departamento donde se realizan los aspectos administrativos en la empresa'
            ]
        );

        $dep2 = App\Departamento::create(
            [
             'clave' => '02',
             'nombre' => 'ventas', 
             'descripcion' => 'Departamento donde se efectuan las ventas en la empresa'
            ]
        ); */

        /* $empleado1 = App\Empleado::create([
            'tipoempleado_id' => 1,
            'departamento_id' => 1,
            'clave' => 001,
            'nombre' => 'Evelyn',
            'apellido_p' => 'Campos',
            'apellido_m' => 'Chaboya',
            'telefono_fijo' => 4622587896,
            'telefono_movil' => 4621254548,
            'direccion'=> 'Guadalupe Victoria #475',
            'correo_electronico'=> 'Marukawa.2shoten@gmail.com',
            'edad'=> 22,
            'sexo' => 2,
            'activo' => 1
        ]);

        $empleado2 = App\Empleado::create([
            'tipoempleado_id' => 2,
            'departamento_id' => 2,
            'clave' => 002,
            'nombre' => 'Manuel',
            'apellido_p' => 'Ortiz',
            'apellido_m' => 'Avila',
            'telefono_fijo' => 4626012325,
            'telefono_movil' => 489561214,
            'direccion'=> 'Mariano J Garcia #478',
            'correo_electronico'=> 'mane@gmail.com',
            'edad'=> 22,
            'sexo' => 1,
            'activo' => 1
        ]);

        $empleado3 = App\Empleado::create([
            'tipoempleado_id' => 2,
            'departamento_id' => 2,
            'clave' => 003,
            'nombre' => 'Fermin',
            'apellido_p' => 'Valdez',
            'apellido_m' => 'Reyes',
            'telefono_fijo' => 462125845,
            'direccion'=> 'Los Reyes #454',
            'correo_electronico'=> 'fermin2@gmail.com',
            'edad'=> 21,
            'sexo' => 1,
            'activo' => 1
        ]);


        $user1 = App\User::create([
        'role_id' =>1,
        'name' => 'EveAdmin', 
        'email' => 'Marukawa.2shoten@gmail.com',
        'password' => Hash::make('123admin'),
        'activo' => 1
        ]); 

        $user2 = App\User::create([
        'role_id' => 2,
        'name' => 'ManuelVendedor', 
        'email' => 'mane@gmail.com',
        'password' => Hash::make('1234admin'),
        'activo' => 1
        ]);

        $user3 = App\User::create([
        'role_id' => 2,
        'name' => 'FerminVendedor', 
        'email' => 'fermin2@gmail.com',
        'password' => Hash::make('12345admin'),
        'activo' => 1
        ]); 

        $user4 = App\User::create([
            'role_id' => 2,
            'empleado_id'=>4,
            'name_user' => 'PetroniloVendedor', 
            'email' => 'petronilo2@gmail.com',
            'password' => Hash::make('123456admin'),
            'activo' => 1
            ]);*/


        /* $sal1 = App\Salario::create(
            [
             'empleado_id' => 2,
             'monto' => 15000, 
             'activo' => 1
            ]
        );

        $sal2 = App\Salario::create(
            [
             'empleado_id' => 3,
             'monto' => 15000, 
             'activo' => 1
            ]
        ); */


       /*  $e1_c = App\Empleado::find(2);
        $e1_c->clientes()->attach([//forma 2
            1 =>[
                'cliente_id' =>1,
                'activo' => 1 
            ],
            2 =>[
                'cliente_id' => 2,
                'activo' => 1 
            ]
        ]);

        $e2_c = App\Empleado::find(3);
        $e2_c->clientes()->attach([//forma 2
            1 =>[
                'cliente_id' =>3,
                'activo' => 1 
            ]
        ]); */

        /* $e_i = App\Empleado::find(2);
        $inven1 = App\Inventario::create(
            [
             'empleado_id' => $e_i->id,
             'clave' => '0001',
             'detalles' => 'inventario del asesor: '. $e_i->nombre, 
             'activo' => 1
            ]
        );

        $e_i2 = App\Empleado::find(3);
        $inven1 = App\Inventario::create(
            [
             'empleado_id' => $e_i2->id,
             'clave' => '0002',
             'detalles' => 'inventario del asesor: '. $e_i2->nombre, 
             'activo' => 1
            ]
        ); */

       /*  $marca1 = App\Marca::create(
            [
             'clave' => '0001',
             'nombre' => 'kufol'
            ]
        );

        $marca2 = App\Marca::create(
            [
             'clave' => '0002',
             'nombre' => 'Brothex'
            ]
        );

        $marca3 = App\Marca::create(
            [
             'clave' => '0003',
             'nombre' => 'Multipro'
            ]
        );
           
        $prveedor1 = App\Proveedore::create(
            [
             'clave'=>'0001',
             'nombre'=> 'Almacenes gutierres',
             'contacto'=> 'Alvaro Peña Garcia',
             'telefono_fijo'=> 462585698,
             'telefono_movil'=> 123151415,
             'direccion'=> 'Las Ornelas #458',
             'correo_electronico'=>'gutalamce@outlook.com',
             'pagina'=>'www.almacenesgut.com',
             'activo'=>1,
            ]
        );

        $proveedor2 = App\Proveedore::create(
            [
             'clave'=>'0002',
             'nombre'=> 'Productos Agricolas Hinojosa',
             'contacto'=> 'Martin Fuentes Rios',
             'telefono_fijo'=> 458921225,
             'direccion'=> 'Chilpancingo Irapuato #478',
             'correo_electronico'=>'hinojo@outlook.com',
             'pagina'=>'www.hinojo.com',
             'activo'=>1,
            ]
        );

        $p_m1= App\Proveedore::find(1);
        $p_m1->marcas()->attach(3);
        $p_m1->marcas()->attach(2); 
        
        $p_m1= App\Proveedore::find(2);
        $p_m1->marcas()->attach(1); */

      /*   $tipoprod = App\Tipoproducto::create(
            [
             'clave' => '01',
             'nombre' => 'Propio',
             'descripcion' => 'Productos de la marca Reunimex'
            ]
        );

        $tipoprod2 = App\Tipoproducto::create(
            [
             'clave' => '02',
             'nombre' => 'Externo',
             'descripcion' => 'Productos externos'
            ]
        );

        $presprod1 = App\Presentacionproducto::create(
            [
             'clave' => '01',
             'nombre' => 'Lata',
             'detalle' => 'Lata de 80gramos'
            ]
        );

        $presprod2 = App\Presentacionproducto::create(
            [
             'clave' => '02',
             'nombre' => 'Galon',
             'detalle' => 'Galon liquido'
            ]
        );

        $catprod = App\Categoriaproducto::create(
            [
             'clave' => '01',
             'nombre' => 'Desalinizadores',
             'descripcion' => 'Desalinizadores de suelo',
             'activo' => 1
            ]
        );

        $catprod2 = App\Categoriaproducto::create(
            [
             'clave' => '02',
             'nombre' => 'Biofertilizantes',
             'descripcion' => 'Biofertilizantes de suelo',
             'activo' => 1
            ]
        );
        
        
        $subcatprod = App\Subcategoriaproducto::create(
            [
             'categoriaproducto_id'=>2,
             'clave' => '01',
             'nombre' => 'Vegetales',
             'descripcion' => 'Biofertilizantes de suelo de tipo natural',
             'activo' => 1
            ]
        );

        $subcatprod2 = App\Subcategoriaproducto::create(
            [
             'categoriaproducto_id'=>2,
             'clave' => '02',
             'nombre' => 'Quimicos',
             'descripcion' => 'Biofertilizantes de suelo de tipo quimico',
             'activo' => 1
            ]
        );

        $subcatprod3 = App\Subcategoriaproducto::create(
            [
             'categoriaproducto_id'=>1,
             'clave' => '01',
             'nombre' => 'Organicos',
             'descripcion' => 'Desalinizador de tipo organico',
             'activo' => 1
            ]
        ); */


         /*      $prod1 = App\Producto::create(
            [
                'clave'=>'000001',
                'categoriaproducto_id'=>2,
                'subcategoriaproducto_id'=>2,
                'nombre'=>'Arrancador 8080',
                'alterno'=>'ninguno',
                'descripcion'=> 'Biofertilizante alcalino',
                'presentacionproducto_id'=>1,
                'cantidadpresentacion'=>1,
                'unidadpresentacion'=> 'kilogramo',
                'tipoproducto_id'=> 1,
                'precio_adquisicion'=>500,
                'precio_venta'=>520
            ]
        ); 

        $prod2 = App\Producto::create(
            [
                'clave'=>'000002',
                'categoriaproducto_id'=>2,
                'subcategoriaproducto_id'=>2,
                'nombre'=>'Frutal Engorde',
                'alterno'=>'ninguno',
                'descripcion'=> 'Biofertilizante alcalino',
                'presentacionproducto_id'=>2,
                'cantidadpresentacion'=>800,
                'unidadpresentacion'=> 'mililitros',
                'tipoproducto_id'=> 1,
                'precio_adquisicion'=>600,
                'precio_venta'=>650
            ]
        ); 

        $prod3 = App\Producto::create(
            [
                'clave'=>'000003',
                'categoriaproducto_id'=>1,
                'subcategoriaproducto_id'=>2,
                'nombre'=>'Lucament',
                'alterno'=>'ninguno',
                'descripcion'=> 'Desalinizador alcalino',
                'presentacionproducto_id'=>2,
                'cantidadpresentacion'=>1,
                'unidadpresentacion'=> 'kilogramo',
                'tipoproducto_id'=> 1,
                'precio_adquisicion'=>280,
                'precio_venta'=>300
            ]
        );  */

      /*   $composicion = App\Composicione::create(
            [
             'producto_id' => 1,
             'clave'  =>'0001',
             'descripcion' => 'Receta del producto Frutal engorde'
            ]
        );

        $ing1 = App\Ingrediente::create(
            [
             'clave' =>'00001',
             'nombre' => 'Acetato',
             'descripcion' => 'Acetato de metilo',
             'activo' => 1
            ]
        );

        $ing2 = App\Ingrediente::create(
            [
             'clave' =>'00002',
             'nombre' => 'Guano de murcielago',
             'descripcion' => 'Guano de murcielago natural',
             'activo' => 1
            ]
        );

        $ing3 = App\Ingrediente::create(
            [
             'clave' =>'00003',
             'nombre' => 'Agua hidrogenada',
             'descripcion' => 'Agua 40% hidrogenada',
             'activo' => 1
            ]
        ); 

        $com = App\Composicione::find(1);

        $com->ingredientes()->attach([//forma 2
            1 =>[
                'ingrediente_id' => 1,
                'cantidad'=>200,
                'unidad_medida'=> 'gramos'
            ],
            2 =>[
                'ingrediente_id' => 2,
                'cantidad'=>80,
                'unidad_medida'=> 'miligramos'
            ],
            3 =>[
                'ingrediente_id' => 3,
                'cantidad'=>500,
                'unidad_medida'=> 'mililitros'
            ]
        ]); */

      /*   $inv = App\Inventario::find(1);
        $inv->Productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'stock'=>10
            ],
            2 =>[
                'producto_id' => 2,
                'stock'=>7
            ]
        ]);

        $inv2 = App\Inventario::find(2);
        $inv2->Productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'stock'=>1
            ],
            2 =>[
                'producto_id' => 2,
                'stock'=>4
            ],
            3 =>[
                'producto_id' => 3,
                'stock'=>12
            ]
        ]);
        */ 

        /* $almacen = App\Almacene::create(
            [
             'clave'=> '001',
             'nombre'=> 'Almacen principal',
             'detalles'=> 'Almacen ubicado en la propiedad reunimex',
             'telefono_fijo'=> 4621584512,
             'direccion'=> 'Rio Loma #560',
             'activo' => 1
            ]
        ); 
        
        $al = App\Almacene::find(1);

        $al->productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'stock'=>50
            ],
            2 =>[
                'producto_id' => 2,
                'stock'=>100
            ],
            3 =>[
                'producto_id' => 3,
                'stock'=>40
            ]
        ]); */

        /* $tventa1 = App\Tipoventa::create(
            [
             'clave'  =>'01',
             'nombre' => 'Contado'
            ]
        );

        $tventa2 = App\Tipoventa::create(
            [
             'clave'  =>'02',
             'nombre' => 'Credito'
            ]
        );

        $tpago1 = App\Tipopago::create(
            [
             'clave'  =>'01',
             'nombre' => 'Efectivo'
            ]
        );  

        $tpago2 = App\Tipopago::create(
            [
             'clave'  =>'02',
             'nombre' => 'Targeta'
            ]
        ); 

        $tpago3 = App\Tipopago::create(
            [
             'clave'  =>'03',
             'nombre' => 'Transferencia'
            ]
        );

        $descu1 = App\Descuento::create(
            [
                'clave' => '00001',
                'nombre' => 'DESC10',
                'porcentaje_descuento' => 10,
                'descripcion' => 'Descuento del 10% del valor total',
                'activo' => 1
            ]
        );

        $descu2 = App\Descuento::create(
            [
                'clave' => '00002',
                'nombre' => 'DESC20',
                'porcentaje_descuento' => 20,
                'descripcion' => 'Descuento del 20% del valor total',
                'activo' => 0
            ]
        );

        $descu3 = App\Descuento::create(
            [
                'clave' => '00003',
                'nombre' => 'DESC30',
                'porcentaje_descuento' => 30,
                'descripcion' => 'Descuento del 30% del valor total',
                'activo' => 0
            ]
        ); */

       /*  $venta1 = App\Venta::create(
            [
                'folio'=>'000001',
                'cliente_id'=>1,
                'empleado_id'=>2,
                'tipoventa_id'=>1,
                'tipopago_id'=>1,
                'observaciones'=>'Primera venta :D',
                'activo' => 1
            ]
        );

        $venta2 = App\Venta::create(
            [
                'folio'=>'000002',
                'cliente_id'=>3,
                'empleado_id'=>2,
                'tipoventa_id'=>1,
                'tipopago_id'=>1,
                'observaciones'=>'Segunda venta :D',
                'activo' => 1
            ]
        );

        $venta3 = App\Venta::create(
            [
                'folio'=>'000003',
                'cliente_id'=>2,
                'empleado_id'=>3,
                'tipoventa_id'=>2,
                'tipopago_id'=>2,
                'observaciones'=>'Primera venta :D',
                'activo' => 1
            ]
        ); */
        /* 
        $venta1 = App\Venta::find(1);
        $venta1->productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'cantidad'=>1,
                'importe'=>950,
                'total_importe'=>950
            ],
            2 =>[
                'producto_id' => 2,
                'cantidad'=>2,
                'importe'=>1500,
                'total_importe'=>1500
            ]
        ]);

        $venta2 = App\Venta::find(2);
        $venta2->productos()->attach([//forma 2
            1 =>[
                'producto_id' => 3,
                'cantidad'=>7,
                'importe'=>450,
                'total_importe'=>580
            ]
        ]);

        $venta3 = App\Venta::find(3);
        $venta3->productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'cantidad'=>1,
                'importe'=>950,
                'total_importe'=>950
            ],
            2 =>[
                'producto_id' => 2,
                'cantidad'=>2,
                'importe'=>1500,
                'total_importe'=>1500
            ],
            3 =>[
                'producto_id' => 3,
                'cantidad'=>7,
                'importe'=>450,
                'total_importe'=>580
            ]
        ]); */

       /*  $pedido = App\Pedido::create(
            [
                'folio'=>'0001',
                'empleado_id'=>3,
                'cliente_id'=>1,
                'detalles'=>'Primer pedido de cliente 1',
                'valor_pedido'=>5600,
                'fecha_objetivo'=>$now = now(),
                'activo' => 1
            ]
        ); 

        $ped = App\Pedido::find(1);
        $ped->productos()->attach([//forma 2
            1 =>[
                'producto_id' => 1,
                'cantidad'=>4,
                'subtotal'=>3800
            ],
            2 =>[
                'producto_id' => 2,
                'cantidad'=>1,
                'subtotal'=>1500
            ]
        ]);

        $cuenta = App\Cuenta::create(
            [
                'folio'=>'000001',
                'cliente_id'=>2,
                'valor_total'=>250000,
                'monto_abonado'=>0,
                'monto_restante'=>250000,
                'activo' => 1
            ]
        );
        
        $deuda = App\Deuda::create(
            [
                'cuenta_id'=>1,
                'venta_id'=>3,
                'folio'=> '0000001',
                'valor_total'=> 250000,
                'monto_abonado'=>0,
                'monto_restante'=>250000,
                'fecha_limite'=>$now = now(),
                'activo' => 1
            ]
        );  */

        /* $pago1 = App\Pago::create(
            [
                'deuda_id'=> 1,
                'numero_pago'=> 1,
                'folio'=> '000001',
                'tipopago_id'=> 1,
                'saldo_anterior'=> 250000,
                'monto_abonado'=> 2000,
                'saldo_actual'=> 248000,
                'detalles' => 'Primer pago'
            ]
        ); 

        $pago2 = App\Pago::create(
            [
                'deuda_id'=> 1,
                'numero_pago'=> 1,
                'folio'=> '000002',
                'tipopago_id'=> 1,
                'saldo_anterior'=> 248000,
                'monto_abonado'=> 8000,
                'saldo_actual'=> 240000,
                'detalles' => 'Segundo pago'
            ]
        ); 

        $cliente = App\Cliente::find(1);

        $cliente->direcciones()->create(
            [
                'estado_id'=>1,
                'municipio_id'=>2,
                'localidad'=>'Arroyo Ojocalientillo',
                'codigo_postal'=>38459,
                'colonia'=>'Apatzingan',
                'calle'=>'Matamoros',
                'numero_interno'=>589,
                'numero_externo' => 25
            ]
        );

        $emple = App\Empleado::find(1);

        $emple->direcciones()->create(
            [
                'estado_id'=>1,
                'municipio_id'=>2,
                'localidad'=>'La Teresa',
                'codigo_postal'=>58932,
                'colonia'=>'Las ortalizas',
                'calle'=>'Emiliano Zapata',
                'numero_externo' => 258
            ]
        );

        $prove = App\Proveedore::find(1);

        $prove->direcciones()->create(
            [
                'estado_id'=>2,
                'municipio_id'=>19,
                'localidad'=>'Chimalhuacan',
                'codigo_postal'=>24584,
                'colonia'=>'Junta de los Ríos',
                'calle'=>'Francisco Villa',
                'numero_interno'=>1589,
                'numero_externo' => 256
            ]
        );  */

        /* $acci1 = App\Accione::create(
            [
             'clave'  =>'01',
             'nombre' => 'recepcion'
            ]
        ); 

        $acci2 = App\Accione::create(
            [
             'clave'  =>'02',
             'nombre' => 'traspaso'
            ]
        );
        
        $op1 = App\Operacione::create(
            [
             'clave'  =>'01',
             'nombre' => 'Entrada',
             'descripcion' => 'Entrada de producto'
            ]
        ); 

        $op2 = App\Operacione::create(
            [
             'clave'  =>'02',
             'nombre' => 'Salida',
             'descripcion' => 'Salida de producto'
            ]
        );
        
        $mov = App\Movimiento::create(
            [
             'folio'  =>'0000001',
             'operacione_id' => 1,
             'descripcion' => 'Entrada de producto al almacen'
            ]
        );

        $mov = App\Movimiento::find(1);

        $mov->empleados()->attach([//forma 2
            1 =>[
                'empleado_id'=>2,
                'accion_id'=>2
            ]
        ]); */

        /* $movi = App\Movimiento::find(1);

        $movi->productos()->attach([//forma 2
            1 =>[
                'producto_id'=>2,
                'cantidad' =>7,
                'operacione_id'=>2,
                'valor'=>750
            ],
            2 =>[
                'producto_id'=>1,
                'cantidad' =>4,
                'operacione_id'=>2,
                'valor'=>280
            ]
        ]);
        
        $almace = App\Almacene::find(1);//Origen

        $almace->origenes()->create(
            [
                'movimiento_id'=>1
            ]
        );

        $inv = App\Inventario::find(2);//Destino

        $inv->destinos()->create(
            [
                'movimiento_id'=>1
            ]
        ); 

        $alma = App\Almacene::find(1);

        $alma->direcciones()->create(
            [
                'estado_id'=>2,
                'municipio_id'=>19,
                'localidad'=>'Artemisa',
                'codigo_postal'=>25541,
                'colonia'=>'Los rosales',
                'calle'=>'Matamoros',
                'numero_externo' => 1258
            ]
        );

        $alerta = App\Alerta::create(
            [
                'cuenta_id'=>1,
                'valor'=> 15000,
                'activo' => 1
            ]
        ); */
       

        /* echo "Listo";  */      
});