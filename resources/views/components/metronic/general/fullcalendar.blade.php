@props([
    'id' => null,
    'events' => [], // Json array of events
    'initialDate' => null // YYYY-MM-DD
])
@php
    $id = $id ?? 'kt_fullcalendar_' . uniqid();
    $initialDate = $initialDate ?? date('Y-m-d');
    $eventsJson = json_encode($events);
@endphp

 <div id="{{ $id }}"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById("{{ $id }}");
        var calendar = new FullCalendar.Calendar(element, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: '{{ $initialDate }}',
            navLinks: true,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true,
            events: {!! $eventsJson !!}
        });
        calendar.render();
    });
</script>
