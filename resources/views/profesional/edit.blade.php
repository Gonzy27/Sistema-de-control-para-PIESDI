@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese actualizados del usuario
                            </h2>
                        </div>
                        <div class="body">
                                <a href="javascript:void(0);" id="enlaceEditarPass" data-toggle="modal" data-target="#editarPass" class="btn btn-success waves-effect">Editar contraseña</A>
                                <br><br> 
                              {!! Form::open(['action' => ['ProfesionalesController@update',$profesional->idProfesional ],'method' => 'POST']) !!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('rut',$profesional->rut,['class' => "form-control",'id' => 'rut'])}}
                                        {{Form::label('rut','Rut', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre',$profesional->nombre,['class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoPaterno',$profesional->apellidoPaterno,['class' => "form-control"])}}
                                        {{Form::label('apellidoPaterno','Apellido Paterno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoMaterno',$profesional->apellidoMaterno,['class' => "form-control"])}}
                                        {{Form::label('apellidoMaterno','Apellido Materno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('direccion',$profesional->direccion,['class' => "form-control"])}}
                                        {{Form::label('direccion','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('correo',$profesional->correo,['class' => "form-control"])}}
                                        {{Form::label('correo','Correo', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('telefono',$profesional->telefono,['class' => "form-control"])}}
                                        {{Form::label('telefono','Telefono', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('celular',$profesional->celular,['class' => "form-control"])}}
                                        {{Form::label('celular','Celular', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('cargo',$profesional->cargo,['class' => "form-control"])}}
                                        {{Form::label('cargo','Cargo', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    @if ($profesional->tipoCuenta == false)
                                        <input type="checkbox" name="tipoCuenta" id="tipoCuenta" check='false'>
                                        <label for="tipoCuenta">¿Es Coordinador?</label>  
                                    @else
                                        <input type="checkbox" name="tipoCuenta" id="tipoCuenta" check='true'>
                                        <label for="tipoCuenta">¿Es Coordinador?</label> 
                                    @endif
                                </div>
                                <br>

                                
                                {{Form::hidden('_method','PUT')}}  
                                {{Form::submit('Editar',['class' => 'btn btn-primary m-t-15 waves-effect profesionalUpdate'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editarPass" tabindex="-1" role="dialog" data-backdrop='static'>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Editar contraseña</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action' => ['PagesController@resetPassAjax'],'method' => 'POST','id' => 'formPass']) !!}
                        {{Form::hidden('id',$profesional->idProfesional)}}
                        <div class="form-group form-float">
                                <div class="form-line">
                                    {{Form::password('nuevaContrasenia',['class' => "form-control"])}}
                                    {{Form::label('nuevaContrasenia','Introduzca la contraseña Nueva', ['class' => "form-label"])}}   
                                </div>
                        </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {{Form::password('confirmarContrasenia',['class' => "form-control"])}}
                                    {{Form::label('confirmarContrasenia','Repita la contraseña', ['class' => "form-label"])}}   
                                </div>
                        </div>
                            {{Form::submit('Guardar',['class' => 'btn btn-primary m-t-15 waves-effect', 'id' => 'updatePass'])}}
                        {!! Form::close() !!}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
@endsection

@section('page-script')
<script>
$(document).ready(function () {
        $('#rut').Rut({           
            format_on: 'keyup'
        });

        $('#updatePass').on('click', function(e){
            var pass = '/profesionales/ajuste/passUpdateAjax';
            csrfToken = document.getElementsByName("_token")[0].value;
            var fd = new FormData(document.getElementById("formPass"));
            e.preventDefault()
            swal({
                title : "Atención",
                text : "¿Desea editar la contraseña a este usuario?",
                type : "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si",
                cancelButtonText: "No",
                showLoaderOnConfirm: true,
                closeOnConfirm: false,
            },
            function(isConfirm){
                if (isConfirm){ 
                    $.ajax({
                        url: pass,
                        data: fd,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        headers: {
                        "X-CSRF-TOKEN": csrfToken
                        },
                        success: function(){
                            swal.close();
                            $.notify({
                                // options
                                message: 'Contraseña cambiada correctamente',
                            },{
                                // settings
                                type: 'success',
                                offset: {
                                    y: 75
                                },
                                z_index: 2000,
                                delay: 3000,
                                placement: {
                                    from: "top",
                                    align: "center"
                                }
                            });
                            $('#editarPass').modal('hide');	
                        },
                        error: function(data){
                            swal.close();
                            var errors = data.responseJSON;
                            console.log(errors);
                            $.each( errors, function( key, value ) {
                                $.notify({
                                    // options
                                    message: value[0],
                                },{
                                    // settings
                                    type: 'danger',
                                    offset: {
                                        y: 45
                                    },
                                    z_index: 2000,
                                    delay: 3000,
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    }
                                });
                            });	
                        }
                    });
                };
            });
        });  

    });
</script>
@endsection


@section('script')
    <script src="{{ asset('js/dialog/profesionales.js')}}"></script>
@endsection