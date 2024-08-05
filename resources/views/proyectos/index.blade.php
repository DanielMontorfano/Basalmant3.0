{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Proyectos')
@section('css')

@endsection
@section('content_header')
<h6 STYLE="text-align:center; font-size: 30px;
background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;">Listado de todos los proyectos</h6>
@stop
@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">
<div class="text-white card-body "  style="max-width: 95;">
<p ><a  class="text-white " href={{route('plans.create')}}> Crear plan</a></p> 
<table id="listado" class="table table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Nombre</td>
        <td>Descripción</td>
        <td>Inicio / Fin</td>
        <td></td>
        <td></td>
    </thead>
    <tbody>
      @foreach ($proyectos as $proyecto)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        
        <td>{{$proyecto->nombre}}</td>
        <td>{{$proyecto->descripcion}}</td>
        <td>{{$proyecto->fecha_inicio}} / {{$proyecto->fecha_fin}}</td>
        <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">
          <a class="bi bi-pencil-fill" href="{{route('proyectos.edit', $proyecto->id)}}"></a> 
        </td>
        <td>
          <a class="bi bi-eye" href="{{route('proyectos.show', $proyecto->id)}}"></a>
        </td>
      </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
<div class="container"> 
  @include('layouts.partials.footer')
 </div>
@endsection
@section('js')
<script>
  var logoUrl = '{{ asset('dataprint/LogoIngenio2.png') }}';
</script>
@stop







