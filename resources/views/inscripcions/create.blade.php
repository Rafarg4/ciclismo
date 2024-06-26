@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear Licencia</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
         <div class="card">
  <div class="card-header">
    ATENCIÓN! Completá correctamente con tus datos ya que los mismos serán utilizados para la Ficha de Inscripción y obtención del Carnet de la Federación Paraguaya de Ciclismo. PASOS A TENER EN CUENTA:
  </div>
  <div class="card-body">
    
      <footer class="blockquote-footer">1 COMPLETAR CORRECTAMENTE TODOS LOS  DATOS</footer>
    </blockquote>
    <footer class="blockquote-footer">2 DESCARGAR PDF
</footer>
    </blockquote>
    <footer class="blockquote-footer">3 IMPRIMIRLO Y FIRMARLO</footer>
    <footer class="blockquote-footer">4 ESCANEAR EL DOCUMENTO FIRMADO Y SUBIR EN APARTADO DE DOCUMENTOS
</footer>
  </div>
</div>
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'inscripcions.store', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">

                <div class="row">
                    @include('inscripcions.fields')
                </div>
<div class="card">
  <div class="card-header">
   <strong>Datos bancarios</strong>
  </div>
  <div class="card-body">
                 @foreach($bancos as $b)
                        <p>Para realizar el pago de la inscripción al evento de ciclismo, puedes optar por transferencia bancaria a la siguiente cuenta:
                        <li>Nombre de la cuenta:<strong> {{$b->nombre_cuenta}}</strong></li> 
                        <li> CI/RUC:<strong> {{$b->ci_ruc}}</strong></li> 
                        <li> Banco:<strong> {{$b->banco}}</strong></li> </p>
                        @endforeach
                </div>
</div>
            </div>

          

            {!! Form::close() !!}

        </div>
    </div>
@endsection
