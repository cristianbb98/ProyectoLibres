<?php
session_start();
if (@!$_SESSION['usuario']) {
    header("Location:../../../index.php");
} elseif ($_SESSION['tipo_usuario'] == 'EST') {
    header("Location:../../../index.php");
} elseif ($_SESSION['tipo_usuario'] == 'ADM') {
    
}
   
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

    <meta charset="utf-8"></meta>
    <link rel="stylesheet" href="../../../plugins/bootstrap/css/bootstrap.min.css"></link>
    <script type="text/javascript" src="../../../plugins/bootstrap/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../plugins/bootstrap/js/bootstrap.min.js"></script>
    <title>Proyecto SGOA</title>
</head>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 390px}
    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 20px;
        background-color: #f1f1f1;
        height: 100%;
    }
    html{
        min-height: 100%;
        position: relative;
    }
    body{
        margin:0;
        margin-bottom: 40px;
    }
    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
        position: fixed;
        bottom: 0;
        width: 100%;
        padding-top:5px;
    padding-bottom:5px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }
        .row.content {height:auto;}
    }
    .table > tbody > tr > td {
        vertical-align: middle;
    }
       .estadistica{
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 2;
        
    }
</style>


<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

    <meta charset="utf-8"></meta>
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css"></link>
    <script type="text/javascript" src="../../plugins/bootstrap/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
    <title>Proyecto SGOA</title>
</head>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 390px}
    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 20px;
        background-color: #f1f1f1;
        height: 100%;
    }
    html{
        min-height: 100%;
        position: relative;
    }
    body{
        margin:0;
        margin-bottom: 40px;
    }
    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
        position: fixed;
        bottom: 0;
        width: 100%;
        padding-top:5px;
    padding-bottom:5px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }
        .row.content {height:auto;}
    }
    .table > tbody > tr > td {
        vertical-align: middle;
    }
       .estadistica{
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 2;
        
    }
</style>


<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Bienvenid@: <strong><?php echo $_SESSION['usuario']?></strong></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Objetos de aprendizaje
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../modulos_administrador/adm_objetos_aprendizaje.php">Importar y catalogar objetos de aprendizaje</a></li>
                        <li><a href="../../modulos_administrador/adm_buscar.php">Buscar y administrar objetos de aprendizaje</a></li>
                    </ul>
                </li>
                <li><a href="../../modulos_administrador/adm_buscar_profesores.php">Gestionar Profesores</a></li>
                <li ><a href="../../modulos_administrador/adm_buscar_estudiantes.php">Gestionar Estudiantes</a></li>
                <li ><a href="../../modulos_administrador/adm_comentarios_todos.php">Gestionar comentarios</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión de colaboradores
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="buscar_colaborador.php">Buscar</a></li>
                        <li><a href="eliminar_colaborador.php">Eliminar</a></li>
                    </ul>
                </li>
                <li><a href="../../modulos_administrador/adm_herramientas.php">Herramientas</a></li>
                <li ><a href="../modulo_foro/index.php">Foro</a></li>">
                
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../../../aplicacion/desconectar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php 



/* Los datos cédula de identidad, nombres y apellidos, fecha de nacimiento, género, 
dirección de domicilio, telefono convencional, telefono celular y correo electrónico
se encuentran entre la tabla usuario, la tabla estudiante o profesor segun corresponda
y la tabla colaboradores.


Se deben desplegar todos los campos de cada colaborador indicados arriba (el numero total
de colaboraciones por cada uno)(como en el archivo "modulos_administrador/adm_buscar.php")
en una tabla como en el archivo index.php del modulo foro.

En esta tabla debe existir un boton de eliminar por cada colaborador. Si se da click, se debe
actualizar el campo "activo" de la tabla colaborador a "F" (falso).

NO SE DEBEN BORRAR Y/O ACTUALIZAR NINGUN OTRO DATO.

Debe tener la opción de buscar por: apellido o cédula.


*/

























?>

</body>
</html>