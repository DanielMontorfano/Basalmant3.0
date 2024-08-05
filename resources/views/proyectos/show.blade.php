@extends('adminlte::page')

@section('title', 'Proyecto')

@section('content_header')
    <h1>Proyecto</h1>
@stop

@section('content')
    <div id="container"></div>
<div class="container"> 
    @include('layouts.partials.footer')
</div>
@stop



@section('js')
    <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        const today = new Date(),
            day = 1000 * 60 * 60 * 24;

        //Inicio customizado
        const customStartDate = new Date(Date.UTC(2024, 1, 1)); // Agosto es el mes 7, ya que los meses en JavaScript empiezan desde 0
        const customStart = customStartDate.getTime();
        const customEnd = customStart + (20 * day);    

        // Set to 00:00:00:000 today
        today.setUTCHours(0);
        today.setUTCMinutes(0);
        today.setUTCSeconds(0);
        today.setUTCMilliseconds(0);

        // Configurar opciones de idioma y formato de fecha en español
        Highcharts.setOptions({
    lang: {
        months: [
            'Enero', 'Febrero', 'Marzo', 'Abril',
            'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        weekdays: [
            'Domingo', 'Lunes', 'Martes', 'Miércoles',
            'Jueves', 'Viernes', 'Sábado'
        ],
        shortMonths: [
            'Ene', 'Feb', 'Mar', 'Abr',
            'May', 'Jun', 'Jul', 'Ago',
            'Sep', 'Oct', 'Nov', 'Dic'
        ],
        rangeSelectorZoom: 'Periodo',
        resetZoom: 'Reiniciar zoom',
        rangeSelectorFrom: 'Desde',
        rangeSelectorTo: 'Hasta',
        week: 'Semana' // Aquí se configura el texto para "week"
    }
});

        document.addEventListener('DOMContentLoaded', function () {
            // Verificar si Highcharts.ganttChart está disponible
            if (typeof Highcharts.ganttChart !== 'function') {
                console.error('Highcharts Gantt module failed to load.');
                return;
            }

            // Datos de las tareas desde el controlador
            var tasksData = @json($tasksData);

            // Configurar el gráfico Gantt con zoom en ambos ejes
            Highcharts.ganttChart('container', {
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0,300],
                        stops: [
                            [0, '#abf6f7  '], // Gris oscuro
                            [1, '#2e2e2e']  // Gris medio
                        ]
                    },
                    borderRadius: 10, // Bordes redondeados
                    style: {
                        fontFamily: '\'Pacifico\', cursive'
                    }
                },
                title: {
                    text: '{{ $proyecto->nombre }}',
                    align: 'center',
                    style: {
                        fontSize: '30px', // Cambia el tamaño de la fuente
                        color: '#5763ca '
                    }
                },
                xAxis: {
                    min: Date.UTC(2023, 0, 1),
                    max: Date.UTC(2024, 11, 1),
                    scrollbar: {
                        enabled: true
                    },
                    gridLineColor: '#FFFFFF',
                    labels: {
                        style: {
                            color: '#afffff', // Color de las etiquetas del eje x
                            fontWeight: 'bold'
                        }
                    },
                    dateTimeLabelFormats: {
                        year: {
                            main: '<span style="color:#FFA500;"></span>', // Color de la fuente para el año
                            range: '<span style="color:#FFA500;">%Y %B</span>' // Color de la fuente para el rango de años
                        },
                        month: {
                            main: '<span style="color:#00FF00;">%Y %B</span>', // Color de la fuente para el mes
                            range: '<span style="color:#00FF00;">%Y %B</span>' // Color de la fuente para el rango de meses
                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#FFFFFF',
                    labels: {
                        style: {
                            color: '#FFFFFF'
                        }
                    }
                },
                credits: {
                    enabled: false // Deshabilitar la leyenda de Highcharts.com
                },
                accessibility: {
                    point: {
                        descriptionFormatter: function (point) {
                            var desc = point.yCategory + '. ';
                            if (point.completed) {
                                desc += 'Tarea completada en un ' + (point.completed.amount * 100) + '%. ';
                            }
                            desc += 'Inicio ' + Highcharts.dateFormat('%Y-%m-%d', point.start) + ', fin ' + Highcharts.dateFormat('%Y-%m-%d', point.end) + '.';
                            return desc;
                        }
                    }
                },
                navigator: {
                    enabled: true // Habilitar el navigator para zoom adicional
                },
                rangeSelector: {
                    enabled: true // Habilitar el range selector para zoom adicional
                },
                series: [{
                    name: 'Tareas',
                    data: tasksData
                }]
            });
        });
    </script>
@stop
