<?php

namespace App\Http\Controllers;
use DB;
use  App\Profesional;

use Illuminate\Http\Request;
use Session;
use ValidateRequests;

class ProfesionalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('coordinador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$profesionales = Profesional::orderBy('id','asc');
        // $profesionales = Profesional::has('evento')->get();
        // dd($profesionales);
        $profesionales = Profesional::all();
        return view('profesional.index')->with('profesionales',$profesionales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profesional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'rut' => 'required|cl_rut|max:12|unique:profesional',
            'nombre' => 'required|max:45',
            'apellidoPaterno' => 'required|max:45',
            'apellidoMaterno' => 'required|max:45',
            'correo' => 'required|max:45|unique:profesional',
            'telefono' => 'numeric|digits_between:0,15',
            'celular' => 'required|numeric|digits_between:1,15',
            'pass' => 'required|max:15|min:6',
            'passSeguridad' => 'required|same:pass',
        ]);
        
        //Create Post
        $profesional= new Profesional();
        $profesional->rut = $request->input('rut'); 
        $profesional->nombre = $request->input('nombre'); 
        $profesional->apellidoPaterno = $request->input('apellidoPaterno');
        $profesional->apellidoMaterno = $request->input('apellidoMaterno');
        $profesional->direccion = $request->input('direccion');
        $profesional->correo = $request->input('correo');
        $profesional->telefono = $request->input('telefono');
        $profesional->celular = $request->input('celular');
        $profesional->cargo = $request->input('cargo');
        $profesional->contrasenia = bcrypt($request->input('pass'));
        $tipoCuenta = $request->input('tipoCuenta');
        if($tipoCuenta == null){
            $profesional->tipoCuenta = false;
        }else{
            $profesional->tipoCuenta = true;
        }
        Session::flash('success', 'Usuario guardado correctamente');
        $profesional->save();
       // return redirect('posts')->with('success','Post Created');
       return redirect('profesionales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profesional = Profesional::find($id);
        if($profesional == null){
            return redirect('profesionales');
        }
        return view('profesional.edit')->with('profesional',$profesional);
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
        $this->validate($request,[
            'rut' => 'required|cl_rut||max:12|unique:profesional,rut,'.$id.',idProfesional',
            'nombre' => 'required|max:45',
            'apellidoPaterno' => 'required|max:45',
            'apellidoMaterno' => 'required|max:45',
            'correo' => 'required|max:45|unique:profesional,correo,'.$id.',idProfesional',
            'telefono' => 'numeric|digits_between:0,15',
            'celular' => 'required|numeric|digits_between:1,15',
        ]);
        $profesional= Profesional::find($id);
        $profesional->rut = $request->input('rut'); 
        $profesional->nombre = $request->input('nombre'); 
        $profesional->apellidoPaterno = $request->input('apellidoPaterno');
        $profesional->apellidoMaterno = $request->input('apellidoMaterno');
        $profesional->direccion = $request->input('direccion');
        $profesional->correo = $request->input('correo');
        $profesional->telefono = $request->input('telefono');
        $profesional->celular = $request->input('celular');
        $profesional->cargo = $request->input('cargo');
        $tipoCuenta = $request->input('tipoCuenta');
        if($tipoCuenta == null){
            $profesional->tipoCuenta = false;
        }else{
            $profesional->tipoCuenta = true;
        }
        $profesional->save();
        Session::flash('success', 'Usuario editado correctamente');
        //return redirect('profesionales')->with('success','Post Updated');
        return redirect('profesionales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profesional = Profesional::find($id);
        $profesional->delete();
        Session::flash('success', 'Usuario eliminado correctamente '. $profesional->nombre);
        //return redirect('posts')->with('success','Post Deleted');
        return redirect('profesionales');
    }

}
