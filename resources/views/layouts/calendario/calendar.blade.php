@extends('layouts.app')

@section('title', 'Calendario')

@section('content')

<div id='calendar' class="calendario"></div>

@include('components.activity-modal')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');


        var section = "{{ $section ?? '' }}";

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: '/events/list?section=' + section,
            displayEventTime: false,
            dateClick: function(info) {
                var date = new Date(info.dateStr + 'T00:00:00');
                var day = String(date.getUTCDate()).padStart(2, '0');
                var month = String(date.getUTCMonth() + 1).padStart(2, '0');
                var year = date.getUTCFullYear();

                var selectedDate = day + '-' + month + '-' + year;
                document.getElementById('startDate').value = selectedDate;
                var endDatePicker = document.getElementById('endDate')._flatpickr;
                if (endDatePicker) {
                    endDatePicker.set('minDate', selectedDate);
                } else {
                    // Inicializa flatpickr en #endDate si no existe
                    flatpickr("#endDate", {
                        dateFormat: "d-m-Y",
                        altInput: true,
                        altFormat: "F j, Y",
                        minDate: selectedDate,
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
