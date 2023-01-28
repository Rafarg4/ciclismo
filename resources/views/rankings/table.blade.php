<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable({
         "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $('<select><option value="">Selecione</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
    });
});
</script>
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="example">
        <thead>
        <tr>
            <th>Posicion</th>
            <th>Usuario</th>
        <th>Nombre Apellido</th>
        <th>Categoria</th>
        <th>Club</th>
        <th>Sexo</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>Total</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion }}</td>
            <td>{{ $ranking->usuario->name }}</td>
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria->nombre }}</td>
            <td>{{ $ranking->club }}</td>
            <td>{{ $ranking->sexo }}</td>
            <td>{{ $ranking->primer_fecha}}</td>
            <td>{{ $ranking->segundo_fecha }}</td>
            <td>{{ $ranking->tercero_fecha }}</td>
            <td>{{ $ranking->cuarto_fecha }}</td>
            <td>{{ $ranking->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rankings.destroy', $ranking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rankings.show', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rankings.edit', [$ranking->id]) }}"
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
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Nro Expediente</th>
                
            </tr>
        </tfoot>
    </table>
</div>
