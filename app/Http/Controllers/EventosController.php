<?php

namespace App\Http\Controllers;
use DB;
use App\Alumno;
use App\Profesional;
use App\ParticipanteExterno;
use App\Evento;
use App\ProfesionalEvento;
use App\AlumnoEvento;
use App\ExternoEvento;
use Session;
use Carbon\Carbon;
use PDF;
use Excel;

use Illuminate\Http\Request;

class EventosController extends Controller
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
        //z
       // return view('evento.index')->with('alumno',$alumno);
       $eventos = Evento::get(['nombre AS title', 'horaInicio AS start', 'horaFin AS end','color','idEvento', 'tipo', 'lugar', 'descripcion']);
       return Response()->json($eventos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tipo' => 'required|max:45',
            'lugar' => 'required|max:45',
            'descripcion' => 'required|max:300',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ]);

        $horaInicio =  Carbon::parse($request->horaInicio);
        $horaFin =  Carbon::parse($request->horaFin);

          //Create Post
        $evento= new Evento();
      
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo;
        $evento->lugar = $request->lugar;
        $evento->descripcion = $request->descripcion;
        $evento->horaInicio = $horaInicio;
        $evento->horaFin = $horaFin;
        $evento->color = $request->color;
        $evento->save();
        $idEvento = $evento->idEvento;
        $participantes = array($request->profesionales);
        $arrayParticipantes = explode( '&', $participantes[0] );
        for($i = 0, $size = count(array_filter($arrayParticipantes)); $i < $size; $i++){
            if(strpos($arrayParticipantes[$i] , 'profesional') !== false){
                $profesionalEvento = new ProfesionalEvento();
                if($arrayParticipantes[$i] == 'profesionalCheckbox=on'){
                    $profesionalEvento->encargado = true;
                    $i++;
                }else{
                    $profesionalEvento->encargado = false;
                }
                $profesionalEvento->idProfesional = ( int ) substr($arrayParticipantes[$i], 14, 14);
                $profesionalEvento->idEvento = $idEvento;
                $profesionalEvento->save();
            }else if(strpos($arrayParticipantes[$i] , 'alumno') !== false){
                $alumnoEvento = new AlumnoEvento();
                if($arrayParticipantes[$i] == 'alumnoCheckbox=on'){
                    $alumnoEvento->encargado = true;
                    $i++;
                }else{
                    $alumnoEvento->encargado = false;
                }
                $alumnoEvento->idAlumno = ( int ) substr($arrayParticipantes[$i], 9, 9);
                $alumnoEvento->idEvento = $idEvento;
                $alumnoEvento->save();
            }else{
                $externoEvento = new ExternoEvento();
                if($arrayParticipantes[$i] == 'participanteExternoCheckbox=on'){
                    $externoEvento->encargado = true;
                    $i++;
                }else{
                    $externoEvento->encargado = false;
                }
                $externoEvento->idParticipanteExterno = ( int ) substr($arrayParticipantes[$i], 22, 22);
                $externoEvento->idEvento = $idEvento;
                $externoEvento->save();
            }
        }
         // return redirect('posts')->with('success','Post Created');
         //Session::flash('success', 'Evento creado correctamente');
         //return redirect('evento');
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
        if($request->nombre != null){
            $this->validate($request,[
                'nombre' => 'required|max:45',
                'tipo' => 'required|max:45',
                'lugar' => 'required|max:45',
                'descripcion' => 'required|max:300',
                'horaInicio' => 'required',
                'horaFin' => 'required',
            ]);
            $nombre = $request->nombre;
            $tipo = $request->tipo;
            $lugar = $request->lugar;
            $descripcion = $request->descripcion;
            $horaInicio =  Carbon::parse($request->horaInicio);
            $horaFin =  Carbon::parse($request->horaFin);
            
            $evento = Evento::find($id);
    
            $evento->nombre = $nombre;  

            $evento->tipo = $tipo; 
            $evento->lugar = $lugar;
            $evento->descripcion = $descripcion;
            $evento->horaInicio = $horaInicio;
            $evento->horaFin = $horaFin;
            $evento->color = $request->color;
            $evento->save();
            $alumnos = $request->alumnos;
            $profesionales = $request->profesionales;
            $externos = $request->externos;
            $arrayAlumnos = explode( '&', $alumnos );
            $arrayProfesionales = explode( '&', $profesionales );
            $arrayExternos = explode( '&', $externos );
            $encargado = false;
            for($i = 0, $size = count(array_filter($arrayAlumnos)); $i < $size; $i++){
                if($arrayAlumnos[$i] == 'alumnoEditCheckbox=on'){
                    $encargado = true;
                    $i++;
                }else{
                    $encargado = false;
                }
                $idAlumno = ( int ) substr($arrayAlumnos[$i], 13, 13);
                $alumnoEvento = AlumnoEvento::where([['idEvento',$id],['idAlumno',$idAlumno]])->first();
                $alumnoEvento->encargado = $encargado; 
                $alumnoEvento->save();
                    
            }

            for($i = 0, $size = count(array_filter($arrayProfesionales)); $i < $size; $i++){
                if($arrayProfesionales[$i] == 'profesionalEditCheckbox=on'){
                    $encargado = true;
                    $i++;
                }else{
                    $encargado = false;
                }
                $idProfesional = ( int ) substr($arrayProfesionales[$i], 18, 18);
                $profesionalEvento = ProfesionalEvento::where([['idEvento',$id],['idProfesional',$idProfesional]])->first();
                $profesionalEvento->encargado = $encargado;
                $profesionalEvento->save();
            }
                
            for($i = 0, $size = count(array_filter($arrayExternos)); $i < $size; $i++){   
                    if($arrayExternos[$i] == 'externoEditCheckbox=on'){
                        $encargado = true;
                        $i++;
                    }else{
                        $encargado = false;
                    }
                    $idParticipanteExterno = ( int ) substr($arrayExternos[$i], 26, 26);
                    $externoEvento = ExternoEvento::where([['idEvento',$id],['idParticipanteExterno',$idParticipanteExterno]])->first();
                    $externoEvento->encargado = $encargado;
                    $externoEvento->save();
                }
        }else{
            $horaInicio = $request->horaInicio;
            $horaFin = $request->horaFin;
            
            $evento = Evento::find($id);

            $evento->horaInicio = $horaInicio;
            $evento->horaFin = $horaFin;
            $evento->save();
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
        $evento = Evento::find($id);
        $evento->delete();
        
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
       $eventos = Evento::all();
       return view('evento.listar')->with('eventos',$eventos); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mostrarPDFFecha(Request $request)
    {
        $now = Carbon::now();
        $horaInicio = Carbon::parse($request->datestart);
        $horaFin = Carbon::parse($request->dateend);

        $alumno = Alumno::find($request->id);
        $eventos = Evento::whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();
        $pdf = PDF::loadView('evento.informe.eventoPdf', ['eventos' => $eventos, 'request' => $request]);
        return $pdf->download('Eventos-'.$request->datestart.'A'.$request->dateend.'.pdf');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mostrarExcelFecha(Request $request)
    {
        Excel::create('Eventos-'.$request->datestart2.'A'.$request->dateend2, function($excel) use ($request) {

            $excel->sheet('Datos', function($sheet)  use ($request) {
                //Header
                $horaInicio = Carbon::parse($request->datestart2);
                $horaFin = Carbon::parse($request->dateend2);

                $eventos = Evento::whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();

               
                foreach($eventos as $evento){
                    $row  = [];
                    $row[0] = $evento->nombre;
                    $row[1] = $evento->tipo;
                    $row[2] = $evento->lugar;
                    $row[3] = $evento->descripcion;
                    $row[4] = Carbon::parse($evento->horaInicio)->format('d/m/Y h:i');
                    $row[5] = Carbon::parse($evento->horaFin)->format('d/m/Y h:i');

                    $data[] = $row;

                }
                
                if($data != null){
                    $sheet->fromArray($data,null, 'A2'); 
                } 
                    $sheet->row(1, ['Eventos','desde',$request->datestart2,'hasta',$request->dateend2]);
                    $sheet->row(2, ['Nombre','Tipo','Lugar','Descripción','Fecha Inicio','Fecha Fin']);
            });
        
        })->export('xls');
        return ''; 
    }
}
