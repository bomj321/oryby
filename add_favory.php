<?php session_start();
    if(!isset($_SESSION['uemail'])):
        header('location:singlelogin.php');
    endif;
require 'Connect.php';
$id_product=$_GET['id']; //id del Producto
$email = $_SESSION['uemail']; //email del usuario logueado
$usuario="SELECT * FROM users where email='$email'";
$datos_usuario=mysqli_query($connection,$usuario);
$datos=mysqli_fetch_array($datos_usuario);
$id_user=$datos['user_id'];//id del usuario logueado

//Insertando a la base de datos
$sql ="INSERT INTO `favorites` (`id`,`id_user`,`id_product`) VALUES ('NULL','{$id_user}','{$id_product}');";
mysqli_query($connection,$sql);
$stmt = $connection->prepare($sql);
header("Location: index.php");
?>

