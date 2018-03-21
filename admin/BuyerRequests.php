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





$aside1 = "SELECT * FROM c_chatsby INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id)";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT

$id_cch = $row["id_cch"];
$firstimage = $row['image'];

 

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
       


         <div class="caja2" id="producto" style="width:100%; text-align: center;">
             <h6>Name Of Product: <?php echo $row['prod_name'];?></h6>
        </div>

      

      </div>

      </a>
       <hr>
     
     
  

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