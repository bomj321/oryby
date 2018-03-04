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
  
    $pid = mysqli_real_escape_string($connection, $_GET['pid']);
    $para = mysqli_real_escape_string($connection,$_GET['sellerid']);
    $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);




 ?>

 

  <body onload="ajax();">
<div class="container chateo" id="body">
  <div class="row">

    <!---ASIDE DEL CHAT-->
<div class="col-md-4" id="aside">
      <h6 style="text-align: center">MY CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 

//SELECION DE CADA CHAT Y FORMATO DE FECHA
function formatearFecha($fecha){
  return date('Y d M h:i a', strtotime($fecha));
}





$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT
if ($row['de']==$de) {
  $var = $row['para'];
}elseif($row['para']==$de){
$var = $row['de'];
}
$id_cch = $row["id_cch"];
$firstimage = $row['image'];
$valor = explode(',',$firstimage); 

  $usere = "SELECT * FROM users WHERE user_id ='$var'";
 $usere12 = $connection->query($usere);
  $fila12=$usere12->fetch_assoc();

  $chat12= "SELECT * FROM chats WHERE id_cch='$id_cch' ORDER BY fecha DESC";
  $res12 =$connection->query($chat12);
  $fila32 =$res12->fetch_assoc();


//CONSULTA PARA EL VENDEDOR
  $aside3 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE de ='$de' OR para ='$de'";
$asideres3 = $connection->query($aside3);
$fila =$asideres3->fetch_assoc();
if($fila['de'] == $para) {$var2 = $de;} else {$var2 = $para;}
  $consulta2 = "SELECT * FROM users WHERE user_id ='$var2'";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

      <a href="chat2.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">
        <h6 style="text-align: center;"> Ultimo Mensaje: <?php echo formatearFecha($fila32['fecha']); ?></h6>
         <hr style="width: 90%">
        <div class="caja1"  style="width:40%;  float:left;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style="width: 50px; height: 50px;  margin-bottom: 5px;" src="images/<?php echo $valor[0];?>" alt="Producto imagen">
        </div>


         <div class="caja2" id="producto" style="width:60%;  float:right;">
             <h6><?php echo $row['ntitle'];?>&nbsp;&nbsp;&nbsp; Precio: <?php echo $row['price']; ?>&nbsp;&nbsp;&nbsp; </h6>
        </div>

        <div class="caja2" id="producto" style="width:25%;  float:right;">
             <a  href="borrarchat.php?id_cch=<?php echo $row['id_cch']?>">Borrar Chat</a>
        </div>

      </div>

      </a>
       <hr>
     
     
  

<?php 
};

 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>

<!--CHAT-->

<?php 
if (!empty($pid) AND !empty($para) ) {
  

 ?>
  <div  class="col-md-6 col-md-offset-2" id="contenedor">
    <div id="caja-chat">
      <div id="chat"></div>
    </div>

    <form method="POST" action="" enctype="multipart/form-data">
      <!--<input type="hidden" name="nombre" value="<?php //echo "$name"; ?>">-->
      <textarea name="mensaje" placeholder="Envia un Mensaje"></textarea>
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
                }
            }

            req.open('GET', 'chat_ajax.php?sellerid=<?php echo $para;?>&pid=<?php echo $pid;?>&de=<?php echo $para;?>', true);
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
         $para = mysqli_real_escape_string($connection,$_GET['sellerid']);
         $pid = mysqli_real_escape_string($connection, $_GET['pid']);
         $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
            
        //$nombre = mysqli_real_escape_string($_POST['nombre']);
        $mensaje = mysqli_real_escape_string($connection,$_POST['mensaje']);
        $comprobar = "SELECT * FROM c_chats WHERE (de = '$de'  AND pid ='$pid' AND vchata ='1' AND vchatb ='1') OR (de ='$para'   AND pid ='$pid' AND vchatb ='1' AND vchata ='1')";
        $comprobacion = $connection->query($comprobar);
        $row=$comprobacion->fetch_assoc();
       
      

        if (mysqli_num_rows($comprobacion)==0) {
          echo "No hay columnas";
          //INSERTAR EL CHAT
          

        $insert = "INSERT INTO c_chats(de,para,pid,sellerid,vchata, vchatb) VALUES (".$de.", ".$para.", ".$pid.", ".$para.", '1', '1');";  
        $resultado = $connection->query($insert);
        if ($resultado) {
          echo "SI INSERTO ALGO";
        }




          //INSERTAR EL CHAT
          
          

            //CONSULTA PARA EL ID DEL CHAT
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para'  AND pid ='$pid' OR de ='$para' AND para = '$de' AND pid = '$pid'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
          if ($resultado2) {
            echo "CONSULTA REALIZADA CON EXITO";
          }

 //INSERTAR EL CHAT
          
 
           //CONSULTA PARA EL ID DEL CHAT

          //INSERTAR LOS MENSAJES
         
          
          include('datosimagen.php');
          $nombre_imagen = $_FILES['imagen']['name'];
         $insert2 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,image) VALUES(".$id_cch.", ".$de.",".$para.", ".$pid.", '".$mensaje."','$nombre_imagen');";
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
          $siguiente = "SELECT id_cch FROM c_chats WHERE de ='$de' AND para ='$para'  AND pid ='$pid' OR  de = '$para' AND para = '$de' AND pid = '$pid'";
          $resultado2 = $connection->query($siguiente);
          $fila=$resultado2->fetch_assoc();
          $id_cch=$fila['id_cch'];
          if ($resultado2) {
            echo "CONSULTA REALIZADA CON EXITO";
          }

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