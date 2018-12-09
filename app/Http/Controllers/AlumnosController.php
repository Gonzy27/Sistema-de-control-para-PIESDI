<?php

namespace App\Http\Controllers;

use DB;
use App\ConsultaAlumno;
use App\Alumno;
use Illuminate\Http\Request;

use Session;
use Freshwork\ChileanBundle\Rut;
use ValidateRequests;
use PDF;
use Excel;
use Carbon\Carbon;

class AlumnosController extends Controller
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
        $alumnos = Alumno::all();
        return view('alumno.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $arr_alumnos = DB::connection('mysql2')->select('SELECT * FROM alumno_demo');
        return view('alumno.create')->with('arr_alumnos',$arr_alumnos);
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
                'rut' => 'required|cl_rut|max:12|unique:alumno',
                'nombres' => 'required|max:45',
                'apellidos' => 'required|max:45',
                'direccion' => 'required|max:45',
                'correo' => 'required|email|max:45|unique:alumno',
                'celular' => 'required|numeric|digits_between:1,15',
                'carrera' => 'required|max:45',
                'anio_ingreso' => 'required|numeric|digits_between:1,4',
                'situacion' => 'required|max:45',
            ]);
            
            //Create Alumno
            $alumno= new Alumno();
            $alumno->rut = $request->input('rut'); 
            $alumno->nombres = $request->input('nombres'); 
            $alumno->apellidos = $request->input('apellidos');
            $alumno->direccion = $request->input('direccion');
            $alumno->correo = $request->input('correo');
            $alumno->celular = $request->input('celular');
            $alumno->carrera = $request->input('carrera');
            $alumno->anioIngreso= $request->input('anio_ingreso');
            $alumno->situacion = $request->input('situacion');
            Session::flash('success', 'Alumno guardado correctamente');
            $alumno->save();

            return redirect('alumnos');

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
       // $alumnos = DB::connection('mysql2')->select('SELECT * FROM alumno_demo WHERE id_alumno = ?',[$id]);
       if($id != 0){
            $alumno = ConsultaAlumno::find($id);
            $alumno->rut =  Rut::set($alumno->rut)->fix()->format(); //return rut formateado
            $alumno->nombres = ucwords(mb_strtolower($alumno->nombres));
            $alumno->apellidos = ucwords(mb_strtolower($alumno->apellidos));
            return view('alumno.show')->with('alumno',$alumno);
       }else{
            $alumno = New Alumno();
            if($alumno == null){
                return redirect('alumnos');
            }
           return view('alumno.show')->with('alumno',$alumno);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        if($alumno == null){
            return redirect('alumnos');
        }
        return view('alumno.edit')->with('alumno',$alumno);
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
                'rut' => 'required|cl_rut|max:12|unique:alumno,rut,'.$id.',idAlumno',
                'nombres' => 'required|max:45',
                'apellidos' => 'required|max:45',
                'direccion' => 'required|max:45',
                'correo' => 'required|email|max:45|unique:alumno,correo,'.$id.',idAlumno',
                'celular' => 'required|numeric|digits_between:1,15',
                'carrera' => 'required|max:45',
                'anio_ingreso' => 'required|numeric|digits_between:1,4',
                'situacion' => 'required|max:45',
            ]);
               $alumno= Alumno::find($id);
               $alumno->rut = $request->input('rut'); 
               $alumno->nombres = $request->input('nombres'); 
               $alumno->apellidos = $request->input('apellidos');
               $alumno->direccion = $request->input('direccion');
               $alumno->correo = $request->input('correo');
               $alumno->celular = $request->input('celular');
               $alumno->carrera = $request->input('carrera');
               $alumno->anioIngreso= $request->input('anio_ingreso');
               $alumno->situacion = $request->input('situacion');

               Session::flash('success', 'Alumno editado correctamente');
               $alumno->save();  
               //return redirect('profesionales')->with('success','Post Updated');
               return redirect('alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        Session::flash('success', 'Alumno eliminado correctamente');
        return redirect('alumnos');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $alumno = Alumno::find($id);
        if($alumno == null){
            return redirect('alumnos');
        }
        $eventos = $alumno->evento()->get();
        return view('alumno.mostrar', compact('alumno','eventos'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarPDF($id)
    {
        $alumno = Alumno::find($id);
        $eventos = $alumno->evento()->get();
        $pdf = PDF::loadView('alumno.informe.mostrarPdf', ['alumno' => $alumno , 'eventos' => $eventos]);
        return $pdf->download($alumno->nombres.$alumno->apellidos.'Eventos.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarPDFAnual($id)
    {
        $now = Carbon::now();
        $alumno = Alumno::find($id);
        $eventos = $alumno->evento()->whereYear('horaInicio', '=' , $now->year)->get();
        $pdf = PDF::loadView('alumno.informe.mostrarPdfAnual', ['alumno' => $alumno , 'eventos' => $eventos]);
        return $pdf->download($alumno->nombres.$alumno->apellidos.'EventosAnual.pdf');
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
        $eventos = $alumno->evento()->whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();
        $pdf = PDF::loadView('alumno.informe.mostrarPdfFecha', ['alumno' => $alumno , 'eventos' => $eventos, 'request' => $request]);
        return $pdf->download($alumno->nombres.$alumno->apellidos.'Eventos-'.$horaInicio.'A'.$horaFin.'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarExcel($id)
    {
        Excel::create($alumno->nombres.$alumno->apellidos.'EventosAnual', function($excel) use ($id) {

            $excel->sheet('Datos', function($sheet)  use ($id){
                //Header
           
                $alumno = Alumno::find($id);
                $eventos = $alumno->evento()->get();
                $sheet->row(2, ['Rut','Nombres','Apellidos','Dirección','Correo','Celular','Carrera','Año Ingreso','Situación']);
                $sheet->row(3, [$alumno->rut,$alumno->nombres,$alumno->apellidos,$alumno->direccion,$alumno->correo,$alumno->celular, $alumno->carrera, $alumno->anioINgreso, $alumno->situacion]);
                foreach($eventos as $evento){
                    $row  = [];
                    $row[0] = $evento->nombre;
                    $row[1] = $evento->tipo;
                    $row[2] = $evento->lugar;
                    $row[3] = $evento->descripcion;
                    $row[4] = Carbon::parse($evento->horaInicio)->format('d/m/Y h:i');
                    $row[5] =  Carbon::parse($evento->horaFin)->format('d/m/Y h:i');
                    if($evento->pivot->encargado == 0)
                       $row[6] = 'No';
                    else{
                        $row[6] = 'Si';
                    }
                    $data[] = $row;

                }
                if($data =! null){
                    $sheet->fromArray($data,null, 'A4');  
                } 

                $sheet->row(4, ['Nombre','Tipo','Lugar','Descripcion','Hora Inicio','Hora Fin','Encargado']);      
            });
        
        })->export('xls');
        return ''; 
    }
    
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mostrarExcelFecha(Request $request)
    {
        $alumno = Alumno::find($request->id);
        Excel::create($alumno->nombres.$alumno->apellidos.'Eventos-'.$request->datestart2.'A'.$request->dateend2, function($excel) use ($request) {

            $excel->sheet('Datos', function($sheet)  use ($request) {
                //Header
                $horaInicio = Carbon::parse($request->datestart2);
                $horaFin = Carbon::parse($request->dateend2);

                $alumno = Alumno::find($request->id);
                $eventos = $alumno->evento()->whereBetween('horaInicio', array( $horaInicio,  $horaFin))->get();
                $sheet->row(1, ['Eventos','desde',$request->datestart2,'hasta',$request->dateend2]);
                $sheet->row(2, ['Rut','Nombres','Apellidos','Dirección','Correo','Celular','Carrera','Año Ingreso','Situación']);
                $sheet->row(3, [$alumno->rut,$alumno->nombres,$alumno->apellidos,$alumno->direccion,$alumno->correo,$alumno->celular, $alumno->carrera, $alumno->anioINgreso, $alumno->situacion]);
                foreach($eventos as $evento){
                    $row  = [];
                    $row[0] = $evento->nombre;
                    $row[1] = $evento->tipo;
                    $row[2] = $evento->lugar;
                    $row[3] = $evento->descripcion;
                    $row[4] = Carbon::parse($evento->horaInicio)->format('d/m/Y h:i');
                    $row[5] = Carbon::parse($evento->horaFin)->format('d/m/Y h:i');
                    if($evento->pivot->encargado == 0)
                       $row[6] = 'No';
                    else{
                        $row[6] = 'Si';
                    }
                    $data[] = $row;

                }
                if($data =! null){
                    $sheet->fromArray($data,null, 'A5');  
                }

                $sheet->row(5, ['Nombre','Tipo','Lugar','Descripcion','Hora Inicio','Hora Fin','Encargado']);      
            });
        
        })->export('xls');
        return ''; 
    }


    public function listarPDF()
    {
        $now = Carbon::now();
        $alumnos = Alumno::all();
        $pdf = PDF::loadView('alumno.informe.listarPdf', ['alumnos' => $alumnos ])->setPaper('letter', 'landscape');
        return $pdf->download('AlumnosPIESDI-'.Carbon::parse($now)->format('d/m/Y').'.pdf');
    }


    public function listarExcel()
    {
        $now = Carbon::now();
        Excel::create('AlumnosPIESDI-'.Carbon::parse($now)->format('d/m/Y'), function($excel) {

            $excel->sheet('Datos', function($sheet){
                //Header
           
                $alumnos = Alumno::all();

           
                foreach($alumnos as $alumno){
                    $row  = [];
                    $row[0] = $alumno->rut;
                    $row[1] = $alumno->nombres;
                    $row[2] = $alumno->apellidos;
                    $row[3] = $alumno->direccion;
                    $row[4] = $alumno->correo;
                    $row[5] = $alumno->celular;
                    $row[6] = $alumno->carrera;
                    $row[7] = $alumno->anioIngreso;
                    $row[8] = $alumno->situacion;
                    $data[] = $row;

                }
                    if($data != null){
                        $sheet->fromArray($data,null, 'A1'); 
                    } 
                    $sheet->row(1, ['Rut','Nombres','Apellidos','Dirección','Correo','Celular','Carrera','Año Ingreso','Situación']);
                     
            });
        
        })->export('xls');
        return ''; 
    }
}
