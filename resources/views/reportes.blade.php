@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte</h1>
                </div>
            </div>
        </div>
    </section>
 <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
            <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Fechanac</th>
        <th>Ci</th>
        <th>Sexo</th>
        <th>Grupo Sanguineo</th>
        <th>Nacionalidad</th>
        <th>Celular</th>
        <th>Domiciolio</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Categoria</th>
        <th>Nombre Equipo</th>
        <th>Contacto Emergencia</th>
        <th>Nombre Apellido Contacto Emergencia</th>

        </tr>
        </thead>
        <tbody>
        @foreach($reporte as $inscripcion)
            <tr>
                <td>{{ $inscripcion->primer_nombre }}</td>
            <td>{{ $inscripcion->segundo_nombre }}</td>
            <td>{{ $inscripcion->fechanac }}</td>
            <td>{{ $inscripcion->ci }}</td>
            <td>{{ $inscripcion->sexo }}</td>
            <td>{{ $inscripcion->grupo_sanguineo }}</td>
            <td>{{ $inscripcion->nacionalidad }}</td>
            <td>{{ $inscripcion->celular }}</td>
            <td>{{ $inscripcion->domiciolio }}</td>
            <td>{{ $inscripcion->departamento }}</td>
            <td>{{ $inscripcion->ciudad }}</td>
            <td>{{ $inscripcion->categoria->nombre }}</td>
            <td>{{ $inscripcion->nombre_equipo }}</td>
            <td>{{ $inscripcion->contacto_emergencia }}</td>
            <td>{{ $inscripcion->nombre_apellido_contacto_emergencia }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection