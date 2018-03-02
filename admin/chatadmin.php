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





$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT

$id_cch = $row["id_cch"];

  $usere = "SELECT * FROM users ";
 $usere12 = $connection->query($usere);
  $fila12=$usere12->fetch_assoc();

  $chat12= "SELECT * FROM chats WHERE id_cch='$id_cch' ORDER BY fecha DESC";
  $res12 =$connection->query($chat12);
  $fila32 =$res12->fetch_assoc();


//CONSULTA PARA EL VENDEDOR
  $aside3 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid)";
$asideres3 = $connection->query($aside3);
$fila =$asideres3->fetch_assoc();
  $consulta2 = "SELECT * FROM users";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->



        <a href="chat2.php?sellerid=<?php echo $row['para'];?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">
        <h6 style="text-align: center;"> LAST MESSAGE: <?php echo formatearFecha($fila32['fecha']); ?></h6>
         <hr style="width: 90%">
        <div class="caja1"  style="width:40%;  float:left;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style="width: 50px; height: 50px;  margin-bottom: 5px;" src="../images/<?php echo $row['image'];?>" alt="Producto imagen">
        </div>


         <div class="caja2" id="producto" style="width:60%;  float:right;">
             <h6><?php echo $row['ntitle'];?>&nbsp;&nbsp;&nbsp; PRICE: <?php echo $row['price']; ?>&nbsp;&nbsp;&nbsp; </h6>
        </div>

        

      </div>

      </a>
       <hr>

<?php 
};

 ?>

PROGRAMACION


     </div>

      <div  class="col-md-6 col-md-offset-2" id="contenedor">
    <div id="caja-chat">
      <div id="chat"></div>
    </div>

    <form method="POST" action="" enctype="multipart/form-data">
      <!--<input type="hidden" name="nombre" value="<?php //echo "$name"; ?>">-->
      <textarea name="mensaje" placeholder="Enter your message"></textarea>
    <input class="filesenviar" id="files"  type="file"  name="imagen"/>
    <input class="inputenviar" type="submit" name="enviar" value="Send">    </form>
     </div>



PROGRAMACION



<?php 

        mysqli_close($connection);
 ?>
 

   

  

  </div> <!--END ROW-->
  </div><!--END CONTAINER-->
  </body>
  </html>