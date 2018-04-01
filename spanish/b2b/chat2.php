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

if(isset($_GET['leido'])) {
  $pid = mysqli_real_escape_string($connection, $_GET['pid']);
  $leido = mysqli_real_escape_string($connection, $_GET['leido']);
  $para = mysqli_real_escape_string($connection,$_GET['sellerid']);
  $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
  $tchats = "SELECT * FROM chats WHERE de = '$para' OR para = '$para'";
  $ejecutartchats = $connection->query($tchats);
  $tc = mysqli_fetch_array($tchats);
  if($tc['de'] != $de) {
  $update = "UPDATE chats SET leido = '1' WHERE (de = '$para' OR para = '$para') AND pid ='$pid'";
    $connection->query($update);

  }
}


 ?>
 
<!--HOJA DE ESTILO-->
<link rel="stylesheet" type="text/css" href="css/estilos.css">
 <!--HOJA DE ESTILO-->

 

  <body onload="ajax();">
<div class="container chateo" id="body">
  <!-------------------------BOTONES-->
<div style="margin-bottom: 2em;" class="row ">
  <div class="col-md-2">
    <a href="chat2.php"><button class="btn btn-primary">MI CHATS</button></a>
  </div>

<div style="margin-left: -3em;" class="col-md-2">
      <a href="chatby.php"><button class="btn btn-primary">SOLICITUDES DE COMPRA</button></a>

</div>

</div>


  <!-------------------------BOTONES-->
  <div class="row">

    <!---ASIDE DEL CHAT-->
<div class="col-md-4" id="aside" style="height: 628.383px">
      <h6 style="text-align: center">MY CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 
  include('programacionasidechat.php');
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
  <?php 
  include('programacionajaxchat.php');
     ?>
<!--AJAX PARA EL CHAT-->


 
 <!--DEPENDENDIENDO LAS VARIABLES APARECERA O NO-->

<!--Programacion del CHAT-->

   <?php 
  include('programacionchat.php');
     ?>
 
<!--FIN PROGRAMACION CHAT-->

   

  

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