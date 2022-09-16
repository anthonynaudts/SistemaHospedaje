
    $.ajax({
        url: "./assets/db/peticiones/cargarEventos.php",
    }).done(function(res) {
        try {
            var result = JSON.parse(res);
            console.table(result)




            // document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
            
                var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Santo_Domingo',
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
                  eventDrop: function(arg){
                    console.table(arg.event.id)
                    // [p] Actualizar fechas en base de datos
                  },
                  eventResize: function(arg){
                    console.table(arg.event.id)
                    // [p] Actualizar fechas en base de datos
                  },
                  editable: true,
                  dayMaxEvents: true, // allow "more" link when too many events
                  events: result
                });
            
                calendar.render();
            //   });


                
        } catch (error) {
            console.log(error)
        }
    });