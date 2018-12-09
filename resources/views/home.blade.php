@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                            Inicio de Sesión
                    </div>
                    <div class="body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido {{ Auth::user()->nombre}}!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection