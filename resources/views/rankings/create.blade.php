@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Ranking</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card"> 

            {!! Form::open(['route' => 'rankings.store','enctype' => 'multipart/form-data']) !!}
            <div class="card-body">

                    @include('rankings.fields')
                </div>

            </div>

            <div class="card-footer">
                <input type="file" name="import_file">
  <button class="btn btn-primary" type="submit">Importar</button>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('rankings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
