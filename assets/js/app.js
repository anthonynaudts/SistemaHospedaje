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
    if(URLactual == "tablero"){
        this.document.getElementById("tablero").classList.remove("collapsed")
        return
    }
    
    id = URLactual
    elemento = this.document.getElementById(id)
    elemento.classList.add('active')

    padre = elemento.parentElement.parentElement
    padre.classList.add('show')

    padre2 = padre.parentElement.firstElementChild
    padre2.classList.remove('collapsed')
    padre2.setAttribute("aria-expanded", "true");
    // alert("'Todos los recursos terminaron de cargar!");
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
                limpiarFormulario(event)
            }
            console.log(res)
        } catch (error) {
            console.log(error)
        }
    });
}


