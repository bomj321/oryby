 <?php
      if (isset($_POST['enviar'])) {
       // $vendedor = mysqli_real_escape_string($connection,$_GET['sellerid']);
         $para = mysqli_real_escape_string($connection,$_GET['sellerid']);
         $pid = mysqli_real_escape_string($connection, $_GET['pid']);
         $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
            
        //$nombre = mysqli_real_escape_string($_POST['nombre']);
        $mensaje = mysqli_real_escape_string($connection,$_POST['mensaje']);
        $comprobar = "SELECT * FROM c_chats WHERE (de = '$de'   AND para='$para' AND pid ='$pid' AND vchata ='1' AND vchatb ='1') OR (de ='$para' AND para='$de'  AND pid ='$pid' AND vchatb ='1' AND vchata ='1')";
        $comprobacion = $connection->query($comprobar);
        $row=$comprobacion->fetch_assoc();
       
      

        if (mysqli_num_rows($comprobacion)==0) {
          //INSERTAR EL CHAT
          

         //ACTUALIZAR CHAT 
        $comprobarx3 = "SELECT * FROM c_chats WHERE (de = '$de'   AND para='$para' AND pid ='$pid' AND vchata ='0' AND vchatb ='1' ) OR (de ='$para' AND para='$de'  AND pid ='$pid' AND vchatb ='0' AND vchata ='1') OR (de = '$de'   AND para='$para' AND pid ='$pid' AND vchata ='1' AND vchatb ='0') OR (de ='$para' AND para='$de'  AND pid ='$pid' AND vchatb ='1' AND vchata ='0')";
        $comprobacionx3 = $connection->query($comprobarx3);
        $rowx3=$comprobacionx3->fetch_assoc();
        $id_cchx3 = $rowx3['id_cch'];


        if (mysqli_num_rows($comprobacionx3)==0) {
           $insert = "INSERT INTO c_chats(de,para,pid,sellerid,vchata, vchatb) VALUES (".$de.", ".$para.", ".$pid.", ".$para.", '1', '1');";  
        $resultado = $connection->query($insert);
       


        }else{
          $sqlx3 = "UPDATE c_chats SET vchata='1' WHERE id_cch ='126'";
          $connection->query($sqlx3);       
          $sqlx4 = "UPDATE c_chats SET vchatb='1' WHERE id_cch ='126'";
          $connection->query($sqlx4); 

        }

         //ACTUALIZAR CHAT 




          //INSERTAR EL CHAT
          
          

            //CONSULTA PARA EL ID DEL CHAT
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para'  AND pid ='$pid' OR de ='$para' AND para = '$de' AND pid = '$pid'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
          

 //INSERTAR EL CHAT
          
 
           //CONSULTA PARA EL ID DEL CHAT

          //INSERTAR LOS MENSAJES
         
          
          include('datosimagen.php');
          $nombre_imagen = $_FILES['imagen']['name'];
         $insert2 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,image) VALUES(".$id_cch.", ".$de.",".$para.", ".$pid.", '".$mensaje."','$nombre_imagen');";
         $resultado3 = $connection->query($insert2);
          
          //INSERTAR LOS MENSAJES

          if($resultado3){
            echo "<embed loop='false' src='css/beep.mp3' hidden='true' autoplay='true'>";
           }

          
          
        }else{

        //CONSULTA PARA EL ID DEL CHAT POR SEGUNDA VEZ
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para'  AND pid ='$pid' OR  de = '$para' AND para = '$de' AND pid = '$pid'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
         

           //CONSULTA PARA EL ID DEL CHAT POR SEGUNDA VEZ        
          
          $image = 'nada';
          $id_cch=$fila['id_cch'];
          include('datosimagen.php');
          $nombre_imagen = $_FILES['imagen']['name'];
          $insert3 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,image) VALUES(".$id_cch.", ".$de.",".$para.", ".$pid.", '".$mensaje."','$nombre_imagen');";
         $resultado4 = $connection->query($insert3);
        

            if($resultado4) {

             echo "<embed loop='false' src='css/beep.mp3' hidden='true' autoplay='true'>";

              }  

                          
        }






        
      }

      mysqli_close($connection);
    ?>