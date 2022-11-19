const RUTACONSULTAS = "./assets/db/peticiones/"; 

function desactivarLinksSinPermisos(){
    //[p] Buscar con queryselector los elementos id de mantenimiento ej, y si es menor que 2 desactivar todos
    $.ajax({
        url: RUTACONSULTAS + "consultaPermisosGeneral" + ".php",
        method: "POST"
    }).done(function(res) {
        try {

            var result = JSON.parse(res);
            result.forEach(pagina => {
                if(pagina.estado != 1){
                    document.getElementById(pagina.pagina).classList.add("desactivarLink")
                    // document.getElementById(pagina.pagina).setAttribute("onclick", "return false;");
                    
                    // [ ] asignar onclick return false a cada página para que desactive el click
                }else{
                    document.getElementById(pagina.pagina).classList.remove("desactivarLink")
                    // document.getElementById(pagina.pagina).setAttribute("onclick", "return true;");
                }
            });


            var listaModulos = document.querySelectorAll(".modulo")
            // const myElement = document.getElementById('foo');
            listaModulos.forEach(element => {
                // console.log(element)
                // console.log("Elementos Módulo = " +element.childElementCount)
                let noActivos = 0
                for (const child of element.children) {
                    // console.log(child.classList == "desactivarLink");
                    (child.classList == "desactivarLink")? noActivos ++: ''
                }
                // console.log("No activos = " + noActivos)
                if(element.childElementCount == noActivos)
                    element.parentElement.style.display = "none"
                else
                    element.parentElement.style.display = "block"
            });
            // listaModulos = listaModulos.children
            // console.log(listaModulos) 

            document.getElementById("loader").classList.remove("d-flex")
            document.getElementById("loader").classList.add("d-none")
            document.getElementById("menu").classList.remove("d-none")


        } catch (error) {
            console.log(error)
        }
    });
}

// [p]Validar si correo existe

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
        // return
    }
    if(URLactual == "perfil"){
        this.document.getElementById("perfil").classList.remove("collapsed")
        // return
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
    }

    if(URLactual != ""){
        desactivarLinksSinPermisos();
    }
    
    id = URLactual
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
//[p] nueva alerta

    tiposAlertas = {
        "success":{
            clase: "alert-success",
            icono: "bi-check-circle"
        },
        "danger":{
            clase: "alert-danger",
            icono: "bi-exclamation-octagon"
        },
        "info":{
            clase: "alert-info",
            icono: "bi-info-circle"
        },
        "warning":{
            clase: "alert-warning",
            icono: "bi-exclamation-triangle"
        }
    };

    

    contenedorExis = document.getElementById(contenedor.srcElement.id)
// var capa = document.getElementById("capa");
    var div = document.createElement("div");
    div.classList.add("alert", tiposAlertas[tipoMensaje].clase, "alert-dismissible", "fade", "show")
    div.setAttribute("role", "alert")
//   < class="alert alert-danger alert-dismissible fade show" role="alert">
    div.innerHTML = `
        <i class="bi ${tiposAlertas[tipoMensaje].icono} me-1"></i>
        ${mensaje}
        <button id="botonCerrarAlertas" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;

    contenedorExis.insertBefore(div, contenedorExis.getElementsByTagName('div')[0])
    
    setTimeout(()=>{
        document.getElementById("botonCerrarAlertas").click()
    }, 3500)


}

function limpiarFormulario(formulario){
    // formulario.preventDefault();
    // console.log(formulario.srcElement)
    
    formulario1 = document.getElementById(formulario.srcElement.id)
    formulario1.classList.remove('was-validated')
    // console.log(formulario1.classList)
    
    $(`#${formulario.srcElement.id}`).trigger("reset"); 
    // $(`#${formulario.srcElement.id}`).removeClass('was-validated');
    // $(`#${formulario.srcElement.id}`).addClass('needs-validation');
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

    // [p] Hacer procedicimiento almacenado que verifique si la contraseña actual coninciden, de lo contrario enviar error

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
            // console.table(result)
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


function cargarPosiciones(){
    $.ajax({
        url: RUTACONSULTAS + "consultaPosiciones" + ".php",
        method: "POST",
        // data: {
        //     usuario: usuario.trim(),
        //     contrasena: contrasena.trim()
        // },
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
            // console.table(result)
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
                    <span class="btn btn-warning btn-sm text-white mb-2" title="Editar"><i class="bi bi-pencil"></i> Editar</span>
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
            console.log(error) //[ ] muestra error cuando no tiene permisos
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
            // if(res)
            // console.log(res)

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
        // console.log(result.urlPagina)
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
                //[ ]Json resultado para tomar id

                contador = 0
                elementos.forEach(element => {
                    id = element.children[0].id.split("-")
                    input = document.getElementById("idPos-"+id[1])
                    ActualizarPermisos(res, id[1], (input.checked)? 1: 0)
                    contador++
                });
                // cargarPermisos(res)
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
            // let fechaHoy = ''
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


function EliminarPagina(idPagina){ //[ ]Confirmar eliminar

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






// let datos = Object.fromEntries(new FormData(e.target));
// JSON.stringify(datos);



// event.preventDefault();
//         console.log(event)
//         let datos = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(event.target))));
//         // info = JSON.stringify(datos);
//         // result = JSON.parse(info)
//         console.log(datos)