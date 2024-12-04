@extends('layouts.app')

@section('title', 'Calendario')

@section('content')

@include('components.activity-modal')

<div id='calendar' class="calendario"></div>

<script>
    var calendarEl = document.getElementById('calendar');
    document.addEventListener('DOMContentLoaded', function() {

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: function(fetchInfo, successCallback, failureCallback) {
                console.log(section);
                fetch('/events/list?section=' + section)
                    .then(response => response.json())
                    .then(events => {                         
                        const expandedEvents = events.flatMap(event => {
                            const startDate = new Date(event.start);
                            const endDate = new Date(event.end || event.start);
                            const expanded = [];

                            while (startDate <= endDate) {
                                expanded.push({
                                    title: event.title,
                                    start: new Date(startDate).toISOString().split('T')[0], 
                                    allDay: true, 
                                });
                                startDate.setDate(startDate.getDate() + 1); 
                            }

                            return expanded;
                        });

                        successCallback(expandedEvents); 
                    })
                    .catch(error => failureCallback(error));
            },
            dateClick: function(info) {
                var date = new Date(info.dateStr + 'T00:00:00');
                var day = String(date.getUTCDate()).padStart(2, '0');
                var month = String(date.getUTCMonth() + 1).padStart(2, '0');
                var year = date.getUTCFullYear();

                var selectedDate = day + '-' + month + '-' + year;
                document.getElementById('startDate').value = selectedDate;

                // Configura la fecha mínima en el endDate
                var endDatePicker = document.getElementById('endDate')._flatpickr;
                if (endDatePicker) {
                    endDatePicker.set('minDate', selectedDate);
                } else {
                    flatpickr("#endDate", {
                        dateFormat: "d-m-Y",
                        altInput: true,
                        altFormat: "F j, Y",
                        minDate: selectedDate,
                    });
                }

                // Muestra el modal
                var activityModal = new bootstrap.Modal(document.getElementById('activityModal'));
                activityModal.show();
            },
        });

        calendar.render();
    });
</script>


@endsection