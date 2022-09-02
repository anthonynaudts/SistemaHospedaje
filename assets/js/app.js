const RUTACONSULTAS = "./assets/db/peticiones/"; 

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
        return
    }
    if(URLactual == "perfil"){
        this.document.getElementById("perfil").classList.remove("collapsed")
        return
    }

    if(URLactual == "paginas"){
        cargarPosiciones();
        cargarPaginas();
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

    contenedorExis = document.getElementById(contenedor.srcElement.id)
// var capa = document.getElementById("capa");
    var div = document.createElement("div");
    div.classList.add("alert", tiposAlertas[tipoMensaje].clase, "alert-dismissible", "fade", "show")
    div.setAttribute("role", "alert")
//   < class="alert alert-danger alert-dismissible fade show" role="alert">
    div.innerHTML = `
        <i class="bi ${tiposAlertas[tipoMensaje].icono} me-1"></i>
        ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
// contenedorExis.appendChild(div);
    contenedorExis.insertBefore(div, contenedorExis.getElementsByTagName('div')[0])

}

function limpiarFormulario(formulario){
    // formulario.preventDefault();
    // console.log(formulario.srcElement)
    
    formulario1 = document.getElementById(formulario.srcElement.id)
    formulario1.classList.remove('was-validated')
    console.log(formulario1.classList)
    
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
                <td><span class="text-primary" style="cursor:pointer;" onclick='seleccionarPagina({"paginaNombre":"${element.pagina}", "idPagina": ${element.idPagina}})'>Seleccionar</span></td>
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
        if(array[i].idPosicion == elemento)
            return true
        else
            return false
    }
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
            // console.log(result[0]);

            elementos = document.getElementById("paginaPosiciones").childNodes
            
            contador = 0
            elementos.forEach(element => {
                id = element.children[0].id.split("-")
                input = document.getElementById("idPos-"+id[1])
                if(ElementoEnArreglo(result, id[1])){
                    input.checked = true
                }else{
                    input.checked = false
                }
                contador++
            });
                
        } catch (error) {
            console.log(error)
        }
    });
}



// let datos = Object.fromEntries(new FormData(e.target));
// JSON.stringify(datos);



// event.preventDefault();
//         console.log(event)
//         let datos = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(event.target))));
//         // info = JSON.stringify(datos);
//         // result = JSON.parse(info)
//         console.log(datos)