@extends('layouts.app')

@section('title', 'Calendario')

@section('content')

<div id='calendar' class="calendario"></div>

@include('components.activity-modal')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');


        var section = "{{ $section ?? '' }}"; // Si no está definida, usa una cadena vacía

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: '/events/list?section=' + section, // Pasar 'section' como parámetro
            displayEventTime: false,
            dateClick: function(info) {
                var date = new Date(info.dateStr + 'T00:00:00'); // Asegura que la fecha esté en UTC sin desfase de horas
                var day = String(date.getUTCDate()).padStart(2, '0'); // Día en formato de dos dígitos
                var month = String(date.getUTCMonth() + 1).padStart(2, '0'); // Mes en formato de dos dígitos
                var year = date.getUTCFullYear(); // Año

                var selectedDate = day + '-' + month + '-' + year;
                document.getElementById('startDate').value = selectedDate;
                var endDatePicker = document.getElementById('endDate')._flatpickr;
                if (endDatePicker) {
                    endDatePicker.set('minDate', selectedDate); // Actualiza el minDate
                } else {
                    // Inicializa flatpickr en #endDate si no existe
                    flatpickr("#endDate", {
                        dateFormat: "d-m-Y",
                        altInput: true,
                        altFormat: "F j, Y", // Formato legible para el usuario
                        minDate: selectedDate, // Establece la fecha mínima
                    });
                }
                var activityModal = new bootstrap.Modal(document.getElementById('activityModal'));
                activityModal.show();
            }
        });
        
        calendar.render();
    });
</script>

@endsection