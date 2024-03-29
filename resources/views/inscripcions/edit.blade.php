@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Licencia</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($inscripcion, ['route' => ['inscripcions.update', $inscripcion->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style type="text/css">
 
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>

<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Paso 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Paso 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Paso 3</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
            <div class="col-md-12">
                <h3> Datos personales</h3>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_nombre', 'Primer y segundo nombre:') !!}
                    {!! Form::text('primer_y_segundo_nombre', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_apellido', 'Primer y segundo apellido:') !!}
                    {!! Form::text('primer_y_segundo_apellido', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('fechanac', 'Fecha de nacimiento n:') !!}
                    {!! Form::date('fechanac', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('ci', 'CI:') !!}
                    {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class=" form-group col-sm-12">
                {!! Form::label('sexo', 'Sexo:') !!}
                {!! Form::select('sexo',array('Masculino' => 'Masculino', 'Femenino' => 'Femenino','Otro' => 'Otro'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('grupo_sanguineo', 'Grupo Sanguineo:') !!}
                    {!! Form::text('grupo_sanguineo', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Nacionalidad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                    {!! Form::text('nacionalidad', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Celular Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('celular', 'Celular:') !!}
                    {!! Form::number('celular', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Email Field -->
                 <div class="form-group col-sm-12">
                    {!! Form::label('email', 'email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Domiciolio Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('domiciolio', 'Domicilio:') !!}
                    {!! Form::text('domiciolio', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Ciudad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('ciudad', 'Ciudad:') !!}
                    {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group col-sm-12">
                    {!! Form::label('departamento', 'Departamento:') !!}
                    {!! Form::text('departamento', null, ['class' => 'form-control']) !!}
                </div>

                <button class="btn btn-primary nextBtn  pull-right" type="button" >Siguiente</button>
            </div>
        </div>
    <div class="row setup-content" id="step-2">
            <div class="col-md-12">
                <h3>Datos de cliclista</h3>
                            <!-- Id Categoria Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('tipo_categoria', 'Categoria:') !!}
                {!! Form::select('tipo_categoria',array('Principal' => 'Principal', 'Master' => 'Master','Ciclismo para todos' => 'Ciclismo para todos'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>

            <div class="form-group col-sm-12" id="id_categoria" style="display: none;">
                
            </div>
            <div class="form-group col-sm-12" id="id_categoria2" style="display: none;">
                
            </div>
            <div class="form-group col-sm-12" id="id_categoria3" style="display: none;">
                
            </div>

<script type="text/javascript">
const tipo_categoria = document.querySelector("#tipo_categoria");
const input1 = document.querySelector("[id=id_categoria]");
const input2 = document.querySelector("[id=id_categoria2]");
const input3 = document.querySelector("[id=id_categoria3]");

tipo_categoria.addEventListener("change", changeTipo);

function changeTipo(){

    if (tipo_categoria.value === "Principal") {
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'initial';
        input2.style.display = 'none';
        input3.style.display = 'none';*/
    } else if(tipo_categoria.value === "Master") {
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria2, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria2"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'none';
        input3.style.display = 'none';
        input2.style.display = 'initial';*/
    } else if (tipo_categoria.value === "Ciclismo para todos"){
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria3, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria3"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'none';
        input2.style.display = 'none';
        input3.style.display = 'initial';*/
    }
}
</script>

            <div class="form-group col-sm-12">
                    {!! Form::label('region', 'Elegir a que región pertenece:') !!}
                     {!! Form::select('region',array('Asosiacion metropolitana de ciclismo' => 'Asosiacion metropolitana de ciclismo', 'Federacion paranaense de ciclismo' => 'Federacion paranaense de ciclismo','Union Regional de ciclistas (URCI)' => 'Union Regional de ciclistas (URCI)','Federacion de ciclismo Itapuense' => 'Federacion de ciclismo Itapuense'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>
            <!-- Nombre Equipo Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_equipo', 'Nombre Equipo:') !!}
                {!! Form::text('nombre_equipo', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('contacto_emergencia', 'Contacto Emergencia:') !!}
                {!! Form::number('contacto_emergencia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nombre Apellido Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_apellido_contacto_emergencia', 'Nombre Apellido Contacto Emergencia:') !!}
                {!! Form::text('nombre_apellido_contacto_emergencia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Imagen Field -->
            <div class="form-group col-sm-12">
              {!! Form::label('foto', 'Foto:') !!}
            <div class="input-group">
            <div class="custom-file">
           <input type="file" id="foto" name="foto">
            <label class="custom-file-label" for="foto">Seleccionar Archivo</label>
            </div>
        </div>
         @if(isset($inscripcion->foto))
            <img src="{{ asset('storage/uploads/' . $inscripcion->foto) }}" width="100" height="100" class="img-circle">
            @endif
    </div>
                <button class="btn btn-primary nextBtn  pull-right" type="button" >Siguiente</button>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
            <div class="col-md-12">
                <h3> Ultimo paso, confirmar datos ingresados</h3>
                @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
            @endcan
            @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-12">
             {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado',array('En espera' => 'En espera', 'Paralizado' => 'Paralizado','Verificado' => 'Verificado','Vencido' => 'Vencido'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
            </div>
            @else
             <div class="form-group col-sm-12">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" value="En espera" readonly>
                </div>
            @endif
                <button class="btn btn-success  pull-right" type="submit">Confirmar!</button>
                
            </div>

        </div>
    
</form>
</div>

<script type="text/javascript">
 $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>














                </div>
            </div>

            <div class="card-footer">
                
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
