<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Prueba;

class InicioController extends Controller
{
    public function index(){
        return view('index');
    }
}
