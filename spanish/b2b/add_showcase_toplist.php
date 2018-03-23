<?php 
function peticion_ajax(){
    return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
}

$producto = htmlspecialchars($_POST['producto']);
$precio = htmlspecialchars($_POST['precio']);
$email = htmlspecialchars($_POST['email']);; 
include('Connect.php');

//INSERT INTO
$insert2 = "INSERT INTO cart2 (title,price,email,orderstatus,quantity,description,totalprice) VALUES('{$producto}', '{$precio}', '{$email}', 'Incomplete', '1','{$producto}', '{$precio}');";
$resultado = $connection->query($insert2);
echo $resultado;
?>
