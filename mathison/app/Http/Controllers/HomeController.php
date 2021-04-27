<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('mathison.home.index');
    }

    /*
    * Implementar uma função que recupera as tabelas de negocios, sistemas, atividades e
    * passa às variáveis como parâmetro para a view includes.
    */

    
}
