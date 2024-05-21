@extends('adminlte::page')

@section('title', 'Alarmas')

@section('css')
<style>
  .custom-search-button {
    padding: 5px 10px;
    margin-left: 10px;
    background-color: rgb(14, 47, 148);
    color: rgb(214, 239, 224);
    border: none;
    border-radius: 8px;
  }

  .custom-search-button:hover {
    background-color: rgb(42, 100, 162);
  }

  .custom-search-button:active {
    background-color: rgb(4, 18, 40);
  }

  /* Estilo para las filas de la tabla con fondo degradado */
  .table-striped tbody tr {
    background: linear-gradient(to right, #01181f, #0072ff, #000000);
    color: #ffffff; /* Color del texto */
  }

  /* Estilo para el encabezado de la tabla */
  .table-dark {
    background-color: #000000 !important; /* Color negro para el encabezado */
    color: #ffffff !important; /* Color del texto del encabezado */
  }

  /* Estilo para el modal */
  .modal-content {
    background: -webkit-linear-gradient(rgb(1, 50, 162), rgb(9, 17, 35)); /* Fondo del modal */
    color: #ffffff; /* Color del texto del modal */
  }

  .modal-header {
    background-color: #333333; /* Fondo del encabezado del modal */
    color: #ffffff; /* Color del texto del encabezado del modal */
  }

  .modal-footer .btn-secondary {
    background-color: #555555; /* Fondo del botón Cerrar */
    color: #ffffff; /* Color del texto del botón */
  }

  .modal-footer .btn-secondary:hover {
    background-color: #777777; /* Fondo del botón Cerrar al pasar el ratón */
  }
</style>
<!-- Incluir CSS de jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content_header')
<h6 style="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Alarmas de O.d.T</h6>
@stop

@section('content')
{{-- Contenedor principal de la tarjeta --}}
<div class="card border-primary" style="background: linear-gradient(to left,#0f1b58,#030007);">
    <div class="card-body" style="max-width: 100%;">
        <div class="text-white card-body" style="max-width: 100%;">
            <p>
                <a class="text-white" href="{{ route('equipos.create') }}">Crear equipo</a>
            </p>

            {{-- Tabla de alarmas --}}
            <table id="listado" class="table table-primary table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Orden de Trabajo</th>
                        <th>Asignado A</th>
                        <th>Solicitante</th>
                        <th>Prioridad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alarmas as $alarma)
                    <tr class="priority-{{ strtolower($alarma->prioridad) }}">
                        <td>O.d.T-{{ $alarma->orden_trabajo_id }}</td>
                        <td>{{ $alarma->asignadoA }}</td>
                        <td>{{ $alarma->solicitante }}</td>
                        <td>{{ $alarma->prioridad }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetalle{{ $alarma->orden_trabajo_id }}">Detalles</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modalDetalle{{ $alarma->orden_trabajo_id }}" tabindex="-1" role="dialog" aria-labelledby="modalDetalleLabel{{ $alarma->orden_trabajo_id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetalleLabel{{ $alarma->orden_trabajo_id }}">Detalles de la Alarma</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Orden de Trabajo ID:</strong> O.d.T-{{ $alarma->orden_trabajo_id }}</p>
                                    <p><strong>Asignado A:</strong> {{ $alarma->asignadoA }}</p>
                                    <p><strong>Solicitante:</strong> {{ $alarma->solicitante }}</p>
                                    <p><strong>Prioridad:</strong> {{ $alarma->prioridad }}</p>
                                    <p><strong>Fecha de Creación:</strong> {{ $alarma->created_at }}</p>
                                    <p><strong>Trabajo no realizado:</strong> {{ $alarma->ordenTrabajo->det1 ?? 'N/A' }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Inclusión del menú de listados --}}
<div class="container">
    @include('layouts.partials.menuListados')
</div>

{{-- Inclusión del pie de página --}}
<div class="container">
    @include('layouts.partials.footer')
</div>
@endsection

@section('js')
<!-- Incluir JS de jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(document).ready(function() {
    var datatable;

    if ($.fn.DataTable.isDataTable('#listado')) {
      datatable = $('#listado').DataTable();
    } else {
      datatable = $('#listado').DataTable({
        // Configuración de DataTable
      });
    }

    // Obtener el nombre del usuario autenticado desde Blade
    var usuario = @json($usuario->name);

    // Agregar botón de filtrado
    var searchButton = $('<button/>', {
      text: 'Buscar por Usuario',
      title: 'Buscar alarmas asignadas al usuario',
      class: 'custom-search-button', // Agregamos una clase personalizada
      click: function() {
        var searchInput = $('.dataTables_filter input');
        searchInput.val(usuario).trigger('keyup');
      }
    });

    $('.dataTables_filter').append(searchButton);

    // Hacer los modales arrastrables
    $('.modal-dialog').draggable({
      handle: ".modal-header"
    });
  });

  /* var logoUrl = '{{ asset('dataprint/LogoIngenio2.png') }}';
  var titulo ='Listado de todos los equipos';
  var url = "{{route('imprimirListado','equipos')}}" */
</script>
@endsection

