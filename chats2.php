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

     //Variables Recogidas por GET o SESSION
    //$vendedor = mysqli_real_escape_string($connection,$_GET['sellerid']);
    $pid = mysqli_real_escape_string($connection, $_GET['pid']);
    $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);


//Consulta para buscar productos
$sql="SELECT * FROM products Where pid = '$pid'";
$resultado=$connection -> query($sql);
$fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo
$imagen=$fila['image'];
$title =$fila['ntitle'];
$cl = explode(',', $imagen);


 ?>

 <!--SCRIPT-->
<!DOCTYPE>
<html>
<head>
  <title></title>
</head>
<body>
<!--AJAX PARA EL CHAT-->
  
<!--AJAX PARA EL CHAT-->
</body>
</html>
<!--SCRIPT-->

  <body >
<div class="container chateo" id="body">
  <div class="row">

<!-------------------------ASIDE DEL CHAT---------------------------------->
<div class="col-md-4" id="aside">
      <h6 style="text-align: center">MY CHATS</h6>

<!---------------PROGRAMACION DEL ASIDE DEL CHAT------------------------->
<?php 

//SELECION DE CADA CHAT
$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE de ='$de' OR para ='$de'";

$asideres1 = $connection->query($aside1);
//$fila =$asideres1->fetch_assoc();
while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT

 ?>

<!------------------------PROGRAMACION DEL ASIDE DEL CHAT------------------------------>


    
    

      <a href="chat2.php?sellerid=<?php echo $row['user_id'];?>&user_id=<?php echo $row['de']?>&pid=<?php echo $row['pid'];?>">
      <div class="chats">

        <div class="caja"  style="width:50%;  float:left;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style="width: 60px; height: 60px;" src="images/<?php echo $row['image'];?>" alt="Producto imagen">
        </div>


         <div class="caja" id="producto" style="width:50%;  float:right;">
             <h6><?php echo $row['ntitle'];?>&nbsp;&nbsp;&nbsp; Price: <?php echo $row['price']; ?></h6>
        </div>

      </div>

      </a>
     
     
    

        

<?php 
}
 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>




 

   

  

  </div> <!--END ROW-->
  </div><!--END CONTAINER-->
</body>
<?php require'footer.php'; ?>
</html>