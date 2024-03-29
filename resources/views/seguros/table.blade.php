<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Ci</th>
        <th>Nombre y Apellido</th>
        <th>Estado Civil</th>
        <th>Edad</th>
        <th>Usted Es</th>
        <th>Tipo de Plan</th>
        <th>Plan</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->inscripto->ci  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->inscripto->primer_y_segundo_nombre  ?? 'Incripto no asignada' }} {{ $seguro->inscripto->primer_y_segundo_apellido  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->edad }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ number_format($seguro->tipo_tarifa->tarifa ?? 'Tarifa no asignada')}}.Gs</td>
                <td width="120">
                    {!! Form::open(['route' => ['seguros.destroy', $seguro->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seguros.show', [$seguro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <a href="{{ route('seguros.edit', [$seguro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
