<?php

namespace CruzRoja\Http\Controllers;
use CruzRoja\Voluntarios;
use CruzRoja\Detalle_Voluntario;
use CruzRoja\Horas_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CruzRoja\Http\Requests\StoreVoluntarioRequest;

class VoluntarioControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntarios = DB::table('voluntarios')->get();
        $titulo = 'Listado de Voluntarios';
        return view('admin.voluntarios.index',compact('titulo','voluntarios'));
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


        $voluntario= new Voluntarios();
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
    public function show($id_voluntario)
    {
        $voluntario= Voluntarios::find($id_voluntario);
        $detalle_voluntario= Detalle_Voluntario::find($id_voluntario);
        $horas_servicio= Horas_Servicio::find($id_voluntario);
        return view('admin.voluntarios.verperfil',compact('voluntario','detalle_voluntario','horas_servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntario= Voluntarios::find($id);
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
        $voluntario= Voluntarios::find($id);
        if($request->input('dni')!='')
        {
            $voluntario->id_voluntario=$request->input('dni');
        }
        if($request->input('nombre')!='')
        {
            $voluntario->nombre=$request->input('nombre');
        }
        if($request->input('apellido')!='')
        {
            $voluntario->apellido=$request->input('apellido');
        }
        $voluntario->area= $request->input('area');
        $voluntario->estado= $request->input('estado');
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
                <h4><center><i class="icon fa fa-bell-slash-o"></i>El voluntario ya existe!!!</center></h4>
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
        $voluntario= Voluntarios::find($id);
        $voluntario->estado= 0;
        $voluntario->push();
        $voluntarios = DB::table('voluntarios')->get();
        $titulo = 'Listado de Voluntarios';
        return view('admin/voluntarios.index',compact('titulo','voluntarios'));


    }
}

 