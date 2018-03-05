<?php
session_start();
if(!isset($_SESSION['user_id']))
{
  echo "<script>
                alert('Por Favor Logueate!!!');
                window.location= 'singlelogin.php'
        </script>";
}
include('Connect.php');
include('head.php');
include('topbar.php');
include('middlebar.php');
include('navh.php');

ini_set('error_reporting',0);


?>



<?php 
   $para = mysqli_real_escape_string($connection,$_GET['admin']);
    $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);




 ?>

 

  <body onload="ajax();">
<div class="container chateo" id="body">
  <div class="row">

    <!---ASIDE DEL CHAT-->


<!-------------------------------ASIDE DEL CHAT------------------------>

<!--CHAT-->

<?php 
if ( !empty($para) ) {
  

 ?>
  <div  class="col-md-6 col-md-offset-2" id="contenedor">
    <div id="caja-chat">
      <div id="chat">
           




      </div>
    </div>

    <form method="POST" action="" enctype="multipart/form-data">
      <!--<input type="hidden" name="nombre" value="<?php //echo "$name"; ?>">-->
      <textarea name="mensaje" placeholder="Inserta un mensaje"></textarea>
    <input class="filesenviar" id="files"  type="file"  name="imagen"/>
    <input class="inputenviar" type="submit" name="enviar" value="Enviar">    </form>
     </div>

<!--CHAT-->
<?php 

};

 ?>

<!--AJAX PARA EL CHAT-->
  <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();

            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                        $("#chat").animate({ scrollTop: $('#chat')[0].scrollHeight}, 1000);
                }
            }

            req.open('GET', 'chat_ajaxadmin.php?admin=<?php echo $para;?>&de=<?php echo $de;?>', true);
            req.send();
        }

        //linea que hace que se refreseque la pagina cada segundo
        setInterval(function(){ajax();}, 1000);
    </script>
<!--AJAX PARA EL CHAT-->


 
 <!--DEPENDENDIENDO LAS VARIABLES APARECERA O NO-->

<!--Programacion del CHAT-->

    <?php
      if (isset($_POST['enviar'])) {
       // $vendedor = mysqli_real_escape_string($connection,$_GET['sellerid']);
         $para = mysqli_real_escape_string($connection,$_GET['admin']);
         $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
            
        //$nombre = mysqli_real_escape_string($_POST['nombre']);
        $mensaje = mysqli_real_escape_string($connection,$_POST['mensaje']);
        $comprobar = "SELECT * FROM c_chats WHERE (de = '$de' AND para = '$para' AND vchata ='1' AND vchatb ='1') OR (de ='$para' AND para ='$de'  AND vchatb ='1' AND vchata ='1')";
        $comprobacion = $connection->query($comprobar);
        $row=$comprobacion->fetch_assoc();
       
      

        if (mysqli_num_rows($comprobacion)==0) {
          echo "No hay columnas";
          //INSERTAR EL CHAT
          

        $insert = "INSERT INTO c_chats(de,para,pid,sellerid,vchata, vchatb) VALUES (".$de.", ".$para.", '0', ".$para.", '1', '1');";  
        $resultado = $connection->query($insert);
        if ($resultado) {
          echo "SI INSERTO ALGO";
        }else{

          echo " NO INSERTO NADA";
        }




          //INSERTAR EL CHAT
          
          

            //CONSULTA PARA EL ID DEL CHAT
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para' OR de ='$para' AND para = '$de'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
          if ($resultado2== 0) {
            echo "NO HAY NADA CONSULTA REALIZADA CON EXITO";
          }else{
            echo "consulta exitosa 1";
          }

 //INSERTAR EL CHAT
          
 
           //CONSULTA PARA EL ID DEL CHAT

          //INSERTAR LOS MENSAJES
         
          
          include('datosimagen.php');
          $nombre_imagen = $_FILES['imagen']['name'];
         $insert2 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,image) VALUES(".$id_cch.", ".$de.",".$para.", '0', '".$mensaje."','$nombre_imagen');";
         $resultado3 = $connection->query($insert2);
          if ($resultado3) {
          echo "SI INSERTO ALGO EN LOS MENSAJES";
        }else{
          echo "ERROR";
        }
          //INSERTAR LOS MENSAJES

          if($resultado3){
            echo "<embed loop='false' src='css/beep.mp3' hidden='true' autoplay='true'>";
           }

          
          
        }else{

        //CONSULTA PARA EL ID DEL CHAT POR SEGUNDA VEZ
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para' OR  de = '$para' AND para = '$de'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
          if ($resultado2 == 0) {
            echo " NO HAY NADA CONSULTA REALIZADA CON EXITO";
          }else{
            echo "consulta existosa 2";
          }

           //CONSULTA PARA EL ID DEL CHAT POR SEGUNDA VEZ        
          
          $image = 'nada';
          $id_cch=$fila['id_cch'];
          include('datosimagen.php');
          $nombre_imagen = $_FILES['imagen']['name'];
          $insert3 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,image) VALUES(".$id_cch.", ".$de.",".$para.", '0', '".$mensaje."','$nombre_imagen');";
         $resultado4 = $connection->query($insert3);
        

            if($resultado4) {

             echo "<embed loop='false' src='css/beep.mp3' hidden='true' autoplay='true'>";

              }  

                          
        }






        
      }

      mysqli_close($connection);
    ?>
 

   

  

  </div> <!--END ROW-->
  </div><!--END CONTAINER-->

  <!--SCRIPT PARA EL ASIDE-->
<script type="text/javascript">
  var x = document.getElementsByClassName("asidechats");
 
    for (var i=0; i< x.length; i++) {
        //Añades un evento a cada elemento
        
        x[i].addEventListener('mouseover',function() {
          this.classList.toggle('amarillo');
        });

        x[i].addEventListener('mouseout',function() {
                this.classList.remove('amarillo'); 
        });
    }
</script>
<!--SCRIPT PARA EL ASIDE-->

<!--SCRIPT PARA EL INPUT ENVIAR-->
<script type="text/javascript">
  var x = document.getElementsByClassName("inputenviar");
 
    for (var i=0; i< x.length; i++) {
        //Añades un evento a cada elemento
        
        x[i].addEventListener('mouseover',function() {
          this.classList.toggle('amarillo');
        });

        x[i].addEventListener('mouseout',function() {
                this.classList.remove('amarillo'); 
        });
    }

</script>
<!--SCRIPT PARA EL INPUT ENVIAR-->

<!--SCRIPT PARA EL INPUT SUBIR ARCHIVO-->
<script type="text/javascript">
  var x = document.getElementsByClassName("filesenviar");
 
    for (var i=0; i< x.length; i++) {
        //Añades un evento a cada elemento
        
        x[i].addEventListener('mouseover',function() {
          this.classList.toggle('amarillo');
        });

        x[i].addEventListener('mouseout',function() {
                this.classList.remove('amarillo'); 
        });
    }

</script>
<!--SCRIPT PARA EL INPUT SUBIR ARCHIVO-->


</body>
<?php require'footer.php'; ?>
</html>