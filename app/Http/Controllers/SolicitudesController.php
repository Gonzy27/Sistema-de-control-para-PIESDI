<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Evento;
use App\Profesional;
use App\Solicitud;
use Mail;
use Session;
use App\Mail\SolicitudMail;
use Auth;
use Carbon\Carbon;
use PDF;
use Excel;

class SolicitudesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitud::where('idProfesional', Auth::user()->idProfesional)->get()->sortByDesc("fecha");
        return view('solicitud.index')->with('solicitudes',$solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'nombre' => 'required|max:45',
            'cargo' => 'required|max:45',
            'correo' => 'required|max:45|email',
            'destinatario' => 'required|max:45',
            'mensaje' => 'required|max:500',
        ]);
        $solicitud= new Solicitud();
        $solicitud->asunto = $request->input('asunto'); 
        $solicitud->nombreEmisor = $request->input('nombre'); 
        $solicitud->cargoEmisor = $request->input('cargo');
        $solicitud->correoEmisor = $request->input('correo');
        $profesional = Profesional::find($request->input('destinatario'));
        $correo = $profesional->correo;
        $solicitud->correoDestinatario = $correo;
        $solicitud->mensaje =  $request->input('mensaje');
        $solicitud->estado = false;
        $solicitud->idProfesional = $request->input('destinatario');
        $solicitud->fecha = Carbon::now();
        $solicitud->save();

        Mail::to($solicitud->correoDestinatario)->send(new SolicitudMail($solicitud,'Solicitud: ','Mensaje de la solicitud'));
        set_time_limit(0);
        Mail::to($solicitud->correoEmisor)->send(new SolicitudMail($solicitud,'Copia de la Solicitud Enviada: ','Copia del Mensaje de la solicitud'));
        set_time_limit(0);
        $profesionales = Profesional::select(DB::raw("CONCAT(nombre,' ',apellidoPaterno,' (',cargo,')') as fullname, idProfesional"))->get()->pluck('fullname','idProfesional');
        //Guardar otro por cada coordinador
        if($profesional->tipoCuenta == 0){
            $coordinadores = Profesional::where('tipoCuenta',1)->get();
            foreach($coordinadores as $coordinador){
                 set_time_limit(0);
                 Mail::to($coordinador->correo)->send(new SolicitudMail($solicitud,'Copia de la Solicitud Enviada: ','Copia del Mensaje de la solicitud'));
                 $solicitud->asunto = 'Copia de Solicutud: '.$request->input('asunto'); 
                 $solicitud= new Solicitud();
                 $solicitud->asunto = $request->input('asunto'); 
                 $solicitud->nombreEmisor = $request->input('nombre'); 
                 $solicitud->cargoEmisor = $request->input('cargo');
                 $solicitud->correoEmisor = $request->input('correo');
                 $solicitud->correoDestinatario = $correo;
                 $solicitud->mensaje =  $request->input('mensaje');
                 $solicitud->estado = false;
                 $solicitud->fecha = Carbon::now();
                 $solicitud->idProfesional = $coordinador->idProfesional;
                 $solicitud->save();
                 set_time_limit(0);
            }
        }
        Session::flash('success', 'Solicitud enviada correctamente');
        return redirect('contacto')->with('profesionales',$profesionales);
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
        $solicitud = Solicitud::find($id);
        return view('solicitud.edit')->with('solicitud',$solicitud);
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
        $solicitud= Solicitud::find($id);
        $estado = $request->estado;
        if($estado == null){
            $solicitud->estado = false;
        }else{
            $solicitud->estado = true;
        }
        $solicitud->save();
        Session::flash('success', 'Solicitud actualizada');
        return redirect('solicitudes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->delete();
        //return redirect('posts')->with('success','Post Deleted');
        return redirect('solicitudes');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listarPDF(Request $request)
    {
        $now = Carbon::now();
        $horaInicio = Carbon::parse($request->datestart);
        $horaFin = Carbon::parse($request->dateend);
        $solicitudes = Solicitud::where('idProfesional', Auth::user()->idProfesional)->whereBetween('fecha', array( $horaInicio,  $horaFin))->get();
        //$solicitudes = DB::table('solicitud')->where('idProfesional', Auth::user()->idProfesional)->whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();
        set_time_limit(0);
        $pdf = PDF::loadView('solicitud.informe.solicitud', ['solicitudes' => $solicitudes ]);
        set_time_limit(0);
        return $pdf->download('Solicitudes-'.$request->datestart.'A'.$request->dateend.'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listarExcel(Request $request)
    {
        $now = Carbon::now();
        Excel::create('Solicitudes-'.$request->datestart2.'A'.$request->dateend2, function($excel) use ($request) {

            $excel->sheet('Datos', function($sheet) use ($request){
                //Header
           
                $horaInicio = Carbon::parse($request->datestart2);
                $horaFin = Carbon::parse($request->dateend2);
                $solicitudes = Solicitud::where('idProfesional', Auth::user()->idProfesional)->whereBetween('fecha', array( $horaInicio,  $horaFin))->get();
                //$solicitudes = DB::table('solicitud')->where('idProfesional', Auth::user()->idProfesional)->whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();
                set_time_limit(0);
                foreach($solicitudes as $solicitud){
                    $row  = [];
                    $row[0] = $solicitud->asunto;
                    $row[1] = $solicitud->nombreEmisor;
                    $row[2] = $solicitud->cargoEmisor;
                    $row[3] = $solicitud->correoEmisor;
                    $row[4] = $solicitud->correoDestinatario;
                    $row[5] = $solicitud->mensaje;
                    $row[6] = Carbon::parse($solicitud->fecha)->format('d/m/Y h:i');
                    $data[] = $row;

                }
                    if($data != null){
                        $sheet->fromArray($data,null, 'A1'); 
                    } 
                    $sheet->row(1, ['Asunto','Nombre Emisor','Cargo Emisor','Correo Emisor','Correo Destino','Mensaje','Fecha']);
                     
            });
        
        })->export('xls');
        return ''; 
    }
}