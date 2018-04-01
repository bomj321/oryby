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
  $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
  $ejecutar2 = $connection->query($consulta2);
  $fila2 = $ejecutar2->fetch_array();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

      <a href="chat2.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">

        <div style="margin-bottom: -1rem;"><!--DIV DE ARRIBA-->

        <div style=" width: 30%; float: left;" >
        <h6 style="text-align: center; color: black; font-weight: bold;">  <?php echo $row['ntitle'];?></h6>
        </div>

        <div class="caja1"  style="width:15%; float: right;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style=" margin-top:5px; width: 30px; height: 30px;  margin-bottom: 5px;" src="images/<?php echo $valor[0];?>" alt="Product Image">
        </div>
        <div style="clear:both"></div>

</div><!--DIV DE ARRIBA-->

<hr style="width: 90%">
<div style="margin-top: -1.5rem;"><!--DIV DE INTERMEDIO-->

        <div style=" width: 35%; float: left;" >
        <h6 style="text-align: center; color: black; font-weight: bold;">User:&nbsp;<?php echo $fila2['firstName'];?></h6>
        </div>

        <div class="caja2" id="producto" style="width:40%;  float:right;">
             <h6 style="color: black; font-weight: bold;">  <?php echo $row['price']; ?>&nbsp;USD</h6>
        </div>
        <div style="clear:both"></div>

</div><!--DIV DE INTERMEDIO-->




        <!--DIV DE ABAJO-->
        <div style="float:left; width: 85%;">
          
          <p style="text-align: center; color: black; font-weight: bold; font-size: 1.5rem;"> Ultimo Mensaje:<?php echo formatearFecha($fila32['fecha']); ?></p>
        </div>

        <div class="caja2" id="producto" style="width:13%;  float:right; color: black; font-weight: bold;">
             <a  href="borrarchat.php?id_cch=<?php echo $row['id_cch']?>"><i class="fa fa-trash-o fa-lw"></i></a>
        </div>

        <!--DIV DE ABAJO-->



      </div>

      </a>
      
     
     
  

<?php 
};

 ?>