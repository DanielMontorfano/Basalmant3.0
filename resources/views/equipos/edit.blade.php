@extends('adminlte::page') 

@section('title', 'Edit')
@section('content_header')
@include('layouts.partials.menuEquipo')
@stop
@section('css')
{{--  EL MEJOR EJEMPLO DE LA PAGINA DE jquery-ui (https://jqueryui.com/autocomplete/) !!! --}}
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>

@endsection
@error('campo')
<small class="error-message blinking">*{{ $message }}</small>
@enderror
 
@section('content')
<style>
  h6 {
      text-align:center; font-size: 30px;
                      background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                      -webkit-background-clip: text;
                      -webkit-text-fill-color: transparent;

  }

  .input { color: #f2baa2;
       font-family: Times New Roman;
       font-size: 18px;
       background: linear-gradient(to right,#030007, #495c5c);

  }

  .error-message {
  color: rgb(60, 255, 0);
}

  @keyframes blinking {
      0% {
          opacity: 1;
      }
      50% {
          opacity: 0;
      }
      100% {
          opacity: 1;
      }
  }

  .blinking {
      animation: blinking 1.5s infinite;
  }
</style>
<br>
<h6 STYLE="text-align:center; font-size: 30px;
                  background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;">Editar ficha equipo</h6>  

<br>
<section class="main row ">
 
<div class="container ">
  
  
            
          {{-- Probando Col --}}
          <div class="container">
            <div class="row">
              <div class="col col-md-2">
               {{--  Columna --}}
                
              </div>
              <div class="col col-md-8">
                {{--  Columna2 --}}
                <form id="encabezado" action="{{route('equipos.update', $equipo->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                  @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                  @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                  
                  <div class="p-3 mb-2 text-white">
      
                    <div class="container">
                      <div class="row">
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="marca">Marca:</label> 
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="marca" value="{{old('marca', $equipo->marca)}}"> 
                            @error('marca')
                            <small class="error-message blinking">*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label " for="codEquipo">Código:</label>
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="codEquipo" value="{{old('codEquipo', $equipo->codEquipo)}}" placeholder="Código de equipo"> {{-- old() mantiene en campo con el dato--}}
                            @error('codEquipo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                            <small class="error-message blinking">*{{$message}}</small>
                            @enderror
                          </div>
                        </div>
      
                        <div class="col col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="modelo">Modelo:</label>  
                            <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="modelo" value="{{old('modelo', $equipo->modelo)}}">
                            @error('modelo') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                            <small class="error-message blinking">*{{$message}}</small>
                            @enderror
                          </div>    
                        </div>
                    </div> {{-- cierra row 1--}}
      
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="idSecc">Sección:</label>  
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"type="text" name="idSecc" value="{{old('idSecc', $equipo->idSecc)}}">  {{-- old() mantiene en campo con el dato--}}
                          @error('idSecc')
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="idSubSecc">Subsección:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" class="form-control" name="idSubSecc" value="{{old('idSubSecc', $equipo->idSubSecc)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('idSubSecc') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 2 --}}
                    
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det1">Característica Nº1:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det1" value="{{old('det1', $equipo->det1)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('det1')
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det2">Característica Nº2:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det2" value="{{old('det2', $equipo->det2)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('det2') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 3 --}}
      
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det3"> Característica Nº3:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det3" value="{{old('det3', $equipo->det3)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('det3')
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
      
                      <div class="col col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="det4">   Característica Nº4:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det4" value="{{old('det4', $equipo->det4)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('det4') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                          </div>
                      </div>
                    </div> {{-- cierra row 4 --}}
      
      
                    <div class="row">
                      <div class="col col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="det5"> Detalle:</label> 
                          <input autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="det5" value="{{old('det5', $equipo->det5)}}">   {{-- old() mantiene en campo con el dato--}}
                          @error('det5')
                          <small class="error-message blinking">*{{$message}}</small>
                          @enderror
                        </div>
                      </div>
                  
                    </div> {{-- cierra row 5 --}}
                    
                    
                  </form >  {{-- Cierra Formulario Nº1 --}} 
                  <br>
                      <div class="form-group">
                          <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                      </div>
                  <br>   
                  <br>
                  {{--INICIO DE SEGUNDO FORMULARIO --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA REPUESTOS --}} 
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Cantidad</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col"></th>
                                    </tr>
                                  </thead>
                                  @foreach($repuestos as $repuesto)
                                    <form action="{{route('equipoRepuesto.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarRep" readonly >
                                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                                <input type="hidden" name="repuestoBorrar_id" value={{$repuesto->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $repuesto->codigo }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $repuesto->descripcion}}</td>
                                                <td STYLE="text-align: center; color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$repuesto->pivot->cant }} {{$repuesto->pivot->unidad}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">  <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
                                              </tr>
                                        </tbody>
                                    </form>
                                    @endforeach
                          </table>
                      </div> {{-- div del card3 --}}
                      </div> {{-- div del card4 --}}
                      <br>
                       
                      
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                  <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                           {{-- MUESTRA NOMBRE FOTOS --}} 
                    <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                           <thead>
                              <tr>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                <th style="text-align: center;  color: #ffffff;" scope="col">Imágenes</th>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                              </tr>
                            </thead>
                            @foreach($fotosTodos as $foto)
                              <form action="{{route('fotos.store')}}" method="POST">
                              @csrf
                            <tbody>
                              <tr>
                                <input type="hidden" name="Selector" value="BorrarFoto" readonly > 
                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly > 
                                <input type="hidden" name="foto_id" value={{$foto->id}} readonly >
                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; " scope="row"></th>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $foto->nombreFoto}}</td>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "></td>
                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; text-align: right; "> <button type="submit" class="bi bi-trash3-fill"></button></td>
                              </tr>
                            </tbody>
                            </form>
                          @endforeach
                    </table>
                  </div> {{-- div del card5 --}} 
                  </div>   {{-- div del card6 --}}
                  <br>





                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                             {{-- MUESTRA NOMBRE FOTOS --}} 
                      <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                             <thead>
                                <tr>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col">Documentos</th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                  <th style="text-align: center;  color: #ffffff;" scope="col"></th>
                                </tr>
                              </thead>
                              @foreach($documentos as $documento)
                                <form action="{{route('documentos.store')}}" method="POST">
                                @csrf
                              <tbody>
                                <tr>
                                  <input type="hidden" name="Selector" value="BorrarDocu" readonly > 
                                  <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly > 
                                  <input type="hidden" name="docu_id" value={{$documento->id}} readonly >
                                  <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; " scope="row"></th>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $documento->nombreDocu}}</td>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "></td>
                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; text-align: right; "> <button type="submit" class="bi bi-trash3-fill"></button></td>
                                </tr>
                              </tbody>
                          @endforeach
                            </form>
                      </table>
                    </div> {{-- div del card7 --}} 
                    </div>   {{-- div del card8 --}}
                    <br>
                    



                    {{--MUESTRA PLANES ASOCIADOS --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA PLANES --}} 
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Nombre</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col"></th>
                                    </tr>
                                  </thead>
                                  @foreach($planes as $plan)
                                    <form action="{{route('equipoPlan.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarPlan" readonly >
                                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                                <input type="hidden" name="planBorrar_id" value={{$plan->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $plan->codigo }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $plan->nombre}}</td>
                                                <td STYLE="text-align: center; color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$plan->descripcion}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">  <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
                                              </tr>
                                        </tbody>
                                    </form>
                                    @endforeach
                          </table>
                      </div> {{-- div del card9 --}}
                      </div> {{-- div del card10 --}}
                      <br>
                      
                     {{--MUESTRA LUBRCACIONES  ASOCIADOS --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA LUBRICAIONES --}} 
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Ref.</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Punto</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Lubricante</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  @foreach($lubricaciones as $lubricacion)
                                    <form action="{{route('equipoLubricacion.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarLubricacion" readonly >
                                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                                <input type="hidden" name="lubricacionBorrar_id" value={{$lubricacion->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $lubricacion->id }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $lubricacion->puntoLubric}}</td>
                                                <td STYLE="text-align: center; color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$lubricacion->descripcion}}</td>
                                                <td STYLE="text-align: center; color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$lubricacion->lubricante}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">  <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
                                              </tr>
                                        </tbody>
                                    </form>
                                    @endforeach
                          </table>
                      </div> {{-- div del card9 --}}
                      </div> {{-- div del card10 --}}
                      <br>
                     
                     
                     
                     
                     
                     
                     
                     
                     
                      {{--MUESTRA EQUIPOS VINCULADOS --}}
                  <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                    <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                 {{-- MUESTRA EQUIPOS --}} 
                          <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                 <thead>
                                    <tr>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Marca</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col">Modelo</th>
                                      <th style="text-align: center; color: #ffffff;" scope="col"></th>
                                    </tr>
                                  </thead>
                                  @foreach($equiposB as $equipoB)
                                    <form action="{{route('equipoEquipo.store')}}" method="POST">
                                      @csrf
                                       
                                        <tbody>
                                              <tr>
                                                <input type="hidden" name="Selector" value="BorrarEquipo" readonly >
                                                <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
                                                <input type="hidden" name="equipoBBorrar_id" value={{$equipoB->id}} readonly >
                                                <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{ $equipoB->codEquipo }}</th>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{ $equipoB->marca}}</td>
                                                <td STYLE="text-align: center; color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$equipoB->modelo}}</td>
                                                <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">  <button class="bi bi-trash3-fill btn btn-link"  type="submit" ></button></td>
                                              </tr>
                                        </tbody>
                                    </form>
                                    @endforeach
                          </table>
                      </div> {{-- div del card11 --}}
                      </div> {{-- div del card12 --}}
                      <br>





              <div class="col col-md-2">
                {{-- Columna --}}
              </div>
            </div>
          </div>


          
        <br>
                   
        

            
              </div>             
</section>
   
</div>
</div>

{{-- $$$$$$$$$$$$$$$$$$$$$$  Segundo grupo de  formularios $$$$$$$$$$$$$$$ --}}
<br>
<section class="main row ">
<div class="container">
    <div class="col col-md-12">
      
      
        <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
          <div class="card-header " STYLE="background: linear-gradient(to left,#1e2020,#030007);"> 
      
            <h6 STYLE="text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">Adjuntar</h6>
      
        <br>
        <form action="{{route('equipoRepuesto.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
          <input type="hidden" name="Selector" value="AgregarRep" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
               <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                 <tr>
                    <td><input type="text" class='form-control' name="search" id="search" autocomplete="off" placeholder="Buscar repuesto (Ej.: 7984 2305)"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                    <td><div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check1"  id="check1">
                        <label class="form-check-label text-white" for="check1">Accesorio</label>
                        </div></td>
                    <td > <input type="number" class='form-control' name="cant" id="cant" value="" min="1" max="9999" placeholder="Cantidad" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);width: 80%;"></td>
                    <td > <input maxlength=6 type="text" class='form-control' name="unidad" id="unidad" placeholder="Unidad" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);width: 25%;"></td>

                    <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                    
                  </tr>
            </table>
        </form>
         {{-- *****************Inicio tercer formulario******************************************* --}}  
        <h5></h5>
        <form id="formImagenes" action="{{route('fotos.store', $equipo->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
          @csrf
              <input type="hidden" name="Selector" value="AgregarFoto" readonly >
              <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
             
            <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
              <tr>
                <td style="text-align: right;"><input type="text" class='form-control' name="nombreFoto" id="" accept="image/*" autocomplete="off" placeholder="Nombre de imagen" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                  @error('nombreFoto')
                  <small class="text-danger"> {{$message}}</small>
                  @enderror
                <td><input type="file" class='form-control' name="file" id="" accept="image/*" autocomplete="off" placeholder="Buscar repuesto" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                @error('file')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                <td style="text-align: right;"><button class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
              </tr>
            </table>
        </form>
         
        <h5></h5>
        <form id="formDocumentos" action="{{route('documentos.store', $equipo->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
          @csrf
          <input type="hidden" name="Selector" value="AgregarDocu" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
              
            <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
              <tr>
                <td style="text-align: right;"><input type="text" class='form-control' name="nombreDocu" id="" accept="" autocomplete="off" placeholder="Nombre de documento" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                  @error('nombreDocu')
                  <small class="text-danger"> {{$message}}</small>
                  @enderror
                <td><input type="file" class='form-control' name="file1" id="" accept=".pdf" autocomplete="off" placeholder="Buscar Documento" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" >
                @error('file1')
                <small class="text-danger"> {{$message}}</small>
                @enderror
               <td style="text-align: right;"><button class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
              </tr>
            </table>
        </form>
        {{-- Formulario agregar Plan --}}
        <form action="{{route('equipoPlan.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
          <input type="hidden" name="Selector" value="AgregarPlan" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
               <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                 <tr>
                    <td><input type="text" class='form-control' name="BuscaPlan" id="BuscaPlan" autocomplete="off" placeholder="Buscar plan (Ej.: PL-00000315)"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                    <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                 </tr>
               </table>
        </form>
        {{-- Formulario agregar Lubricaciones --}}
        <div id="mi_seccion">
        <form action="{{route('equipoLubricacion.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
          <input type="hidden" name="Selector" value="AgregarLubricacion" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
          <input type="hidden" id="lubricacion_id" name="lubricacion_id">
               <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                 <tr>
                    <td><input type="text" class='form-control' name="BuscaLubricacion" id="BuscaLubricacion" autocomplete="off" placeholder="Buscar Lubricación"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                    <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                 </tr>
               </table>
                              <!-- Aquí muestras el mensaje si está presente en la sesión -->
                              @if (session()->has('mensaje'))
                              <div id="mensaje-sesion" class="alert alert-info">
                                  {{ session('mensaje') }}
                              </div>
                              @endif

        </form>
        </div>


        
        {{-- Formulario agregar Equipo vinculado --}}
        <form action="{{route('equipoEquipo.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
          @csrf
          <input type="hidden" name="Selector" value="AgregarEquipo" readonly >
          <input type="hidden" name="equipo_id" value={{$equipo->id}} readonly >
          @if(isset($data))
          @foreach($data as $dat) 
          <input type="hidden" name="equipoB_id" value={{$dat['id_B']}} readonly >
          @endforeach
          @endif   
               <table class="table table-sm" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                 <tr>
                    <td><input type="text" class='form-control' name="BuscaEquipo" id="BuscaEquipo" autocomplete="off" placeholder="Buscar equipo (Ej.:03-ELE-22901)"class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"> </td>
                    <td style="text-align: right;"><button class="btn btn-primary" type="submit" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Agregar</button> </td>
                 </tr>
               </table>
        </form>

      </div> 
     </div> 
    </div>
    
  
</div>
</section>








<script>
    
    

    $( "#search" ).autocomplete({
      source: function(request, response){
        
              $.ajax({
              url:"{{route('search.repuestos')}}",
               dataType: 'json',
              data:{
                     term: request.term
                    },
                    success: function(data) {
                    response(data)  
            }

        });
      }
    });

    $( "#BuscaPlan" ).autocomplete({
      source: function(request, response){
        
              $.ajax({
              url:"{{route('search.plans')}}",
               dataType: 'json',
              data:{
                     term: request.term
                    },
                    success: function(data) {
                    response(data)  
            }

        });
      }
    });


    $("#BuscaLubricacion").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "{{ route('search.lubricaciones') }}",
      dataType: 'json',
      data: {
        term: request.term
      },
      success: function(data) {
        response(data);
      }
    });
  },
  select: function(event, ui) {
    // Cuando se seleccione un elemento, asignamos el ID al campo oculto
    $("#lubricacion_id").val(ui.item.id);
  }
});



    $( "#BuscaEquipo" ).autocomplete({
      source: function(request, response){
        
              $.ajax({
              url:"{{route('search.equipos')}}",
               dataType: 'json',
              data:{
                     term: request.term
                    },
                    success: function(data) {
                    response(data)  
            }

        });
      }
    });
  
    
  
  // Obtener el elemento del mensaje de sesión por su id
  const mensajeSesion = document.getElementById('mensaje-sesion');

// Obtener el input por su id
const inputBuscaLubricacion = document.getElementById('BuscaLubricacion');

// Agregar evento de clic al input para ocultar el mensaje de sesión
inputBuscaLubricacion.addEventListener('click', () => {
    // Ocultar el mensaje de sesión estableciendo el estilo de display a 'none'
    mensajeSesion.style.display = 'none';
});



  </script> 
   
  

   {{-- Este es el script de la pagian oficial
     <script>
    $( function() {
      var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
       
      ];
      $( "#search" ).autocomplete({
        source: availableTags
      });
    } );
    </script>  --}}

@endsection


