<?php

namespace App\Http\Controllers\Mathison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MathisonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
         return view('mathison.home.index');
     }
}
