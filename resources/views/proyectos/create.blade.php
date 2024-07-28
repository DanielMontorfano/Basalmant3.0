<!-- resources/views/proyectos/create.blade.php -->

@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Crear Proyecto</h1>
    <form method="POST" action="{{ route('proyectos.store') }}" id="project-form">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Proyecto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <div id="tasks-container"></div>
        <button type="button" class="btn btn-primary mt-3" id="add-task">Agregar Tarea</button>
        <button type="submit" class="btn btn-success mt-3">Guardar Proyecto</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let taskCount = 0;

        document.getElementById('add-task').addEventListener('click', function() {
            // Verificar si la tarea anterior tiene al menos una subtarea
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
                <button type="button" class="btn btn-secondary mt-2 add-subtask" data-task="${taskCount}">Agregar Subtarea</button>
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
            // Verificar si hay al menos una tarea y una subtarea
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

