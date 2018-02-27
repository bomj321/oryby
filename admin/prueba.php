<?php 
include('Connect.php');
$usuario="SELECT * FROM chart_category_subcatego_admin WHERE id = '2' " ;
$datos_usuario=mysqli_query($connection,$usuario);
$datos=mysqli_fetch_array($datos_usuario);
$mes=(int)date("d", strtotime ($datos['visited_at'] ) );
echo $mes;

?>