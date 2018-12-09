<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NoticiaMail;
use App\Noticia;
use DB;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all()->sortByDesc("fecha");
        return view('noticia.index')->with('noticias',$noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate($request,[
            'asunto' => 'required|max:45',
            'introduccion' => 'required|max:100',
            'destinatario' => 'required|email|max:45',
            'mensaje' => 'required|max:500',
        ]);
        $noticia= new Noticia();
        $asunto = $request->input('asunto');
        $para = $request->input('destinatario');
        $mensaje = $request->input('mensaje');
        $introduccion = $request->input('introduccion');
        $idEvento = $request->input('idEvento');
        $imagenes = '';
        $noticia->asunto = $asunto;
        $noticia->para = $para;
        $noticia->introduccion = $introduccion; 
        $noticia->descripcion = $mensaje;
        $noticia->fecha = Carbon::now();
        $noticia->save();
        if ($request->hasFile('imagen')){
            $imagenes = $request->file('imagen');
        }
        set_time_limit(0);
        Mail::to($para)->send(new NoticiaMail($asunto,$mensaje,$imagenes));
        set_time_limit(0);
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
            'asunto' => 'required|max:45',
            'introduccion' => 'required|max:100',
            'destinatario' => 'required|email|max:45',
            'mensaje' => 'required|max:500',
        ]);
        $noticia= new Noticia();
        $asunto = $request->input('asunto');
        $introduccion = $request->input('introduccion');
        $para = $request->input('destinatario');
        $mensaje = $request->input('mensaje');
        $idEvento = $request->input('idEvento');
        $imagenes = '';
        $noticia->asunto = $asunto;
        $noticia->para = $para;
        $noticia->introduccion = $introduccion; 
        $noticia->descripcion = $mensaje;
        $noticia->fecha = Carbon::now();
        $noticia->idEvento = $idEvento;
        if ($request->hasFile('imagen')){
            $imagenes = $request->file('imagen');
        }
        set_time_limit(0);
        Mail::to($para)->send(new NoticiaMail($asunto,$introduccion,$mensaje,$imagenes));
        set_time_limit(0);
        $noticia->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        //return redirect('posts')->with('success','Post Deleted');
        return redirect('noticias');
    }
}
