<?php require("assets/incluir/header.php"); ?>

<link href='assets/calendario_lib/main.css' rel='stylesheet'/>
<script src='assets/calendario_lib/main.js'></script>
<script src='assets/calendario_lib/locales-all.js'></script>


<!-- //[p] Notificacion 2 horas antes de la salida -->
<!-- //[p] Colores de estados de reservas (Verde confirmada, amarillo pendiente, rojo cancelada) -->


<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: '	America/Santo_Domingo',
    locale: 'es',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay listDay,listWeek,listMonth'
      },
      initialDate: '2022-09-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      views: {
      listDay: { buttonText: 'A día' },
      listWeek: { buttonText: 'A Semana' },
      listMonth: { buttonText: 'A Mes' }
    },
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
         console.log(arg.event)
        // if (confirm('Are you sure you want to delete this event?')) {
        //   arg.event.remove()
        // }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2022-09-01',
          desciption: 'Prueba descripción'
        },
        {
          title: 'Long Event',
          start: '2022-09-07',
          end: '2022-09-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2022-09-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2022-09-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2022-09-11',
          end: '2022-09-13'
        },
        {
          title: 'Meeting',
          start: '2022-09-12T10:30:00',
          end: '2022-09-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2022-09-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2022-09-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2022-09-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2022-09-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2022-09-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2022-09-28'
        }
      ]
    });

    calendar.render();
  });

</script>
<style>

  /* body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  } */

  #calendar {
    max-width: 100%;
    margin: 0 auto;
    max-height: 80vh;
  }

</style>
<section class="section">
<!-- <section class="section" style="max-height: 80vh;"> -->
    <div class="row d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Calendario de reservas</h5>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</section>

<?php require("assets/incluir/footer.php"); ?>