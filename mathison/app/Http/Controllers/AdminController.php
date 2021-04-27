<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('mathison.admin.admin');
    }

    public function registroTecnico() {
        return view('mathison.admin.admin-registro-tecnico');
    }
    
    public function cadastroTecnica() {
        return view('mathison.admin.admin-cadastro-tecnica');
    }
    
}
