<?php 
session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
         header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }



    
include('Connect.php');
$userType=$_SESSION["userType"];
if($userType !='Admin')
{
$email =$_SESSION["email"];
  $sqll="SELECT * FROM `users` WHERE email ='$email' ";
 
$stmtt=mysqli_query($connection,$sqll);
if($stmtt == false) {
trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
}

$nr=mysqli_num_rows($stmtt);
$row=mysqli_fetch_array($stmtt);
 $user_id =$row['user_id'];
  $sql="SELECT * FROM users INNER JOIN access  ON  (users.user_id = access.user_id) INNER JOIN page  ON  (access.pageId = page.pageId) WHERE  access.status ='1'  AND access.pageId='1' AND access.user_id='$user_id' ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr =mysqli_num_rows($stmt);
if($nr > 0)
{
    
}
else
{

      ?>
    
          <script>
         
        window.location.href='NotAccess.php';
        </script>
  <?php 
}
}
include('header.php');

    

?>



<!--ESTILOS CSS-->
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<!--ESTILOS CSS-->

 

  <body >
<div class="container chateo" id="body">
  <div class="row">

    <!---ASIDE DEL CHAT-->
<div class="col-md-4 col-md-offset-2" id="aside">
      <h6 style="text-align: center">MY CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 

//SELECION DE CADA CHAT Y FORMATO DE FECHA
function formatearFecha($fecha){
  return date('Y d M h:i a', strtotime($fecha));
}





$aside1 = "SELECT * FROM c_chatsby INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id) ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT

$id_cch = $row["id_cch"];
$firstimage = $row['image'];
$valor = explode(',',$firstimage); 

 

  $chat12= "SELECT * FROM chatsby WHERE id_cch='$id_cch' ORDER BY fecha DESC";
  $res12 =$connection->query($chat12);
  $fila32 =$res12->fetch_assoc();


//CONSULTA PARA EL VENDEDOR
  $aside3 = "SELECT * FROM c_chatsby  INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id)";
$asideres3 = $connection->query($aside3);
$fila =$asideres3->fetch_assoc();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

      <a href="BuyerRequests2.php?user_id=<?php echo $row['de']?>&sellerid=<?php echo $row['para'];?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">
        <h6 style="text-align: center;"> LAST MESSAGE: <?php echo formatearFecha($fila32['fecha']); ?></h6>
         <hr style="width: 90%">
        


           <div class="caja2" id="producto" style="width:100%;  text-align: center;">
             <h6>Name Of Product: <?php echo $row['prod_name'];?></h6>
        </div>


      

      </div>

      </a>
       <hr>
     
     
  

<?php 
};

 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>

<!-------------------------------CHAT---------------------------------------->

<?php 
    $para = mysqli_real_escape_string($connection,$_GET['sellerid']);
    $pid = mysqli_real_escape_string($connection, $_GET['pid']);
    $de = mysqli_real_escape_string($connection, $_GET['user_id']);    
if (!empty($pid) AND !empty($para) ) {
    
  ///consultamos a la base
  $consulta = "SELECT * FROM chatsby  WHERE de = '$de' AND para ='$para'  AND pid ='$pid'  OR  de= '$para' AND para = '$de'  AND pid ='$pid'  ORDER BY id_cha DESC";
  $ejecutar = $connection->query($consulta); 
  

 ?>
  <div  class="col-md-5 col-md-offset-1" id="contenedor">
    <div id="caja-chat">

      <?php 
while($fila = $ejecutar->fetch_array()) : 

  if($fila['de'] == $para) {$var = $para;} else {$var = $de;}
  $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();
  $image = $fila['image'];

       ?>
      <div id="chat">

        <div id="datos-chat">
    <?php 
    if (!empty($image)) {
      
     ?>

    <span style="color: black;" ><?php echo $fila2['firstName']; ?>:</span>
    <span style="color: black;"><?php echo $fila['mensaje']; ?></span></br>
    <span><a href="<?php echo $target_dir.$fila['image'];?>"><?php echo $image ?></a></span>
    <span style="color: black; float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>
    <?php 

}else{
     ?>

    <span style="color: black;" ><?php echo $fila2['firstName']; ?>:</span>
    <span style="color: black;"><?php echo $fila['mensaje']; ?></span> 
    <span><a href="<?php echo $target_dir.$fila['image'];?>"><?php echo $image ?></a></span>
    <span style="color: black; float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>

     <?php 

}

      ?>
      <hr>
  </div>
        
      </div>

      <?php endwhile; ?>
    </div>

     </div> 
  

<!--CHAT-->
<?php 

};
 ?>



 
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

<!--SCRIPT PARA EL SCROLL-->
<script type="text/javascript">
  var z = document.getElementById("caja-chat");
    z.scrollTop = z.scrollHeight;




</script>

<!--SCRIPT PARA EL SCROLL-->

</body>
<?php require'footer.php'; ?>
</html>