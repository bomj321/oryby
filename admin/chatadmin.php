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
      <h6 style="text-align: center">USERS CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 

//SELECION DE CADA CHAT Y FORMATO DE FECHA
function formatearFecha($fecha){
  return date('Y d M h:i a', strtotime($fecha));
}





$aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid)  ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT

$id_cch = $row["id_cch"];
$firstimage = $row['image'];
$valor = explode(',',$firstimage); 

 

  $chat12= "SELECT * FROM chats WHERE id_cch='$id_cch' ORDER BY fecha DESC";
  $res12 =$connection->query($chat12);
  $fila32 =$res12->fetch_assoc();


//CONSULTA PARA EL VENDEDOR
  $aside3 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid)";
$asideres3 = $connection->query($aside3);
$fila =$asideres3->fetch_assoc();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

     <a href="chatadmin2.php?user_id=<?php echo $row['de']?>&sellerid=<?php echo $row['para'];?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">

        <div style="margin-bottom: -1rem;"><!--DIV DE ARRIBA-->

        <div style=" width: 30%; float: left;" >
        <h6 style="text-align: center; color: black; font-weight: bold;">  <?php echo $row['ntitle'];?></h6>
        </div>

        <div class="caja1"  style="width:15%; float: right;">
          <!--<p>NOMBRE DEL CHAT</p>-->
          <img style=" margin-top:5px; width: 30px; height: 30px;  margin-bottom: 5px;" src="../images/<?php echo $valor[0];?>" alt="Product Image">
        </div>
        <div style="clear:both"></div>

</div><!--DIV DE ARRIBA-->

<hr style="width: 90%">
<div style="margin-top: -1.5rem;"><!--DIV DE INTERMEDIO-->

        

        <div class="caja2" id="producto" style="width:40%;  float:right;">
             <h6 style="color: black; font-weight: bold;">PRICE: <?php echo $row['price']; ?>&nbsp;USD</h6>
        </div>
        <div style="clear:both"></div>

</div><!--DIV DE INTERMEDIO-->




        <!--DIV DE ABAJO-->
        <div style="float:left; width: 85%;">
          
          <p style="text-align: center; color: black; font-weight: bold;"> Last Message <?php echo formatearFecha($fila32['fecha']); ?></p>
        </div>

        <div class="caja2" id="producto" style="width:13%;  float:right; color: black; font-weight: bold;">
             <a  href="borrarchat.php?id_cch=<?php echo $row['id_cch']?>"><i class="fa fa-trash-o fa-lw"></i></a>
        </div>

        <!--DIV DE ABAJO-->



      </div>

      </a>
     
     
  

<?php 
};

mysqli_close($connection);
 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>


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


</body>
<?php require'footer.php'; ?>
</html>