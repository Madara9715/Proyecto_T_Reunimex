<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empleado;
use APP\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $panel= "usuarios";
        $nuevo= "usuario";
        $usuarios = User::paginate(10);
        $empleados= Empleado::all();
        $role = Role::all();
        return view('dashboard.usuarios',compact('empleados','usuarios','role'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo', $nuevo);
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
            'role_id' => 'required',
            'empleado_id' => 'required|unique:users',
            'name_user'=> 'required|max:30',
            'email'=> 'max:50',
            'password'=> 'required',
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);
        $idusuario= User::all()->last()->id;
        $newuser = new User;
        $newuser->id=$idusuario+1;
        $newuser->role_id = $request->input('role_id');
        $newuser->empleado_id = $request->input('empleado_id');
        $newuser->name_user=$request->input('name_user');
        $newuser->email = $request->input('email');
        $newuser->password = Hash::make($request->input('password'));
        $newuser->activo = 1;
        $newuser->save();
        return redirect()->route('usuarios.index');
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
        $panel= "usuarios";
        $nuevo= "usuario";
        $usuario = User::find($id);
        $role = Role::all();
        $rolActual= Role::find($usuario->role_id);
        return view('dashboard.edituser',compact('usuario','role','rolActual'))->with('name', $namepanel)->with('panel', $panel)->with('nuevo', $nuevo);
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
        $this->validate($request,[
            'role_id' => 'required',
            'name_user'=> 'required|max:30',
            'email'=> 'max:50',
            'activo'=> 'required'
            
        ],
        [
            'required' => 'Debe ingresar un :attribute',
            'unique' => 'El :attribute :input ya se encuentra activo en el sistema, debe escoger otro no repetido',
            'max' => 'El campo :attribute no debe ser mayor a :max carácteres'
        ]);

        $newuser = User::find($id);
        $newuser->role_id = $request->input('role_id');
        $newuser->name_user=$request->input('name_user');
        $newuser->email = $request->input('email');
        if(empty($request->input('password')))
        {
            
        }
        else
        {
            $newuser->password = Hash::make($request->input('password'));
        }
        $newuser->activo = $request->input('activo');
        $newuser->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infodelete($id)
    {

        $usuario = User::find($id);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        //
        $usuario = User::find($id);
        $usuario->activo=0;
        $usuario->save();
        return json_encode(array('statusCode' => 200));
    }
}
