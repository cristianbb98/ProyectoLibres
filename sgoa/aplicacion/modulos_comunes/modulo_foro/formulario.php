<?php
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
    $identificador = 0;
  if(isset($_GET["nombre"]))
		$nombre = $_GET['nombre'];
	else
    $nombre = 'NULL';
  if(isset($_GET["idLogin"]))
		$idLogin = $_GET['idLogin'];
	else
    $idLogin = 'NULL';
    
    
?>
<table>
<form name="form" action="agregar.php" method="post">
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
  <input type="hidden" name="idLogin" value="<?php echo $idLogin;?>">
    <tr>
		<td>Autor </td>
		<td><input type="text" name="nombre" readonly="readonly" value="<?php echo $nombre;?>"></td>
    </tr>
    <tr>
      <td>Titulo</td>
      <td><input type="text" name="titulo"></td>
    </tr>
    <tr>
      <td>Mensaje</td>
      <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" name="submit" value="Enviar Mensaje"></td>
    </tr>
    </form>
    
    <td><a href='index.php?nombre=<?php echo $nombre;?>'>Regresar</a></td>
    
</table>