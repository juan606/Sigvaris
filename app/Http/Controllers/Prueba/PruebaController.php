<?php

namespace App\Http\Controllers\Prueba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;

class PruebaController extends Controller
{
    public function index(){
        return Paciente::with('ventas')->get();
    }
}
