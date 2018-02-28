<?php
session_start();
$name=  $_SESSION['firstName'];
if(!isset($_SESSION))
{
  header("Location: index.php");
}
	include('Connect.php');
	$para = mysqli_real_escape_string($connection,$_GET['sellerid']);
    $pid = mysqli_real_escape_string($connection, $_GET['pid']);
    $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
	//Formatear Fecha
	function formatearFecha($fecha){
	return date('g:i a', strtotime($fecha));
}

	
	///consultamos a la base
	$consulta = "SELECT * FROM chats  WHERE de = '$de' AND para ='$para'  AND pid ='$pid'  OR  de= '$para' AND para = '$de'  AND pid ='$pid'  ORDER BY id_cha ASC";
	$ejecutar = $connection->query($consulta); 
	while($fila = $ejecutar->fetch_array()) : 

	if($fila['de'] == $para) {$var = $para;} else {$var = $de;}
	$consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
	$ejecutar2 = $connection->query($consulta2);
	$fila2 = $ejecutar2->fetch_array();
?>
	<div id="datos-chat">
		<?php echo "$para"; ?>
		<?php echo "$de"; ?>
		<?php echo "$pid"; ?>

		<span style="color: black;" ><?php echo $fila2['firstName']; ?>:</span>
		<span style="color: black;"><?php echo $fila['mensaje']; ?></span>
		<span style="color: black; float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>
	</div>
	
	<?php endwhile; ?>