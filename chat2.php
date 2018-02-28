<?php
session_start();
if(!isset($_SESSION['user_id']))
{
  echo "<script>
                alert('Please log in!!!');
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


//Consulta para buscar productos
$sql="SELECT * FROM products Where pid = '$pid'";
$resultado=$connection -> query($sql);
$fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo
$imagen=$fila['image'];
$title =$fila['ntitle'];
$cl = explode(',', $imagen);


 ?>

 

  <body onload="ajax();">
<div class="container chateo" id="body">
  <div class="row">

    <!---ASIDE DEL CHAT-->
<div class="col-md-4" id="aside">
      <h6 style="text-align: center">MY CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 

//SELECION DE CADA CHAT
$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE de ='$de' OR para ='$de'";

$asideres1 = $connection->query($aside1);
//$fila =$asideres1->fetch_assoc();
while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT
if ($row['de']==$de) {
  $var = $row['para'];
}elseif($row['para']==$de){
$var = $row['de'];
}
$usere = "SELECT * FROM users WHERE user_id ='$var'";
 $usere12 = $connection->query($usere);
  $fila12=$usere12->fetch_assoc();

  $chat12= "SELECT * FROM chats WHERE id_cch='".$row["id_cch"]."'";
  $res12 =$connection->query($chat12);
  $fila32=$connection->query($res12);

  if($fila['para'] == $para) {$var = $de;} else {$var = $para;}
  $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

      <a href="chat2.php?sellerid=<?php echo $var; ?>&pid=<?php echo $row['pid'];?>">
      <div class="chats">

        <div class="caja1"  style="width:50%;  float:left;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style="width: 60px; height: 60px;" src="images/<?php echo $row['image'];?>" alt="Producto imagen">
        </div>


         <div class="caja2" id="producto" style="width:50%;  float:right;">
             <h6><?php echo $row['ntitle'];?>&nbsp;&nbsp;&nbsp; Price: <?php echo $row['price']; ?>&nbsp;&nbsp;&nbsp; Seller:<?php echo $fila2['firstName']; ?></h6>
        </div>

      </div>

      </a>
     
     
  

<?php 
}
 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>

<!--CHAT-->

<?php 
if (!empty($pid) AND !empty($para) ) {
  

 ?>
  <div  class="col-md-6 col-md-offset-2" id="contenedor">
    <?php include_once('chat-header.php'); ?>
    <div id="caja-chat">
      <div id="chat"></div>
    </div>

    <form method="POST" action="">
      <!--<input type="hidden" name="nombre" value="<?php //echo "$name"; ?>">-->
      <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
      <input type="submit" name="enviar" value="Enviar">
    </form>
     </div>

<!--CHAT-->
<?php 

}
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
        $comprobar = "SELECT * FROM c_chats WHERE de = '$de'  AND pid ='$pid' OR de ='$para'   AND pid ='$pid'";
        $comprobacion = $connection->query($comprobar);
        $row=$comprobacion->fetch_assoc();
       // $comprobar = mysqli_query("SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
          //$com = mysqli_fetch_array($comprobar);
        

        if (mysqli_num_rows($comprobacion)==0) {
          echo "No hay columnas";
          //INSERTAR EL CHAT
        $insert = "INSERT INTO c_chats(de,para,pid,sellerid) VALUES (".$de.", ".$para.", ".$pid.", ".$para.");";  
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

           //CONSULTA PARA EL ID DEL CHAT

          //INSERTAR LOS MENSAJES
         $leido = 0;
          $image = 'nada';
         $insert2 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,leido,image) VALUES(".$id_cch.", ".$de.",".$para.", ".$pid.", '".$mensaje."', ".$leido.", '".$image."');";
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
          $leido = 0;
          $image = 'nada';
          $id_cch=$fila['id_cch'];
          $insert3 = "INSERT INTO chats(id_cch,de,para,pid,mensaje,leido,image) VALUES(".$id_cch.", ".$de.",".$para.", ".$pid.", '".$mensaje."', ".$leido.", '".$image."');";
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
</body>
<?php require'footer.php'; ?>
</html>