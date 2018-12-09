<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\ParticipanteExterno;

class ParticipanteExternoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantesExterno = ParticipanteExterno::all();
        return view('externo.index')->with('participantesExterno',$participantesExterno);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('externo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|max:45',
            'apellidoPaterno' => 'max:45',
            'apellidoMaterno' => 'max:45',
            'direccion' => 'required|max:45',
            'descripcion' => 'required|max:45',
            'correo' => 'required|max:45|email',
            'telefono' => 'required|numeric|digits_between:1,15',
        ]);
        
        //Create ParticipanteExterno
        $participanteExterno= new ParticipanteExterno();
        $participanteExterno->nombre = $request->input('nombre'); 
        $participanteExterno->apellidoPaterno = $request->input('apellidoPaterno');
        $participanteExterno->apellidoMaterno = $request->input('apellidoMaterno');
        $participanteExterno->direccion = $request->input('direccion');
        $participanteExterno->descripcion = $request->input('descripcion');
        $participanteExterno->correo = $request->input('correo');
        $participanteExterno->telefono = $request->input('telefono');
        $participanteExterno->save();
       // return redirect('posts')->with('success','Post Created');
       return redirect('externos');
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
        $participanteExterno = ParticipanteExterno::find($id);
        if($participanteExterno == null){
            return redirect('externos');
        }
        return view('externo.edit')->with('participanteExterno',$participanteExterno);
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
            'nombre' => 'required|max:50',
            'direccion' => 'required|max:50',
            'descripcion' => 'required|max:50',
            'correo' => 'required|max:50',
            'telefono' => 'required|numeric|digits_between:1,15',
        ]);
        $participanteExterno = ParticipanteExterno::find($id);
        $participanteExterno->nombre = $request->input('nombre'); 
        $participanteExterno->apellidoPaterno = $request->input('apellidoPaterno');
        $participanteExterno->apellidoMaterno = $request->input('apellidoMaterno');
        $participanteExterno->direccion = $request->input('direccion');
        $participanteExterno->descripcion = $request->input('descripcion');
        $participanteExterno->correo = $request->input('correo');
        $participanteExterno->telefono = $request->input('telefono');
        $participanteExterno->save();
       // return redirect('posts')->with('success','Post Created');
       return redirect('externos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participanteExterno = ParticipanteExterno::find($id);
        $participanteExterno->delete();
        return redirect('externos');
    }
}
