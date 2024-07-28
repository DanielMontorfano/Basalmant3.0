<!-- resources/views/proyectos/create.blade.php -->

@extends('adminlte::page')

@section('title', 'Crear nuevo proyecto')
@section('content_header')
    <h6 style="text-align:center; font-size: 30px;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Crear un nuevo proyecto
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
<div class="container">
    <div class="row">
        <div class="col col-md-2"></div>
        <div class="col col-md-8">
            <form method="POST" action="{{ route('proyectos.store') }}" id="project-form"
                  style="background: linear-gradient(to right, #495c5c, #030007);">
                @csrf
                <div class="p-3 mb-2 text-white">
                    <div class="container">
                        <div class="form-group">
                            <label for="nombre">Nombre del Proyecto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div id="tasks-container"></div>
                        <button type="button" class="btn btn-primary mt-3" id="add-task"
                                style="background: linear-gradient(to right, #495c5c, #030007);">Agregar Tarea</button>
                        <button type="submit" class="btn btn-success mt-3"
                                style="background: linear-gradient(to right, #495c5c, #030007);">Guardar Proyecto</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-md-2"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let taskCount = 0;

        document.getElementById('add-task').addEventListener('click', function() {
            if (taskCount > 0) {
                const prevSubtasks = document.querySelectorAll(`.subtasks-container[data-task="${taskCount}"] .subtask`);
                if (prevSubtasks.length === 0) {
                    alert('Cada tarea debe tener al menos una subtarea.');
                    return;
                }
            }

            taskCount++;
            const taskForm = document.createElement('div');
            taskForm.classList.add('task');
            taskForm.innerHTML = `
                <h4>Tarea ${taskCount}</h4>
                <div class="form-group">
                    <label for="tareas[${taskCount}][descripcion]">Nombre de la Tarea:</label>
                    <input type="text" class="form-control" name="tareas[${taskCount}][descripcion]" required>
                </div>
                <button type="button" class="btn btn-secondary mt-2 add-subtask" data-task="${taskCount}"
                        style="background: linear-gradient(to right, #495c5c, #030007);">Agregar Subtarea</button>
                <div class="subtasks-container" data-task="${taskCount}"></div>
            `;
            document.getElementById('tasks-container').appendChild(taskForm);

            document.querySelector(`.add-subtask[data-task="${taskCount}"]`).addEventListener('click', function() {
                const taskIndex = this.getAttribute('data-task');
                const subtaskCount = document.querySelectorAll(`.subtask[data-task="${taskIndex}"]`).length + 1;
                const subtaskForm = document.createElement('div');
                subtaskForm.classList.add('subtask');
                subtaskForm.setAttribute('data-task', taskIndex);
                subtaskForm.innerHTML = `
                    <div class="form-group">
                        <label for="tareas[${taskIndex}][subtareas][${subtaskCount}][descripcion]">Nombre de la Subtarea:</label>
                        <input type="text" class="form-control" name="tareas[${taskIndex}][subtareas][${subtaskCount}][descripcion]" required>
                    </div>
                    <div class="form-group">
                        <label for="tareas[${taskIndex}][subtareas][${subtaskCount}][fecha_inicio]">Fecha de Inicio:</label>
                        <input type="date" class="form-control" name="tareas[${taskIndex}][subtareas][${subtaskCount}][fecha_inicio]" required>
                    </div>
                    <div class="form-group">
                        <label for="tareas[${taskIndex}][subtareas][${subtaskCount}][fecha_fin]">Fecha Final:</label>
                        <input type="date" class="form-control" name="tareas[${taskIndex}][subtareas][${subtaskCount}][fecha_fin]" required>
                    </div>
                `;
                document.querySelector(`.subtasks-container[data-task="${taskIndex}"]`).appendChild(subtaskForm);
            });
        });

        document.getElementById('project-form').addEventListener('submit', function(event) {
            const tasks = document.querySelectorAll('.task');
            if (tasks.length === 0) {
                alert('El proyecto debe tener al menos una tarea.');
                event.preventDefault();
                return;
            }

            let valid = true;
            tasks.forEach(function(task) {
                const subtasks = task.querySelectorAll('.subtask');
                if (subtasks.length === 0) {
                    alert('Cada tarea debe tener al menos una subtarea.');
                    valid = false;
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection

