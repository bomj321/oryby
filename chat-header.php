<?php if(!isset($_SESSION))
    {
        session_start();
    }
require 'Connect.php';
/*$query="select * from users";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_array($result);  */
//$usertype= $_SESSION['utype'];
error_reporting(0);


?>



<?php 
$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE de ='$de' OR para ='$de'";

$asideres1 = $connection->query($aside1);
//$fila =$asideres1->fetch_assoc();
$row=mysqli_fetch_array($asideres1);
//SELECION DE CADA CHAT
if ($row['de']==$de) {
  $var = $row['para'];
}elseif($row['para']==$de){
$var = $row['de'];
}
if($fila['para'] == $para) {$var = $de;} else {$var = $para;}
  $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();


 ?>


<div class="chats">

        <div class="caja1"  style="width:30%;  float:left;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style="width: 60px; height: 60px;" src="images/<?php echo $row['image'];?>" alt="Producto imagen">
        </div>


         <div class="caja2" id="producto" style="width:70%;  float:right;">
             <h6><?php echo $row['ntitle'];?>&nbsp;&nbsp;&nbsp; Price: <?php echo $row['price']; ?>&nbsp;&nbsp;&nbsp; Seller:<?php echo $fila2['firstName']; ?></h6>
        </div>

      </div>




