<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Alumno;
use App\Profesional;
use App\ParticipanteExterno;
use App\Evento;
use App\ProfesionalEvento;
use App\AlumnoEvento;
use App\ExternoEvento;

class TablesEditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Obtener participantes existentes en el evento
    public function getParticipanteAlumno(){
        $idEvento = $_GET['id'];
        $alumnos = Evento::find($idEvento);
        return Response()->json(['data'=>$alumnos->alumno()->get()]); 
    }

    public function getParticipanteProfesional(){
        $idEvento = $_GET['id'];
        $profesionales = Evento::find($idEvento);
        return Response()->json(['data'=>$profesionales->profesional()->get()]); 
    }

    public function getParticipanteExterno(){
        $idEvento = $_GET['id'];
        $externos = Evento::find($idEvento);
        return Response()->json(['data'=>$externos->externo()->get()]); 
    }

    //Obtener posibles participantes que se desean agregar a un evento ya creado
    public function getNuevosAlumnos(){
        $idEvento = $_GET['id'];
        $alumnos = DB::select('SELECT * FROM alumno WHERE alumno.idAlumno NOT IN (SELECT alumno.idAlumno FROM alumno JOIN alumnoevento ON alumno.idAlumno = alumnoevento.idAlumno WHERE alumnoevento.idEvento = '.$idEvento.')');
        return Response()->json(['data'=>$alumnos]);
    }

    public function getNuevosProfesionales(){
        $idEvento = $_GET['id'];
        $profesionales = DB::select('SELECT * FROM profesional WHERE profesional.idProfesional NOT IN (SELECT profesional.idProfesional FROM profesional JOIN profesionalevento ON profesional.idProfesional = profesionalevento.idProfesional WHERE profesionalevento.idEvento = '.$idEvento.')');
        return Response()->json(['data'=>$profesionales]);
    }

    public function getNuevosExternos(){
        $idEvento = $_GET['id'];
        $externos = DB::select('SELECT * FROM participanteexterno WHERE participanteexterno.idParticipanteExterno NOT IN (SELECT participanteexterno.idParticipanteExterno FROM participanteexterno JOIN externoevento ON participanteexterno.idParticipanteExterno = externoevento.idParticipanteExterno WHERE externoevento.idEvento = '.$idEvento.')');
        return Response()->json(['data'=>$externos]);
    }

     //Eliminar participantes que se desean eliminar del evento a editar
     public function deleteAlumnoFromEvento(){
        $idEvento = $_POST['idEvento'];
        $alumnoId = $_POST['data'];
        $alumno = AlumnoEvento::where([['idEvento',$idEvento],['idAlumno',$alumnoId]])->first();
        $alumno->delete();
    }

    public function deleteProfesionalFromEvento(){
        $idEvento = $_POST['idEvento'];
        $profesionalId = $_POST['data'];
        $profesional = ProfesionalEvento::where([['idEvento',$idEvento],['idProfesional',$profesionalId]])->first();
        $profesional->delete();
    }

    public function deleteExternoFromEvento(){
        $idEvento = $_POST['idEvento'];
        $externoId = $_POST['data'];
        $externo = ExternoEvento::where([['idEvento',$idEvento],['idParticipanteExterno',$externoId]])->first();
        $externo->delete();
    }

    //Agrega los nuevos participantes al evento
    public function addNuevosParticipantes(){
        $idEvento = $_POST['idEvento'];
        $participantesAdd = $_POST['data'];
        $arrayParticipantes = explode( '&', $participantesAdd );
        for($i = 0, $size = count($arrayParticipantes); $i < $size; $i++){
            if(strpos($arrayParticipantes[$i] , 'profesional') !== false){
                $profesionalEvento = new ProfesionalEvento();
                if($arrayParticipantes[$i] == 'profesionalAddCheckbox=on'){
                    $profesionalEvento->encargado = true;
                    $i++;
                }else{
                    $profesionalEvento->encargado = false;
                }
                $profesionalEvento->idProfesional = ( int ) substr($arrayParticipantes[$i], 17, 17);
                $profesionalEvento->idEvento = $idEvento;
                $profesionalEvento->save();
            }else if(strpos($arrayParticipantes[$i] , 'alumno') !== false){
                $alumnoEvento = new AlumnoEvento();
                if($arrayParticipantes[$i] == 'alumnoAddCheckbox=on'){
                    $alumnoEvento->encargado = true;
                    $i++;
                }else{
                    $alumnoEvento->encargado = false;
                }
                $alumnoEvento->idAlumno = ( int ) substr($arrayParticipantes[$i], 12, 12);
                $alumnoEvento->idEvento =( int ) $idEvento;
                $alumnoEvento->save();
            }else{
                $externoEvento = new ExternoEvento();
                if($arrayParticipantes[$i] == 'participanteExternoAddCheckbox=on'){
                    $externoEvento->encargado = true;
                    $i++;
                }else{
                    $externoEvento->encargado = false;
                }
                $externoEvento->idParticipanteExterno = ( int ) substr($arrayParticipantes[$i], 25, 25);
                $externoEvento->idEvento = $idEvento;
                $externoEvento->save();
            }
        }
    }
}
