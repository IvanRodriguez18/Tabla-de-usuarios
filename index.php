<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor">
        <header>
            <h1>Tabla de Usuarios</h1>
            <button type="button" class="btn btn-cargar" id="btn-cargar">Cargar Usuarios</button>
        </header>
        <main>
            <form id="form-usuarios" class="form-usuarios">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)">
                <input type="text" name="edad" id="edad" placeholder="Edad">
                <input type="text" name="pais" id="pais" placeholder="Pais">
                <input type="email" name="mail" id="mail" placeholder="Correo electrónico">
                <button type="submit" class="btn">Agregar</button>
            </form>
            <div class="error_box" id="error_box"></div>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre(s)</th>
                        <th>Edad</th>
                        <th>Pais</th>
                        <th>Correo electrónico</th>
                    </tr>
                </thead>
                <tbody id="tabla"></tbody>
            </table>
            <div class="loader" id="loader"></div>
        </main>
    </div>
    <script src="js/app.js"></script>
</body>
</html>