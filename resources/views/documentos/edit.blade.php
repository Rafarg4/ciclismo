@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar documento</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($documento, ['route' => ['documentos.update', $documento->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
  <div class="form-group col-sm-6">
                {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>
<div class="form-group col-sm-6">
              {!! Form::label('archivo_pago', 'Comprobante de pago:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_pago', null, ['class' => 'form-control', 'id' => 'archivo_pago','required']) !!}
            <label class="custom-file-label" for="archivo_pago">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($documento->archivo_pago))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_inscripcion', 'Comprobante de firma de documento:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_inscripcion', null, ['class' => 'form-control', 'id' => 'archivo_inscripcion','required']) !!}
            <label class="custom-file-label" for="archivo_inscripcion">Seleccionar Archivo</label>
            </div>
            </div>
            @if(isset($documento->archivo_inscripcion))
           <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_seguro_medico', 'Firma de seguro medico:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_seguro_medico', null, ['class' => 'form-control', 'id' => 'archivo_seguro_medico','required']) !!}
            <label class="custom-file-label" for="archivo_seguro_medico">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_seguro_medico))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
        <!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_copia_cedula', 'Copia de cedula:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_copia_cedula', null, ['class' => 'form-control', 'id' => 'archivo_copia_cedula','required']) !!}
            <label class="custom-file-label" for="archivo_copia_cedula">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_copia_cedula))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
    <!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_certificado_medico', 'Certificado medico:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_certificado_medico', null, ['class' => 'form-control', 'id' => 'archivo_certificado_medico','required']) !!}
            <label class="custom-file-label" for="archivo_certificado_medico">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_certificado_medico))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
    
            @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-6">
             {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado',array('En espera' => 'En espera', 'Paralizado' => 'Paralizado','Verificado' => 'Verificado'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
            </div>
            @else
             <div class="form-group col-sm-6">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" value="En espera" readonly>
                </div>
            @endif

            
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('documentos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
