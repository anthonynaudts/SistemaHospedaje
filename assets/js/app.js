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
                    document.getElementById(pagina.pagina).setAttribute("onclick", "return false;");
                    
                    // [ ] asignar onclick return false a cada página para que desactive el click
                }else{
                    document.getElementById(pagina.pagina).classList.remove("desactivarLink")
                    document.getElementById(pagina.pagina).setAttribute("onclick", "return true;");
                }
            });
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
    
    if(urlPagina != ""){
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

function alertaFormularios(contenedor, mensaje, tipoMensaje){
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

    //[ ] Eliminar alerta después de 5 segundos

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
    $("#yourUsername").val(nombreUsuario);
});

function login(event){
    // event.preventDefault();
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
                alertaFormularios(event, "Usuario o contraseña incorrectos", "danger")
                
        } catch (error) {
            console.log(error)
        }
    });
}

function ActualizarUsuario(event){
    if(!validarFormularios(event))
        return

    var nombre = document.getElementById("yourName").value,
    idPosicion = document.getElementById("YourPosition").value,
    correo = document.getElementById("yourEmail").value,
    usuario = document.getElementById("yourUsername").value,
    contrasena = document.getElementById("yourPassword").value,
    idUsuario = 0,
    imagenPerfil = ''

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
            contrasena: contrasena.trim()
        },
    }).done(function(res) {
        try {
            if(res){
                alertaFormularios(event, "Usuario creado correctamente!", "success")
                limpiarFormulario(event)
            }else{
                alertaFormularios(event, "Ocurrió un error al momento de crear el usuario!", "warning")
            }
        } catch (error) {
            alertaFormularios(event, "Ocurrió un error al momento de crear el usuario!", "warning")
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
                    <span onclick='seleccionarPagina({"paginaNombre":"${element.pagina}", "idPagina": ${element.idPagina}})' class="btn btn-warning btn-sm text-white" title="Eeditar"><i class="bi bi-pencil"></i></span>
                    <span onclick='EliminarPagina(${element.idPagina})' class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash"></i></span>
                </td>
                </tr>`
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
                alertaFormularios(event, "Página agregada/actualizada correctamente!", "success")
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
                alertaFormularios(event, "Ocurrió un error al momento de registrar esta página!", "warning")
            }
        } catch (error) {
            alertaFormularios(event, "Ocurrió un error al momento de registrar esta página!", "warning")
            console.log(error)
        }
    });
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



function prueba(){
    elementos = document.getElementById("paginaPosiciones").childNodes
                let text = '{"posiciones":[]}';
                const obj = JSON.parse(text);
                // obj.posiciones[0]={idPosicion:3, estado: false}

                contador = 0
                elementos.forEach(element => {
                    id = element.children[0].id.split("-")
                    input = document.getElementById("idPos-"+id[1])
                    obj.posiciones[contador]={idPosicion:id[1], estado: input.checked}
                    contador++
                });

                // console.log(obj.posiciones)
}






// let datos = Object.fromEntries(new FormData(e.target));
// JSON.stringify(datos);



// event.preventDefault();
//         console.log(event)
//         let datos = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(event.target))));
//         // info = JSON.stringify(datos);
//         // result = JSON.parse(info)
//         console.log(datos)