const btn_cargar = document.querySelector('#btn-cargar'),
    loader = document.querySelector('#loader'),
    error_box = document.querySelector('#error_box'),
    formulario = document.querySelector('#form-usuarios');

btn_cargar.addEventListener('click', cargarUsuarios);

formulario.addEventListener('submit', (event) => {
    event.preventDefault();
    let datos = new FormData();
    let nombre = document.querySelector('#nombre').value,
        edad = document.querySelector('#edad').value,
        pais = document.querySelector('#pais').value,
        email = document.querySelector('#mail').value;
    if (nombre == '' || edad == '' || pais == '' || email == '') {
        let texto = 'Todos los campos son obligatorios';
        activaError(texto);
    } else {
        datos.append('nombre', nombre);
        datos.append('edad', edad);
        datos.append('pais', pais);
        datos.append('mail', email);
        ingresarUsuario(datos);
        limpiarFormulario();
    }
});
// Función que cargara la información de los usuarios de la BD
function cargarUsuarios() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/consultaUsuario.php', true);
    loader.classList.add('active');
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let datos = JSON.parse(xhr.responseText);
            let respuesta = document.querySelector('#tabla');
            respuesta.innerHTML = '';
            datos.forEach(elemento => {
                let fila = document.createElement('tr');
                fila.innerHTML += `<td>${elemento.id_usuario}</td>`;
                fila.innerHTML += `<td>${elemento.nombres}</td>`;
                fila.innerHTML += `<td>${elemento.edad}</td>`;
                fila.innerHTML += `<td>${elemento.pais}</td>`;
                fila.innerHTML += `<td>${elemento.email}</td>`;
                respuesta.appendChild(fila);
            });
        }
        loader.classList.remove('active');
    }
    xhr.send();
}
// Función para ingresar usuarios a la BD
function ingresarUsuario(data) {
    console.log(...data);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/ingresarUsuario.php', true);
    xhr.onload = () => {
        cargarUsuarios();
    }
    xhr.readyState = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = JSON.parse(xhr.responseText);
            if (response.error == 'false') {
                let texto = 'Se ha producido un error';
                activaError(texto);
            }
        }
    }
    xhr.send(data);
}
// Función para presentar la alerta de error
function activaError(texto) {
    setTimeout(() => {
        error_box.textContent = texto;
        error_box.classList.add('active');
        setTimeout(() => {
            error_box.textContent = '';
            error_box.classList.remove('active');
        }, 3000);
    }, 100);
}
// Función para limpiar el formulario de registro de usuarios
function limpiarFormulario() {
    formulario.reset();
}