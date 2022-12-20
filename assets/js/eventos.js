
  function actualizarFechasEvento(idEvento, fechaInicio, fechaFinal){
      $.ajax({
          url: RUTACONSULTAS + "actualizarFechaEvento" + ".php",
          method: "POST",
          data: {
            idEvento: idEvento,
            fechaInicio: fechaInicio,
            fechaFinal: fechaFinal
          },
      }).done(function(res) {
          try {
            if(res == 1)
              console.log("Evento actualizado...")
          } catch (error) {
              console.log(error)
          }
      });
  }

  function mostrarDatosEvento(datos){

    document.getElementById("datosEvento").innerHTML = `
    <h5>${datos.title}</h5>
    <p class="m-0">${datos.startStr} - ${datos.endStr}</p>
    <p class="m-0">Persona</p>
    <p class="m-0">habitacion</p>
    `

    apEstilos = document.querySelector(".modal-content-custom")
    apEstilos.style.borderColor = datos.backgroundColor
    document.getElementById("abrirModal").click()
  }

    
    $.ajax({
        url: "./assets/db/peticiones/cargarEventos.php",
    }).done(function(res) {
        try {
            let result = JSON.parse(res);
            console.table(result)

            // Fecha
            // let date = new Date()
            // let day = date.getDate()
            // let month = date.getMonth() + 1
            // let year = date.getFullYear()
            // // let fechaHoy = ''
            // if(month < 10){
            //   fechaHoy = `${year}-0${month}-${day}`
            // }else if(day <10){
            //   fechaHoy = `${year}-${month}-0${day}`
            // }else{
            //   fechaHoy = `${year}-${month}-${day}`
            // }

            fechaHoy = obtenerFechaHoy()

            // document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
            
                var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Santo_Domingo',
                locale: 'es',
                  headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth listDay,listWeek,listMonth'
                    // right: 'dayGridMonth,timeGridWeek,timeGridDay listDay,listWeek,listMonth'
                  },
                  dayRender: function(date, cell){
                    if (date > maxDate){
                        $(cell).addClass('disabled');
                    }
                  },
                  // selectConstraint: {
                  //   start: '2022-10-03',
                  //   end: '2022-10-12'
                  // },
                  // validRange: {
                  //   start: '2022-10-03',
                  //   end: '2022-10-12'
                  // },
                  initialDate: fechaHoy,
                  navLinks: true, // can click day/week names to navigate views
                  selectable: true,
                  selectMirror: true,
                  views: {
                  listDay: { buttonText: 'Lista día' },
                  listWeek: { buttonText: 'Lista semana' },
                  listMonth: { buttonText: 'Lista mes' }
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
                    //  console.log(arg)
                    console.log(arg.event)
                    // document.getElementById("abrirModal").click()
                    // objeto = arg.event
                    // console.log(objeto)

                    // document.getElementById("datosEvento").innerText = objeto
                    mostrarDatosEvento(arg.event)
                  },
                  eventDrop: function(arg){
                    // Evento arrastrar
                    // console.table(arg.event.id)
                    // console.log(arg.event.id, arg.event.startStr, arg.event.endStr)
                    actualizarFechasEvento(arg.event.id, arg.event.startStr, arg.event.endStr)
                  },
                  eventResize: function(arg){
                    // Evento cambiar tamaño
                    actualizarFechasEvento(arg.event.id, arg.event.startStr, arg.event.endStr)
                  },
                  editable: true,
                  dayMaxEvents: false, // allow "more" link when too many events
                  events: result
                });
            
                calendar.render();
            //   });

                
        } catch (error) {
            console.log(error)
        }
    });