
{{-- @extends('layouts.plantillaLTE') --}}

@extends('adminlte::page',$id[]=array($equipo->id))
@section('title', 'Equipos')
@section('css')
<style>
  .custom-search-button {
    padding: 5px 10px; /* Ajusta el espacio (padding) según tus preferencias */
    margin-left: 10px; /* Ajusta el espacio (margen) a la izquierda */
    background-color: rgb(86, 103, 86); /* Cambia el color de fondo a verde */
    color: rgb(214, 239, 224); /* Cambia el color del texto a blanco */
    border: none; /* Elimina el borde */
    border-radius: 8px; /* Ajusta el radio de las esquinas */
  }
  
  .custom-search-button:hover {
    background-color: rgb(73, 133, 73); /* Cambia el color de fondo a lightgreen cuando se hace hover */
  }
  
  .custom-search-button:active {
    background-color: rgb(60, 80, 60); /* Vuelve al color de fondo verde cuando se presiona */
  }
  </style>


{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection

@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todos los equipos</h6>
@stop
@section('content')
{{--<h1></h1> --}}
<h1></h1>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('equipos.create')}}> Crear equipo</a></p> 
{{-- 
<form action="{{ route('chequear.alarmas') }}" method="GET">
  @csrf
  <button type="submit">Chequear Alarmas</button>
</form>
  --}}

<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Equipo</td>
        <td>Modelo</td>
        <td>Detalle</td>
        <td></td>
        <td></td>
       
    <tbody>
      @foreach ($equipos as $equipo)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$equipo->codEquipo }}</td>
        <td>{{$equipo->Modelo}}</td>
        <td>{{$equipo->det5}}</td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-pencil-fill" href="{{route('equipos.edit', $equipo->id)}}"></a> 
        </td>
        <td>
          <a class="bi bi-eye" href="{{route('equipos.show', $equipo->id)}}"></a>
        </td>
      </tr>
        @endforeach
    </tbody>
</table>

</div>

</div>
      <div class="container"> 
        @include('layouts.partials.menuListados')
      </div>
</div>

<div class="container"> 
  @include('layouts.partials.footer')
 </div>
{{-- aqui Todos los script ver plantilla--}}


@if($aviso)
<script>
  var usuarioNombre = @json($usuario->name);
  // Función para mostrar la alerta después de 10 segundos
  setTimeout(function() {
      // Mostrar alerta personalizada con SweetAlert2
      Swal.fire({
          title: usuarioNombre + ':',
          text: 'El plazo para hacer algunos trabajos ya se cumplió',
          icon: 'warning',
          timer: 9000, // 7 segundos
          timerProgressBar: true,
          showConfirmButton: false,
          showCancelButton: true, // Mostrar botón de cancelar
          cancelButtonText: 'Inspeccionar', // Texto del botón de cancelar
          cancelButtonColor: 'green', // Color del botón de cancelar
          background: 'linear-gradient(to right, rgb(86, 103, 86), black)', // Fondo degradado de verde a negro
          border: '2px solid red', // Borde rojo
          cancelButtonAriaLabel: 'Inspeccionar', // Atributo ARIA del botón de cancelar
          cancelButtonClass: 'custom-inspect-button', // Clase personalizada del botón de cancelar
          customClass: {
              title: 'swal2-title-custom',
              content: 'swal2-content-custom'
          }
      }).then((result) => {
          // Manejar el clic en el botón de cancelar
          if (result.dismiss === Swal.DismissReason.cancel) {
              // Redirigir al usuario a la ruta /chequear-alarmas
              window.location.href = '/chequear-alarmas';
          }
      });
  }, 5000); // 5 segundos
</script>

<style>
  .swal2-title-custom {
      color: white;
  }
  .swal2-content-custom {
      color: white;
  }
</style>
@endif
@endsection
@section('js')

@stop
