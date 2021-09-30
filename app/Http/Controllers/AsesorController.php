<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AsesorController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        return view('asesor.index');
        //return view('asesor.index',compact('user'));
    }
}
