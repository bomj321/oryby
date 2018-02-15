<?php
    function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
    }
    $id = htmlspecialchars($_GET['id']);
    echo $id;
   try {    
        require_once('connect.php');
        $sql ="DELETE FROM `chatapp` WHERE `id` = '{$id}';";
        $resultado = $conn->query($sql);
        echo json_encode(array(
            'respuesta' => 1));
      }catch (Exception $e)
  {$error = $e->getMessage();}
   $conn->close();
?>