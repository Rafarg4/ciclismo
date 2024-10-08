<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
          <meta name="viewport" content="width=device-width, initial-scale=1">  

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css"
          integrity="sha512-EzrsULyNzUc4xnMaqTrB4EpGvudqpetxG/WNjCpG6ZyyAGxeB6OBF9o246+mwx3l/9Cn838iLIcrxpPHTiygAA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css"
          integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- iCheck -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
          integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
          crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
    body{
    background:url("/fondo_pagina.jpeg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover; 
}
.bg-light {
    background-color: #fff !important;
}
</style>
 <title>Ranking</title>
    <link rel="icon" type="image/png" src="/logof.png" />
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
 <div class="card">
  <div class="card-header">
    Detalles de Ranking
    <a class="btn btn-primary float-right"
                       href="{{ url('rankings/consulta') }}">
                        Volver
                    </a>
  </div>
  <div class="card-body">
    <form>
  <div class="row">
    <div class="form-group col-md-3">
        <label>Posicion:</label>  
        <input type="text" class="form-control" placeholder="{{ $rankings->posicion }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Nombre y apellido:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->nombre_apellido }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha uno:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_uno }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha dos:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_dos ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha tres:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_tres ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cuatro:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_cuatro ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cinco:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_cinco ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha seis:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_seis ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha Siete:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_siete ?? 'A competir' }}" disabled>
    </div>
    <div class= "form-group col-md-3">
        <label>Fecha ocho:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_ocho ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha Nueve:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_nueve ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha diez:</label>
        <input type="text" class="form-control" placeholder="{{ $rankings->fecha_dies ?? 'A competir' }}" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Total:</label>
        <input type="text" class="form-control" placeholder="{{ $totales }}" disabled>
    </div>-->
</div>
</form>

            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
