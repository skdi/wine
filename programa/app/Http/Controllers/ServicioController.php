<?php

namespace CruzRoja\Http\Controllers;

use CruzRoja\Servicio;
use CruzRoja\Detalle_Voluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CruzRoja\Http\Requests\StoreVoluntarioRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = DB::table('servicio')->get();
        $titulo = 'Listado de Servicios';
        return view('admin.servicios.index',compact('titulo','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.voluntarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoluntarioRequest $request)
    {
        /*
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotos/',$name);
            return $name;
        }
        */
        $voluntario= new Servicio();
        $voluntario->id_voluntario= $request->input('dni');
        $voluntario->nombre= $request->input('nombre');
        $voluntario->apellido= $request->input('apellido');
        $voluntario->area= $request->input('area');
        $voluntario->contraseña= $request->input('dni');
        $voluntario->estado= 1;
        $voluntario->tipo= $request->input('tipo_voluntario');
        try{
            $voluntario->save();
            $voluntarios = DB::table('voluntarios')->get();
            $titulo = 'Listado de Voluntarios';
            return view('admin.voluntarios.index',compact('titulo','voluntarios'));
        }
        catch(\Exception $e){
            // do task when error
            echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><center><i class="icon fa fa-bell-slash-o"></i>El usuario ya existe!!!</center></h4>
              </div>' ; // insert query
            return view('admin.voluntarios.create');
        }  
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_servicio)
    {
        $servicio= Servicio::find($id_servicio);
        $participantes=DB::table('participa_servicio')
        ->join('voluntarios', function ($join) use ($id_servicio) {
            $join->on('participa_servicio.id_voluntario', '=', 'voluntarios.id_voluntario')
                 ->where('participa_servicio.id_servicio', '=', $id_servicio);
        })->get();
        $comentarios=DB::table('comentario_servicio')
        ->join('voluntarios', function ($join) use ($id_servicio) {
            $join->on('comentario_servicio.id_voluntario', '=', 'voluntarios.id_voluntario')
                 ->where('comentario_servicio.id_servicio', '=', $id_servicio);
        })->get();
        $encargado=DB::table('encargado_servicio')
        ->join('voluntarios', function ($join) use ($id_servicio) {
            $join->on('encargado_servicio.id_voluntario', '=', 'voluntarios.id_voluntario')
                 ->where('encargado_servicio.id_servicio', '=', $id_servicio);
        })->first();
        $detalle_voluntario= Detalle_Voluntario::find($encargado->id_voluntario);
        return view('admin.servicios.verperfil',compact('servicio','participantes','comentarios','encargado','detalle_voluntario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntario= Servicio::find($id);
        return view('admin.voluntarios.edit',compact('voluntario'));
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
        //return $request;
        $voluntario= Servicio::find($id);
        if($request->input('dni')!='')
        {
            $voluntario->id_voluntario=$request->input('dni');
        }
        if($request->input('nombre')!='')
        {
            $voluntario->id_voluntario=$request->input('dni');
        }
        if($request->input('apellido')!='')
        {
            $voluntario->id_voluntario=$request->input('dni');
        }
        $voluntario->area= $request->input('area');
        $voluntario->estado= $request->input('estado');
        $voluntario->tipo= $request->input('tipo_voluntario');
        try{
            $voluntario->push();
            $voluntarios = DB::table('voluntarios')->get();
            $titulo = 'Listado de Voluntarios';
            return view('admin.voluntarios.index',compact('titulo','voluntarios'));
        }
        catch(\Exception $e){
            // do task when error
            echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><center><i class="icon fa fa-bell-slash-o"></i>El usuario ya existe!!!</center></h4>
              </div>' ; // insert query
            $voluntario= Voluntarios::find($id);
            return view('admin.voluntarios.edit',compact('voluntario'));
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voluntario= Servicio::find($id);
        $voluntario->estado= 0;
        $voluntario->push();
        $voluntarios = DB::table('voluntarios')->get();
        $titulo = 'Listado de Voluntarios';
        return view('admin/voluntarios');

    }
}
