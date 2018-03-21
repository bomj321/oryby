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
		<?php 
  
  $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);




 ?>
<!--ESTILOS CSS-->
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<!--ESTILOS CSS-->

  <body onload="ajax();">
<div class="container chateo" id="body">
  <div class="row">

    <!---ASIDE DEL CHAT-->
<div class="col-md-4 col-md-offset-2" id="aside" style="height: 800px;">
      <h6 style="text-align: center">MY CHATS</h6>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->
<?php 

//SELECION DE CADA CHAT Y FORMATO DE FECHA
function formatearFecha($fecha){
  return date('Y d M h:i a', strtotime($fecha));
}





$aside1 = "SELECT * FROM c_chats WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT
if ($row['de']==$de) {
  $var = $row['para'];
}elseif($row['para']==$de){
$var = $row['de'];
}
$id_cch = $row["id_cch"];

  $usere = "SELECT * FROM users WHERE user_id ='$var'";
 $usere12 = $connection->query($usere);
  $fila12=$usere12->fetch_assoc();

  $chat12= "SELECT * FROM chats WHERE id_cch='$id_cch' ORDER BY fecha DESC";
  $res12 =$connection->query($chat12);
  $fila32 =$res12->fetch_assoc();

 
 ?>

<!--PROGRAMACION DEL ASIDE DEL CHAT-->


    
    

      <a href="artistchat2.php?para=<?php echo $var;?>&id_cch=<?php echo $row['id_cch']?>">
      <div class="chats asidechats">
        <h6 style="text-align: center; color:black; font-weight: bold;"> LAST MESSAGE: <?php echo formatearFecha($fila32['fecha']); ?></h6>
         <hr style="width: 90%">
        <div class="caja1"  style="width:40%;  float:left;">
          
          
        </div>


        

        <div class="caja2" id="producto" style="width:13%;  float:right;">
              <a  href="borrarchat.php?id_cch=<?php echo $row['id_cch']?>"><i class="fa fa-trash-o fa-lw"></i></a>
        </div>

      </div>

      </a>
       <hr>
     
     
  

<?php 
};

 ?>
</div>

<!-------------------------------ASIDE DEL CHAT------------------------>


<?php

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
<?php require'footer.php'; ?>
</body>
</html>