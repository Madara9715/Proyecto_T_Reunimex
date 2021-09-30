<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;


class AdministradorController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        //return view('admin.index');
        return view('admin.index');
    }
}
