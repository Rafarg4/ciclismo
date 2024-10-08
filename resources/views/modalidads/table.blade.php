<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modalidads as $modalidad)
            <tr>
                <td>{{ $modalidad->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['modalidads.destroy', $modalidad->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('modalidads.show', [$modalidad->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>-->
                        <a href="{{ route('modalidads.edit', [$modalidad->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
