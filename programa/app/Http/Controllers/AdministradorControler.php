<?php

namespace CruzRoja\Http\Controllers;

use CruzRoja\Voluntarios;
use CruzRoja\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdministradorControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntarios = DB::table('voluntarios')->count();
        $servicios = DB::table('servicio')->count();  
        $titulo = 'ENTORNO TRABAJO';

        return view('admin.index',compact('titulo','voluntarios','servicios'));
    }
}
