@extends('adminlte::page')
@section('title', 'Crear nuevo procedimiento')
@section('content_header')
    <h6 style="text-align:center; font-size: 30px;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Crear un nuevo ggprocedimiento
    </h6>
@stop

@section('content')

<style>
    h6 {
        text-align: center;
        font-size: 30px;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-control {
        color: #f2baa2;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        background: linear-gradient(to right, #030007, #495c5c);
    }

    .container {
        color: #f3efedd1;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
</style>

<br>
<div class="container"> {{-- Container principal --}}
    <div class="row"> {{-- Row principal --}}
        <div class="col col-md-2">
            {{-- Columna 1 --}}
        </div>

        <div class="col col-md-8">
            {{-- Columna 2 --}}
            <form id="nuevoProtocolo" action="{{ route('protocolos.store') }}" method="POST"
                  style="background: linear-gradient(to right, #495c5c, #030007);">

                @csrf {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}

                <div class="p-3 mb-2 text-white">
                    <div class="container">

                        {{-- ***** Div de la primera fila --}}
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="descripcion">Descripción:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           type="text" name="descripcion" value="{{ old('descripcion') }}">
                                    @error('descripcion')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div> {{-- ***** Div de la primera fila --}}

                        <br>
                        <br>

                        <div class="form-group">
                          <button title="Adjuntar tareas a este procedimiento" form="nuevoProtocolo"
                                  class="btn btn-primary" type="submit"
                                  style="background: linear-gradient(to right, #495c5c, #030007);">Siguiente
                          </button>
                          <p style="text-align: right;">
                              <a class="text-white" href="{{ route('protocolos.index') }}">Salir</a>
                          </p>
                      </div>

                    </div> {{-- Div del container dentro de columna 2 --}}
                </div> {{-- Div del Letra blanca --}}
            </form>
        </div> {{-- Columna 2 --}}

        <div class="col col-md-2">
            {{-- Columna 3 --}}
        </div>
    </div> {{-- Div del row1 Principal --}}
</div> {{-- Div del container Principal --}}

{{-- Footer --}}
<div class="container" style="margin-top: 50px;">
    @include('layouts.partials.footer')
</div>

@endsection
