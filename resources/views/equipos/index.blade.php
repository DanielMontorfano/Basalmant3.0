 @extends('adminlte::page') 

@section('title', 'Equipos')

@section('css')
<style>
    .custom-search-button {
        padding: 5px 10px;
        margin-left: 10px;
        background-color: rgb(86, 103, 86);
        color: rgb(214, 239, 224);
        border: none;
        border-radius: 8px;
    }

    .custom-search-button:hover {
        background-color: rgb(73, 133, 73);
    }

    .custom-search-button:active {
        background-color: rgb(60, 80, 60);
    }
</style>
@endsection

@section('content_header')
<h6 style="text-align:center; font-size: 30px; background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Listado de todos los equipos</h6>
@stop

@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007);">
    <div class="card-body" style="max-width: 95%;">
        <div class="text-white card-body" style="max-width: 95%;">
            <p><a class="text-white" href={{route('equipos.create')}}> Crear equipo</a></p>
            <table id="listado" class="table table-striped table-success table-hover border-4">
                <thead class="table-dark">
                    <tr>
                        <td>Equipo</td>
                        <td>Modelo</td>
                        <td>Detalle</td>
                        <td></td>
                        <td></td>
                        <td></td> <!-- Nueva columna para el botón de eliminar -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                    <tr style="text-align: left; color: #090a0a; font-family: 'Times New Roman'; font-size: 14px;">
                        <td style="font-weight: bold; text-align: left; color: #090a0a; font-family: 'Times New Roman'; font-size: 14px;">{{$equipo->codEquipo }}</td>
                        <td>{{$equipo->Modelo}}</td>
                        <td>{{$equipo->det5}}</td>
                        <td style="color: #ffffff; font-family: 'Times New Roman'; font-size: 14px;">
                            <a class="bi bi-pencil-fill" href="{{route('equipos.edit', $equipo->id)}}"></a>
                        </td>
                        <td>
                            <a class="bi bi-eye" href="{{route('equipos.show', $equipo->id)}}"></a>
                        </td>
                        @if($role === 'admin')
                        <td>
                            <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este equipo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i> <!-- Ícono de tacho de basura -->
                                </button>
                            </form>
                        </td>
                        
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <x-notification-panel :avisos="$avisos" :expanded="false" :usuario="$usuario" />
        @include('layouts.partials.menuListados')
    </div>
</div>

<div class="container">
    @include('layouts.partials.footer')
</div>
@endsection

@section('js')
<script>
    function togglePanel() {
        const panel = document.getElementById('notificationPanel');
        const expanded = panel.getAttribute('data-expanded') === 'true';
        panel.classList.toggle('expanded', !expanded);
        panel.setAttribute('data-expanded', !expanded ? 'true' : 'false');
    }
</script>
@stop
