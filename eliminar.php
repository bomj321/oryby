<?php
    function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
    }
    $id = htmlspecialchars($_GET['id']);
    include('Connect.php');
    $sql ="DELETE FROM `chatapp` WHERE `id` = '{$id}';";
    $stmt=mysqli_query($connection,$sql);
    echo json_encode(array(
            'respuesta' => 1));
?>