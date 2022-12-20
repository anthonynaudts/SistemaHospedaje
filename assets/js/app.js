const RUTACONSULTAS = "./assets/db/peticiones/"; 

function desactivarLinksSinPermisos(){
    $.ajax({
        url: RUTACONSULTAS + "consultaPermisosGeneral" + ".php",
        method: "POST"
    }).done(function(res) {
        try {

            var result = JSON.parse(res);
            result.forEach(pagina => {
                if(pagina.estado != 1){
                    document.getElementById(pagina.pagina).classList.add("desactivarLink")
                }else{
                    document.getElementById(pagina.pagina).classList.remove("desactivarLink")
                }
            });


            var listaModulos = document.querySelectorAll(".modulo")
            listaModulos.forEach(element => {
                let noActivos = 0
                for (const child of element.children) {
                    (child.classList == "desactivarLink")? noActivos ++: ''
                }
                if(element.childElementCount == noActivos)
                    element.parentElement.style.display = "none"
                else
                    element.parentElement.style.display = "block"
            });

            document.getElementById("loader").classList.remove("d-flex")
            document.getElementById("loader").classList.add("d-none")
            document.getElementById("menu").classList.remove("d-none")


        } catch (error) {
            console.log(error)
        }
    });
}


function consultaGeneral(query){
    $.ajax({
        url: RUTACONSULTAS + "consultaGeneral" + ".php",
        method: "POST",
        data: {
            query: query
        },
    }).done(function(res) {
        try {
            var result = JSON.parse(res);
            console.log(result)
        } catch (error) {
            console.log(error)
        }
    });
}

window.addEventListener("load", function(event) {
    var URLactual = window.location.pathname;
    URLactual = URLactual.replace("/", "")

    titulo = URLactual.charAt(0).toUpperCase() + URLactual.slice(1);
    titulocabeza = document.querySelector('title').textContent
    document.querySelector('title').textContent = titulocabeza + " · " + titulo
    if(URLactual == "tablero"){
        this.document.getElementById("tablero").classList.remove("collapsed")
    }
    if(URLactual == "perfil"){
        this.document.getElementById("perfil").classList.remove("collapsed")
    }

    if(URLactual == "paginas"){
        cargarPosiciones();
        cargarPaginas();
    }
    
    if(URLactual == "registro"){
        cargarUsuarios();
    }

    if(URLactual == "hab"){
        cargarTipoHab();
        cargarCaracteristicasHab();
        cargarHabitaciones();
    }

    if(URLactual == "reservacion"){
        cargarReservaciones()
    }

    if(URLactual == "conserjeria"){
        cargarHabitacionesparaLimpieza();
    }

    if(URLactual == "clientes"){
        cargarClientes();
    }
    
    if(URLactual == "tablero"){
        consultarTopHabitaciones();
    }

    if(URLactual != ""){
        desactivarLinksSinPermisos();
    }
    var URLactual = window.location.pathname;
    id = URLactual.replace('/', '')
    elemento = this.document.getElementById(id)
    elemento.classList.add('active')

    padre = elemento.parentElement.parentElement
    padre.classList.add('show')

    padre2 = padre.parentElement.firstElementChild
    padre2.classList.remove('collapsed')
    padre2.setAttribute("aria-expanded", "true");
    
  });

function validarFormularios(formulario){
    formulario.preventDefault();
    elementos = formulario.srcElement.getElementsByTagName("input")
    for(i = 0; i < elementos.length; i++){
        if(elementos[i].required){
            if(elementos[i].type == "checkbox" || elementos[i].type == "radio"){
                if(!elementos[i].checked){
                    console.log("¡Formulario con datos requeridos no seleccionados!")
                    return false
                }
            }else if(elementos[i].value.length == 0){
                console.log("¡Formulario con datos requeridos vacíos!")
                return false
            }
        }
    }
    return true
}

function alertaFormularios(mensaje, tipoMensaje){

    new Notify ({
        status: tipoMensaje,
        title: mensaje,
        text: '',
        effect: 'slide',
        speed: 300,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 4000,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'right bottom',
        customWrapper: '',
      })
return
}

function limpiarFormulario(formulario){    
    formulario1 = document.getElementById(formulario.srcElement.id)
    formulario1.classList.remove('was-validated')
    
    $(`#${formulario.srcElement.id}`).trigger("reset"); 
}


$("#yourEmail").keyup(function(){
    var nombreUsuario = $("#yourEmail").val()
    nombreUsuario = nombreUsuario.split("@")
    nombreUsuario = nombreUsuario[0]
    $("#yourUsername").val(nombreUsuario.toLowerCase().replace("_", "").replace("-", ""));
});

function login(event){
    if(!validarFormularios(event))
        return

    usuario = document.getElementById("yourUsername").value
    contrasena = document.getElementById("yourPassword").value

    $.ajax({
        url: RUTACONSULTAS + "login" + ".php",
        method: "POST",
        data: {
            usuario: usuario.trim(),
            contrasena: contrasena.trim()
        },
    }).done(function(res) {
        try {
            if(res)
                window.location="tablero";
            else
                alertaFormularios("Usuario o contraseña incorrectos", "error")
                
        } catch (error) {
            console.log(error)
        }
    });
}

function cambiarContrasena(event){
    if(!validarFormularios(event))
        return
        
    nuevaContrasena = document.getElementById("nuevaContrasena").value
    confirmarNuevaContrasena = document.getElementById("confirmarNuevaContrasena").value

    if(nuevaContrasena != confirmarNuevaContrasena){
        alertaFormularios("La contraseña de confirmación no coincide con la nueva contraseña", "error")
        return
    }

    contrasenaActual = document.getElementById("contrasenaActual").value
    
    $.ajax({
        url: RUTACONSULTAS + "" + ".php",
        method: "POST",
        data: {
            usuario: usuario.trim(),
            contrasena: contrasena.trim()
        },
    }).done(function(res) {
        try {
            if(res)
                window.location="tablero";
            else
                alertaFormularios("Usuario o contraseña incorrectos", "error")
                
        } catch (error) {
            console.log(error)
        }
    });
}

// Busca los datos del usuario correspondiente al idUsuario
function buscarUsuario(idUsuario){ 
    $("#accionUsuarios").text("Actualizar usuario")
    $.ajax({
        url: RUTACONSULTAS + "buscarUsuario" + ".php",
        method: "POST",
        data: {
            idUsuario: idUsuario
        },
    }).done(function(res) {
        try {
            var datosEmpleado = JSON.parse(res)[0]
            if(datosEmpleado){
                document.getElementById("idEmpleado").value = idUsuario,
                document.getElementById("yourName").value = datosEmpleado.nombre,
                document.getElementById("YourPosition").value = datosEmpleado.idPosicion,
                document.getElementById("yourEmail").value = datosEmpleado.correo,
                document.getElementById("yourUsername").value = datosEmpleado.usuario,
                document.getElementById("horaEntrada").value = datosEmpleado.horaEntrada,
                document.getElementById("horaSalida").value = datosEmpleado.horaSalida,
                document.getElementById("SelectProvincia").value = datosEmpleado.idProvincia,
                document.getElementById("estadoUsuario").checked = datosEmpleado.estado,
                document.getElementById("yourPhone").value = datosEmpleado.celular
            }
                
        } catch (error) {
            $("#accionUsuarios").text("Registrar usuario") 
            console.log(error)
        }
    });
}

// Actualiza o crea usuarios
function ActualizarUsuario(event){
    if(!validarFormularios(event))
        return

    var idEmpleado = document.getElementById("idEmpleado").value,
    nombre = document.getElementById("yourName").value,
    idPosicion = document.getElementById("YourPosition").value,
    correo = document.getElementById("yourEmail").value,
    usuario = document.getElementById("yourUsername").value,
    contrasena = document.getElementById("yourPassword").value,
    horaEntrada = document.getElementById("horaEntrada").value,
    horaSalida = document.getElementById("horaSalida").value,
    idProvincia = document.getElementById("SelectProvincia").value,
    estadoUsuario = document.getElementById("estadoUsuario").checked,
    celular = document.getElementById("yourPhone").value,
    idUsuario = 0,
    imagenPerfil = ''

    if(idEmpleado != "")
        idUsuario = idEmpleado

    $.ajax({
        url: RUTACONSULTAS + "actualizarUsuario" + ".php",
        method: "POST",
        data: {
            idUsuario: idUsuario,
            nombre: nombre.trim(),
            idPosicion: idPosicion.trim(),
            correo: correo.trim(),
            usuario: usuario.trim(),
            imagenPerfil: imagenPerfil.trim(),
            contrasena: contrasena.trim(),
            horaEntrada: horaEntrada.trim(), 
            horaSalida: horaSalida.trim(), 
            idProvincia: idProvincia.trim(), 
            estado: estadoUsuario,
            celular: celular.trim()
        },
    }).done(function(res) {
        try {
            if(res){
                if(idUsuario > 0)
                    alertaFormularios("Usuario actualizado correctamente!", "success")
                else
                    alertaFormularios("Usuario creado correctamente!", "success")
                
                cargarUsuarios()
                limpiarFormulario(event)
            }else{
                alertaFormularios("Ocurrió un error al momento de crear el usuario!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error al momento de crear el usuario!", "warning")
            console.log(error)
        }
    });
} 

function ActualizarTipoHab(event){
    if(!validarFormularios(event))
        return

    var codTipoHab = document.getElementById("codTipoHab").value,
    nombreTipoHab = document.getElementById("nombreTipoHab").value,
    descripcionTipoHab = document.querySelector(".ql-editor > *")
    if(codTipoHab != "")
        codTipoHab = codTipoHab

    $.ajax({
        url: RUTACONSULTAS + "ActualizarTipoHab" + ".php",
        method: "POST",
        data: {
            idTipoHab: codTipoHab,
            nombreTipoHab: nombreTipoHab.trim(),
            descripcionTipoHab: descripcionTipoHab.innerHTML
        },
    }).done(function(res) {
        try {
            $(".ql-editor > *").html("")
            if(res){
                if(codTipoHab > 0)
                    alertaFormularios("Actualizado correctamente!", "success")
                else
                    alertaFormularios("Creado correctamente!", "success")

                cargarTipoHab()
                limpiarFormulario(event)
            }else{
                alertaFormularios("Ocurrió un error al momento de la creación!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error al momento de la creación!", "warning")
            console.log(error)
        }
    });
} 

function actualizarEstadoHab(idHab, idNivel, refInput){
    idInput = "selectEstadoHab" + refInput
    console.log(idInput)
    idEstado = document.getElementById(idInput).value

    $.ajax({
        url: RUTACONSULTAS + "actualizarEstadoHab" + ".php",
        method: "POST",
        data: {
            idHab: idHab,
            idNivel: idNivel,
            idEstado: idEstado
        },
    }).done(function(res) {
        try {
            if(res){
                alertaFormularios("Actualizado correctamente!", "success")
                cargarHabitacionesparaLimpieza()
            }else{
                alertaFormularios("Ocurrió un error!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error!", "warning")
            console.log(error)
        }
    });
}

function buscarHabitacion(idHab, idNivel){
    $.ajax({
        url: RUTACONSULTAS + "buscarHabitacion" + ".php",
        method: "POST",
        data: {
            idHab: idHab,
            idNivel: idNivel
        },
    }).done(function(res) {
        try {
            var datosHabitacion = JSON.parse(res)[0]
            if(datosHabitacion){
                document.getElementById('formularioRegistroHab').reset();
                document.getElementById("idHab").value = idHab
                document.getElementById("selectNivelHab").value = datosHabitacion.idNivel
                document.getElementById("selectTipoHab").value = datosHabitacion.idTipoHab
                document.getElementById("selectEstadoHab").value = datosHabitacion.idEstadoHab
                document.getElementById("precioTempAlta").value = datosHabitacion.precioTempAlta
                document.getElementById("precioTempBaja").value = datosHabitacion.precioTempBaja
                document.getElementById("cantidadAdultosHab").value = datosHabitacion.cantidadAdultosHab
                document.getElementById("cantidadNinosHab").value = datosHabitacion.cantidadNinosHab
                
                listaIncluye = datosHabitacion.incluye.split(",")
                for (let index = 0; index < listaIncluye.length; index++) {
                    multipleCancelButton.setChoiceByValue(listaIncluye[index].toString())
                }
            }
                
        } catch (error) {
            console.log(error)
        }
    });
}

function ActualizarHab(event){
    if(!validarFormularios(event))
        return

    var idHab = document.getElementById("idHab").value,
    selectNivelHab = document.getElementById("selectNivelHab").value,
    selectTipoHab = document.getElementById("selectTipoHab").value,
    selectEstadoHab = document.getElementById("selectEstadoHab").value,
    precioTempBaja = document.getElementById("precioTempBaja").value,
    precioTempAlta = document.getElementById("precioTempAlta").value,
    cantidadAdultosHab = document.getElementById("cantidadAdultosHab").value,
    cantidadNinosHab = document.getElementById("cantidadNinosHab").value,
    incluye = document.getElementById("choices-multiple-remove-button").selectedOptions

    listaIncluye = ""
    for(let i = 0; i<incluye.length; i++){
        if(i == incluye.length - 1)
            listaIncluye += incluye[i].value
        else
            listaIncluye += incluye[i].value + ','
    }

    if(idHab != "")
        idHab = idHab

        var formData = new FormData();
        
        var files = $('#imagenHab')[0].files[0];
        formData.append('file',files);
        formData.append('idHab',idHab);
        formData.append('selectNivelHab',selectNivelHab);
        formData.append('selectTipoHab',selectTipoHab);
        formData.append('selectEstadoHab',selectEstadoHab);
        formData.append('precioTempAlta',precioTempAlta);
        formData.append('precioTempBaja',precioTempBaja);
        formData.append('cantidadAdultosHab',cantidadAdultosHab);
        formData.append('cantidadNinosHab',cantidadNinosHab);
        formData.append('listaIncluye',listaIncluye.toString());

        
    $.ajax({
        url: RUTACONSULTAS + "ActualizarHab" + ".php",
        method: "POST",
        data: formData,
        cache: false, 
        contentType: false,
        processData: false
    }).done(function(res) {
        try {
            console.log(res)
            if(res){
                if(idHab > 0)
                    alertaFormularios("Actualizado correctamente!", "success")
                else
                    alertaFormularios("Creado correctamente!", "success")

                cargarHabitaciones()
                limpiarFormulario(event)
            }else{
                alertaFormularios("Ocurrió un error al momento de la creación!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error al momento de la creación!", "warning")
            console.log(error)
        }
    });
} 


function ActualizarCaracteristicaHab(event){
    if(!validarFormularios(event))
        return

    var idCaractHab = document.getElementById("idCaractHab").value,
    descCaracteristica = document.getElementById("descCaracteristica").value,
    iconoCaracteristica = document.getElementById("iconoCaracteristica").value

    $.ajax({
        url: RUTACONSULTAS + "ActualizarCaracteristicaHab" + ".php",
        method: "POST",
        data: {
            idCaractHab: idCaractHab,
            descCaracteristica: descCaracteristica.trim(),
            iconoCaracteristica: iconoCaracteristica.trim()
        },
    }).done(function(res) {
        try {
            if(res){
                alertaFormularios("Se guardó correctamente!", "success")
                cargarCaracteristicasHab()
                limpiarFormulario(event)
            }else{
                alertaFormularios("Ocurrió un error al momento guardar la información!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error al momento guardar la información! ", "warning")
            console.log(error)
        }
    });
} 

// Activa los filtros de las tablas
function activarDataTable(){
    const dataTable = new simpleDatatables.DataTable(".datatable", {
        searchable: true,
        fixedHeight: true,
        paging: true,
        sortable: true,
        fixedHeight: true,
        fixedColumns: true
    })
}

// Cambiar formato de 24H a 12H
function horario12H(hora) {
    horario = hora.split(":")
    var hora = horario[0];
    var minutos = horario[1];
    var formato = hora >= 12 ? 'PM' : 'AM'; 
    hora = hora % 12; 
    hora = hora ? hora : 12; 
    minutos = minutos < 10 ? minutos : minutos;
    
    return hora + ':' + minutos + ' ' + formato;
}

// Carga todos los usuarios y los muestra en una tabla de la página registro
function cargarUsuarios(){
    $.ajax({
        url: RUTACONSULTAS + "consultaUsuarios" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarUsuariosRegistrados")
            
            let datos = ""
            // Lista todos los datos de los usuarios y los almacena en la variable datos
            result.forEach(element => {
                

                carga = `
                <tr>
                    <th scope="row" class="pointer text-primary link-danger" onclick="buscarUsuario(${element.idUsuario})"><span>${element.idUsuario}</span></th>
                    <td>${element.nombre}</td>
                    <td>${element.correo}</td>
                    <td>${element.usuario}</td>
                    <td>${element.nombrePuesto}</td>
                    <td>${element.celular}</td>
                    <td>${horario12H(element.horaEntrada)}</td>
                    <td>${horario12H(element.horaSalida)}</td>
                    <td>${element.nombreProvincia}</td>
                    <td>${(element.estado)? '<span class="badge bg-success">Activo</span>': '<span class="badge bg-danger">Desvinculado</span>'}</td>
                </tr>
                `
                datos += carga
            });


            contenedor = `<div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Usuarios <span>| Listado de usuarios</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Hora entrada</th>
                    <th scope="col">Hora salida</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                    <tbody>
                        ${datos}
                    </tbody>
                </table>
                </div>
              </div>
              `
            contenedorExis.innerHTML = contenedor
            activarDataTable();

        } catch (error) {
            console.log(error)
        }
    });
}

function cargarClientes(){
    $.ajax({
        url: RUTACONSULTAS + "consultaClientes" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarClientesRegistrados")
            
            let datos = ""
            // Lista todos los datos de los usuarios y los almacena en la variable datos
            result.forEach(element => {

                carga = `
                <tr>
                    <th scope="row"><span>${element.idCliente}</span></th>
                    <td>${element.nombreCliente}</td>
                    <td>${element.apellidosCliente}</td>
                    <td>${element.correoCliente}</td>
                    <td>${element.telefonoCliente}</td>
                    <td>${element.desTipoDocumento}</td>
                    <td>${element.numDocumento}</td>
                    <td>${element.cantReservas}</td>
                </tr>
                `
                datos += carga
            });


            contenedor = `<div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Clientes <span>| Listado de clientes</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo Documento</th>
                    <th scope="col">Num. Documento</th>
                    <th scope="col">Cant. reservas</th>
                  </tr>
                </thead>
                    <tbody>
                        ${datos}
                    </tbody>
                </table>
                </div>
              </div>
              `
            contenedorExis.innerHTML = contenedor
            activarDataTable();

        } catch (error) {
            console.log(error)
        }
    });
}

function cargarHabitaciones(){
    $.ajax({
        url: RUTACONSULTAS + "consultaHabitaciones" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarHabitaciones")
            
            let datos = ""
            result.forEach(element => {
                listaElementosInluye = ""
                datosIncluye = element.incluye
                datosIncluye.forEach(elementoIncluye => {
                    elementoIncluye = elementoIncluye.split(",")
                    listaElementosInluye += `<li><i class="${elementoIncluye[1]}"></i> ${elementoIncluye[0]}</li>`
                    
                });
                carga = `
                <div class="col">
                <div class="card h-100 position-relative">
                <div class="position-absolute top-0 end-0 btnEditaHab bg-warning" onclick="buscarHabitacion(${element.idHabitacion}, ${element.idNivel})">
                    <i class="bi bi-pencil text-white"></i>
                </div>
                  <img src="assets/img/habitaciones/${(element.imagen == ''? 'imagen-no-disponible.png' : element.imagen)}" class="card-img-top" alt="">
                  <div class="card-body py-0 pb-0">
                    <h5 class="card-title pb-1 m-0">Habitación ${element.nivelNum}${(element.idHabitacion < 10)? '0'+element.idHabitacion: element.idHabitacion}</h5>
                    <p class="card-text mb-0"><strong>Tipo:</strong> ${element.nombreTipoHab}</p>
                    <!-- <p class="card-text mb-1"><strong>Nivel:</strong> ${element.nivelTexto}</p> -->
                    <p class="card-text mb-0"><strong>Precio alta:</strong> ${element.precioTempAlta}</p>
                    <p class="card-text mb-0"><strong>precio baja:</strong> ${element.precioTempBaja}</p>
                    <p class="card-text mb-0"><strong>Adultos:</strong> ${element.cantidadAdultosHab}</p>
                    <p class="card-text mb-0"><strong>Niños:</strong> ${element.cantidadNinosHab}</p>
                    
                    <p class="card-text mb-0"><strong>Incluye:</strong></p>
                    <ul class="listaIncluyeHab mt-1">
                        ${
                            listaElementosInluye
                        }
                    </ul>
                  </div>
                  <div class="card-footer py-0 text-center" style="background-color: ${element.colorEstado};">
                    <small class="fw-bold text-black">${element.desEstado}</small>
                  </div>
                </div>
                </div>
                `
                datos += carga
            });

            contenedor = `<div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Habitaciones <span>| Listado de habitaciones</span></h5>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    ${datos}
                </div>
                </div>
              </div>
              `

              contenedorExis.innerHTML = contenedor

        } catch (error) {
            console.log(error)
        }
    });
}

function cargarHabitacionesparaLimpieza(){
    $.ajax({
        url: RUTACONSULTAS + "cargarHabitacionesparaLimpieza" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("cargarHabitacionesparaLimpieza")
            
            let datos = ""
            result.forEach(element => {
                
                carga = `
                <div class="col">
                <div class="card h-100 position-relative">
                <div class="position-absolute top-0 end-0 btnEditaHab bg-warning" onclick="buscarHabitacion(${element.idHabitacion}, ${element.idNivel})">
                    <i class="bi bi-pencil text-white"></i>
                </div>
                  <img src="assets/img/habitaciones/${(element.imagen == ''? 'imagen-no-disponible.png' : element.imagen)}" class="card-img-top" alt="">
                  <div class="card-body py-0 pb-0">
                    <h5 class="card-title pb-1 m-0">Habitación ${element.nivelNum}${(element.idHabitacion < 10)? '0'+element.idHabitacion: element.idHabitacion}</h5>
                    <p class="card-text mb-0"><strong>${element.nombreTipoHab}</strong></p>
                    <p class="card-text mb-0 mt-1"><i class="fa-solid fa-location-dot"></i> ${element.nivelTexto}, habitación ${element.nivelNum}</p>
                    <hr>
                    <form class="row">
                        <div class="col-10">
                            <label for="selectEstadoHabN${element.idNivel}H${element.idHabitacion}" class="form-label mb-0"><strong>Estado habitación</strong></label>
                                <select class="form-select" aria-label="Default select example" name="selectEstadoHabN${element.idNivel}H${element.idHabitacion}" id="selectEstadoHabN${element.idNivel}H${element.idHabitacion}" required>
                                    <option value="4" selected>Limpieza</option>
                                    <option value="1">Disponible</option>
                                    <option value="5">Mantenimiento</option>
                                </select>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-end">
                            <button class="btn btn-success" type="button" onclick="actualizarEstadoHab(${element.idHabitacion}, ${element.idNivel}, 'N${element.idNivel}H${element.idHabitacion}')"><i class="fa-duotone fa-floppy-disks"></i></button>
                        </div>
                    </form>
                  </div>
                </div>
                </div>
                `
                datos += carga
            });

            contenedor = `<div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Habitaciones <span>| Pendientes por limpieza</span></h5>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    ${datos}
                </div>
                </div>
              </div>
              `

              contenedorExis.innerHTML = contenedor

        } catch (error) {
            console.log(error)
        }
    });
}


function cargarReservaciones(){
    $.ajax({
        url: RUTACONSULTAS + "consultarReservas" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listaReservas")
            
            let datos = ""
            result.forEach(element => {
                console.log(element)
                carga = `
                <div class="col">
                <div class="card h-100">
                  <div class="card-body py-0 pb-0">
                    <h5 class="card-title pb-1 m-0">${element.nombreCliente} ${element.apellidosCliente}</h5>
                    <p class="card-text mb-0"><strong>Fecha llegada:</strong> ${element.fecha_llegada}</p>
                    <p class="card-text mb-1"><strong>Fecha partida:</strong> ${element.fecha_partida}</p>
                  </div>
                  <div class="card-footer py-0 text-center">
                    <small class="fw-bold text-primary" style="font-size: 18px;">Monto RD$ ${element.totalPrecio}</small>
                  </div>
                </div>
                </div>
                `
                datos += carga
            });

            contenedor = `<div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Habitaciones <span>| Listado de habitaciones</span></h5>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    ${datos}
                </div>
                </div>
              </div>
              `

              contenedorExis.innerHTML = contenedor

        } catch (error) {
            console.log(error)
        }
    });
}

function consultarTopHabitaciones(){
    $.ajax({
        url: RUTACONSULTAS + "consultarTopHabitaciones" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarTopHabitaciones")
            
            let datos = ""
            result.forEach(element => {
                carga = `
                <tr>
                    <th scope="row"><img src="assets/img/habitaciones/${element.imagen}" alt=""></th>
                    <td class="fw-bold">${element.idNivel}${(element.idHabitacion < 10)? '0'+element.idHabitacion: element.idHabitacion}</td>
                    <td class="text-primary fw-bold">${element.nombreTipoHab}</td>
                    <td class="fw-bold">${element.cantReservas}</td>
                </tr>
                `
                datos += carga
            });

            contenedor = `${datos}`

              contenedorExis.innerHTML = contenedor

        } catch (error) {
            console.log(error)
        }
    });
}


function cargarPosiciones(){
    $.ajax({
        url: RUTACONSULTAS + "consultaPosiciones" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("paginaPosiciones")
            contenedorExis.innerHTML = ""
            result.forEach(element => {
                carga = `<div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="idPos-${element.idPosicion}">
                            <label class="form-check-label" for="idPos-${element.idPosicion}">${element.nombrePuesto}</label>
                        </div>`
                contenedorExis.innerHTML += carga
            });
                
        } catch (error) {
            console.log(error)
        }
    });
}

function cargarPaginas(){
    $.ajax({
        url: RUTACONSULTAS + "consultaPaginas" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarPaginas")
            
            contenedorExis.innerHTML = ""
            contador = 0
            result.forEach(element => {
                contador++
                
                carga = `<tr class="text-center">
                <th scope="row">${contador}</th>
                <td>${element.pagina}</td>
                <td>
                    <!--<span class="text-primary" style="cursor:pointer;" onclick='seleccionarPagina({"paginaNombre":"${element.pagina}", "idPagina": ${element.idPagina}})'>Seleccionar</span>-->
                    <span onclick='seleccionarPagina({"paginaNombre":"${element.pagina}", "idPagina": ${element.idPagina}})' class="btn btn-warning btn-sm text-white" title="Editar"><i class="bi bi-pencil"></i></span>
                    <!--<span onclick='EliminarPagina(${element.idPagina})' class="btn ${(element.estado == 1? 'btn-success' : 'btn-secondary')} btn-sm" title="${(element.estado == 1? 'Desactivar' : 'Activar')}">
                    <i class="bi ${(element.estado == 1? 'bi-record-circle-fill' : 'bi-record-circle')}"></i></span> -->
                </td>
                </tr>`
                contenedorExis.innerHTML += carga
            });
            
        } catch (error) {
            console.log(error)
        }
    });
}


function cargarCaracteristicasHab(){
    $.ajax({
        url: RUTACONSULTAS + "consultaCaracteristicasHab" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listarCaracteristicasHab")
            
            contenedorExis.innerHTML = ""
            result.forEach(element => {
                
                carga = `<tr class="text-center">
                <td>${element.descCaracteristica}</td>
                <td><i class="${element.iconoCaracteristica}"></i></td>
                <td>
                    <span onclick='editarCaracteristicasHab({"idCaracteristica":"${element.idCaracteristica}", "descCaracteristica": "${element.descCaracteristica}", "iconoCaracteristica": "${element.iconoCaracteristica}"})' class="btn btn-warning btn-sm text-white" title="Editar"><i class="bi bi-pencil"></i></span>
                </td>
                </tr>`
                contenedorExis.innerHTML += carga
            });
            
        } catch (error) {
            console.log(error)
        }
    });
}

function editarCaracteristicasHab(datos){
    $("#idCaractHab").val(datos.idCaracteristica)
    $("#descCaracteristica").val(datos.descCaracteristica)
    $("#iconoCaracteristica").val(datos.iconoCaracteristica)
}

function cargarTipoHab(){
    $.ajax({
        url: RUTACONSULTAS + "consultaTipoHab" + ".php",
        method: "POST",
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            contenedorExis = document.getElementById("listadoTipoHab")
            
            contenedorExis.innerHTML = ""
            contador = 0
            result.forEach(element => {
                contador++
                
                carga = `
                <div class="accordion-item">
                  <h2 class="accordion-header" id="h-h-${element.idTipoHab}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f-c-${element.idTipoHab}" aria-expanded="false" aria-controls="f-c-${element.idTipoHab}">
                    <strong>
                      ${element.nombreTipoHab}
                    </strong>
                    </button>
                  </h2>
                  <div id="f-c-${element.idTipoHab}" class="accordion-collapse collapse" aria-labelledby="h-h-${element.idTipoHab}" data-bs-parent="#listadoTipoHab">
                    <div class="accordion-body">${element.descripcionTipoHab}</div>
                    <span onclick='seleccionarTipoHab({"idTipoHab":"${element.idTipoHab}", "nombreTipoHab": "${element.nombreTipoHab}", "descripcionTipoHab": "${element.descripcionTipoHab}"})' class="btn btn-warning btn-sm text-white mb-2" title="Editar"><i class="bi bi-pencil"></i> Editar</span>
                  </div>
                </div>
                `
                contenedorExis.innerHTML += carga
            });
            
        } catch (error) {
            console.log(error)
        }
    });
}

function seleccionarPagina(datos){
    cargarPermisos(datos.idPagina)
    $("#idPagina").val(datos.idPagina)
    $("#URLPagina").val(datos.paginaNombre)
}

function seleccionarTipoHab(datos){
    $("#codTipoHab").val(datos.idTipoHab)
    $("#nombreTipoHab").val(datos.nombreTipoHab)
    $(".ql-editor > *").html(datos.descripcionTipoHab)
}


function ElementoEnArreglo(objeto, elemento){
    array =Object.values(objeto)
    for(i = 0; i < array.length; i++){
        if(array[i] == elemento)
            return true
    }
    return false
}

function cargarPermisos(idPagina){
    $.ajax({
        url: RUTACONSULTAS + "consultaPermisos" + ".php",
        method: "POST",
        data: {
            idPagina: idPagina
        },
    }).done(function(res) {
        try {
            result = JSON.parse(res)
            
            elementos = document.getElementById("paginaPosiciones").childNodes
            elementos.forEach(element => {
                id = element.children[0].id.split("-")
                input = document.getElementById("idPos-"+id[1])
                
                if(ElementoEnArreglo(result, id[1])){
                    input.checked = true
                }else{
                    input.checked = false
                }
            });
                
        } catch (error) {
            console.log(error)
            elementos.forEach(element => {
                id = element.children[0].id.split("-")
                input = document.getElementById("idPos-"+id[1])
                input.checked = false
            });
        }
    });
}

function ActualizarPermisos(idPagina, idPosicion, estado){

    $.ajax({
        url: RUTACONSULTAS + "actualizarPermisos" + ".php",
        method: "POST",
        data: {
            idPagina: idPagina,
            idPosicion: idPosicion,
            estado: estado
        },
    }).done(function(res) {
        try {

        } catch (error) {
            console.log(error)
        }
    });
} 

function ActualizarPaginas(event){
    if(!validarFormularios(event))
        return

        let datos = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(event.target))));
        info = JSON.stringify(datos);
        result = JSON.parse(info)
        id = document.getElementById("idPagina").value
        if(id == "")
            id = 0

    $.ajax({
        url: RUTACONSULTAS + "actualizarPaginas" + ".php",
        method: "POST",
        data: {
            idPagina: id,
            pagina: result.urlPagina.trim()
        },
    }).done(function(res) {
        try {
            if(res){
                alertaFormularios("Página agregada/actualizada correctamente!", "success")
                cargarPaginas()

                elementos = document.getElementById("paginaPosiciones").childNodes

                contador = 0
                elementos.forEach(element => {
                    id = element.children[0].id.split("-")
                    input = document.getElementById("idPos-"+id[1])
                    ActualizarPermisos(res, id[1], (input.checked)? 1: 0)
                    contador++
                });
                desactivarLinksSinPermisos()
                limpiarFormulario(event)


            }else{
                alertaFormularios("Ocurrió un error al momento de registrar esta página!", "warning")
            }
        } catch (error) {
            alertaFormularios("Ocurrió un error al momento de registrar esta página!", "warning")
            console.log(error)
        }
    });
} 

function obtenerFechaHoy(){
    let date = new Date()
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    
    if(month < 10){
        fechaHoy = `${year}-0${month}-${day}`
    }else if(day <10){
        fechaHoy = `${year}-${month}-0${day}`
    }else{
        fechaHoy = `${year}-${month}-${day}`
    }

    return fechaHoy
}

function vistaPreviaImg(event, querySelector){
	const input = event.target;
	$vistaPreviaImagen = document.querySelector(querySelector);
	if(!input.files.length) return
	archivo = input.files[0];
	objectURL = URL.createObjectURL(archivo);
	$vistaPreviaImagen.src = objectURL;
}

function noFoto(querySelector){
	$vistaPreviaImagen = document.querySelector(querySelector);
	$vistaPreviaImagen.src = "assets/img/perfil/nofoto.png";
}


function EliminarPagina(idPagina){

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger me-2'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Sí, borrar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {


            $.ajax({
                url: RUTACONSULTAS + "eliminarPagina" + ".php",
                method: "POST",
                data: {
                    idPagina: idPagina
                },
            }).done(function(res) {
                try {
                    if(res){
                        cargarPaginas();
                    }
                } catch (error) {
                    console.log(error)
                }
            });


          swalWithBootstrapButtons.fire( 'Eliminado!', 'success')
        }
      })
      
} 