@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('inscripcions.index') }}">
                        Volver
                    </a>
                <div class="col-sm-12">
                    <a class="btn btn-default float-right"
                      button type="button" class="btn btn-primary"  onclick="javascript:window.print()">Imprimir</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </section>


      <div class="content px-3">
 <div class="card">
  <div class="card-header">
     <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <i class="fa fas-light fa-book"></i> Detalles de Inscripto</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fas-regular fa-laptop-medical"></i> Detalles de Documento</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">  <i class="fa fas-regular fa-laptop-medical"></i> Detalles de seguro</a>
    <a class="nav-item nav-link" id="nav-seguro-tab" data-toggle="tab" href="#nav-seguro" role="tab" aria-controls="nav-seguro" aria-selected="false">  <i class="fas fa-solid fa-print"></i> Imprimir seguro</a>
    <a class="nav-item nav-link" id="nav-licencia-tab" data-toggle="tab" href="#nav-licencia" role="tab" aria-controls="nav-licencia" aria-selected="false">  <i class="fas fa-id-card"></i> Mi licencia</a>
  </div>
</nav>
  </div>
  <div class="card-body">
    @include('inscripcions.show_fields')
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection
