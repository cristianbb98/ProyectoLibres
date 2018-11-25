<?php
session_start();
if($_SESSION['usuario']){
        session_unset();
	session_destroy();
	echo "<script>location.href='../../aplicacion/formularios_registro/Login.php'</script>";
}
else{
	echo "<script>location.href='../../aplicacion/formularios_registro/Login.php'</script>";
}
?>
