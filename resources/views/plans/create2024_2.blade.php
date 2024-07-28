@extends('adminlte::page')
@section('title', 'Crear nuevo plan o proyecto')
@section('content_header')
    <h6 style="text-align: center; font-size: 30px;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Crear un nuevo plan o proyecto
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

    select.form-control option {
        background-color: #2e2e2e;
        color: #f2baa2;
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button,
    input[type=number] {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: none;
        padding-right: 20px;
        background: linear-gradient(to right, #030007, #495c5c);
        color: #f2baa2;
        border: 1px solid #495c5c;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    select option {
        background-color: #2e2e2e;
        color: #f2baa2;
    }
</style>

<br>
<div class="container">
    <div class="row">
        <div class="col col-md-2">
            {{-- Columna 1 --}}
        </div>

        <div class="col col-md-8">
            {{-- Columna 2 --}}
            <form id="formSelector">
                <input type="radio" id="planRadio" name="formType" value="plan" onclick="showForm('plan')">
                <label for="planRadio">Plan</label>

                <input type="radio" id="proyectoRadio" name="formType" value="proyecto" onclick="showForm('proyecto')">
                <label for="proyectoRadio">Proyecto</label>
            </form>

            <form id="nuevoPlan" action="{{ route('plans.store') }}" method="POST"
                  style="background: linear-gradient(to right, #495c5c, #030007); display: block;">
                @csrf
                <div class="p-3 mb-2 text-white">
                    <div class="container">
                        {{-- Campos para Plan --}}
                        <div class="row">
                            <div class="col col-md-5">
                                <div class="form-group">
                                    <label class="control-label" for="nombre">Nombre:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           placeholder="Ej.: Motores 1" type="text" name="nombre"
                                           value="{{ old('nombre') }}">
                                    @error('nombre')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="frecuencia">Frecuencia:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c); width: 50px;"
                                           type="number" min="0" max="99" step="1" maxlength="2"
                                           onkeydown="filtro()" oninput="limitarCaracteres(this)" inputmode="numeric"
                                           name="frecuencia" value="{{ old('frecuencia') }}"
                                           title="Frecuencia si está creando un plan">
                                    @error('frecuencia')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="unidad">Unidad:</label>
                                    <select name="unidadSelect" class="form-control"
                                            style="color: #f2baa2; width: 90px;">
                                        <option value=""></option>
                                        <option value="Días">Días</option>
                                        <option value="Semanas">Semanas</option>
                                        <option value="Meses">Meses</option>
                                        <option value="Años">Años</option>
                                    </select>
                                    @error('unidad')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-md-3">
                                {{-- Columna vacía --}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="descripcion">Descripción:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           placeholder="Ej.: Para motores menores de 25 Hp" type="text"
                                           name="descripcion" value="{{ old('descripcion') }}">
                                    @error('descripcion')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <button form="nuevoPlan" class="btn btn-primary" type="submit"
                                    style="background: linear-gradient(to right, #495c5c, #030007);">Enviar
                            </button>
                            <p style="text-align: right;">
                                <a class="text-white" href="{{ route('plans.index') }}">Salir</a>
                            </p>
                        </div>

                    </div>
                </div>
            </form>

            <form id="nuevoProyecto" action="{{ route('store.proyecto') }}" method="POST"
                  style="background: linear-gradient(to right, #495c5c, #030007); display: none;">
                @csrf
                <div class="p-3 mb-2 text-white">
                    <div class="container">
                        {{-- Campos para Proyecto --}}
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="pytoNombre">Nombre:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           placeholder="Ej.: Construcción de playa para carguío de gasoil" type="text"
                                           name="pytoNombre" value="{{ old('pytoNombre') }}">
                                    @error('pytoNombre')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="fecha_inicio">Fecha de Inicio:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
                                    @error('fecha_inicio')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="fecha_fin">Fecha de Fin:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           type="date" name="fecha_fin" value="{{ old('fecha_fin') }}">
                                    @error('fecha_fin')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="pytoDescripcion">Descripción:</label>
                                    <input autocomplete="off" class="form-control"
                                           style="color: #f2baa2; font-family: Times New Roman; font-size: 18px; background: linear-gradient(to right, #030007, #495c5c);"
                                           placeholder="Ej.: Destinado a mejorar el expendio de combustibles " type="text"
                                           name="pytoDescripcion" value="{{ old('pytoDescripcion') }}">
                                    @error('pytoDescripcion')
                                    <small>*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <button form="nuevoProyecto" class="btn btn-primary" type="submit"
                                    style="background: linear-gradient(to right, #495c5c, #030007);">Enviar
                            </button>
                            <p style="text-align: right;">
                                <a class="text-white" href="{{ route('plans.index') }}">Salir</a>
                            </p>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div class="col col-md-2">
            {{-- Columna 3 --}}
        </div>
    </div>
</div>

<div class="container" style="margin-top: 50px;">
  @include('layouts.partials.footer')
</div>

<script>
    function filtro(event) {
        var tecla = event.key;
        if (['.', 'e'].includes(tecla)) {
            event.preventDefault();
        }
    }

    function limitarCaracteres(element) {
        if (element.value.length > 2) {
            element.value = element.value.slice(0, 2);
        }
    }

    function toggleForm() {
        var planForm = document.getElementById('nuevoPlan');
        var proyectoForm = document.getElementById('nuevoProyecto');
        var formType = document.querySelector('input[name="formType"]:checked').value;
        
        if (formType === 'plan') {
            planForm.style.display = 'block';
            proyectoForm.style.display = 'none';
        } else {
            planForm.style.display = 'none';
            proyectoForm.style.display = 'block';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const formType = sessionStorage.getItem("formType") || "plan";
        document.getElementById(formType + "Radio").checked = true;
        showForm(formType);
    });

    function showForm(formType) {
        sessionStorage.setItem("formType", formType);
        document.getElementById("nuevoPlan").style.display = formType === "plan" ? "block" : "none";
        document.getElementById("nuevoProyecto").style.display = formType === "proyecto" ? "block" : "none";
    }
</script>

@endsection
