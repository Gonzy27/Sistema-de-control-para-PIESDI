<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Evento;
use App\Profesional;
use App\Alumno;
use App\ParticipanteExterno;
use Mail;
use App\Mail\InvitacionMail;
use App\Mail\NoticiaMail;
use Session;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['login','contact','index']]);
    }
    
    public function index(){
        return redirect('/login');
    }

    public function login (){
        return view('auth.login');
    }


    public function contact(){
        $profesionales = Profesional::select(DB::raw("CONCAT(nombre,' ',apellidoPaterno,' (',cargo,')') as fullname, idProfesional"))->get()->pluck('fullname','idProfesional');
        return view('login.contacto', compact('profesionales'));
    }

     /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarInvitacion(Request $request){
        $this->validate($request,[
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);
        $asunto = $request->input('asunto');
        $mensaje = $request->input('mensaje');
        $idEvento = $request->input('idEvento');
        $imagen = '';
        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
        }
        $evento = Evento::find($idEvento);
        $alumnos = $evento->alumno()->get();
        $profesionales = $evento->profesional()->get();
        $externos = $evento->externo()->get();
        foreach($alumnos as $alumno){
            set_time_limit(0);
            Mail::to($alumno->correo)->send(new InvitacionMail($asunto,$mensaje,$imagen));
            set_time_limit(0);
        }
        foreach($profesionales as $profesional){
            set_time_limit(0);
            Mail::to($profesional->correo)->send(new InvitacionMail($asunto,$mensaje,$imagen));
            set_time_limit(0);
        }
        foreach($externos as $externo){
            set_time_limit(0);
            Mail::to($externo->correo)->send(new InvitacionMail($asunto,$mensaje,$imagen));
            set_time_limit(0);
        }
    }

     /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarNoticia(Request $request){
        $this->validate($request,[
            'asunto' => 'required',
            'destinatario' => 'required',
            'mensaje' => 'required',
        ]);
        $asunto = $request->input('asunto');
        $para = $request->input('destinatario');
        $mensaje = $request->input('mensaje');
        $idEvento = $request->input('idEvento');
        $imagenes = '';
        if ($request->hasFile('imagen')){
            $imagenes = $request->file('imagen');
        }
        set_time_limit(0);
        Mail::to($para)->send(new NoticiaMail($asunto,$mensaje,$imagenes));
    }

    public function home(){
        return view('index');
    }


    public function menuEvento(){
        $profesionales = Profesional::all();
        $alumnos = Alumno::all();
        $participantesExterno = ParticipanteExterno::all();
        return view('evento.index', compact('profesionales','alumnos','participantesExterno'));
    }


    public function formularioResetPass()
    {
        return view('profesional.resetpass');
    }


     /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPass(Request $request){
        $this->validate($request,[
            'antiguaContrasenia' => 'required',
            'nuevaContrasenia' => 'required|min:6|max:15',
            'confirmarContrasenia' => 'required|same:antiguaContrasenia',
        ]);
        $passAntigua = $request->input('antiguaContrasenia');
        $passNueva = $request->input('contraseniaAntigua');
        $passRepetir = $request->input('confirmarContrasenia');
        $profesional= Profesional::find($request->input('id'));
        if(!password_verify($passAntigua,$profesional->contrasenia)){
            Session::flash('error', 'La contraseña antigua es incorrecta');
            return redirect('/profesionales/ajuste/reset');
        }
        $profesional->contrasenia = bcrypt($passNueva);
        Session::flash('success', 'Contraseña editada correctamente');
        $profesional->save();
        return redirect('/profesionales/ajuste/reset');
    }

    public function resetPassAjax(Request $request){
        $this->validate($request,[
            'nuevaContrasenia' => 'required|min:6|max:15',
            'confirmarContrasenia' => 'required|same:nuevaContrasenia',
        ]);
        $passRepetir = $request->input('confirmarContrasenia');
        $profesional= Profesional::find($request->input('id'));
        $profesional->contrasenia = bcrypt($passRepetir);
        Session::flash('success', 'Contraseña editada correctamente');
        $profesional->save();
    }

    public function messages()
{
    return [
        'passNueva.min' => 'El campo contraseña nueva debe contener al menos 6 caracteres.',
    ];
}
}
