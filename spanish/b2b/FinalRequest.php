<?php session_start();
error_reporting(0);
require 'Connect.php';
$dropcat=$_SESSION['dropcat'];

$prod_name=$_SESSION['pname'];
$dropunit=$_SESSION['dropunit'];
$quantity=$_SESSION['quantity'];
$dtym=$_SESSION['dtym'];
$user =$_SESSION['uemail'];
$pais= $_SESSION['pais'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$desc=$_POST['description'];
$target_dir = "ReqImages/";
$target_file = $target_dir . basename($_FILES["pimage"]["name"]);
$image=$_FILES['pimage']['name'];
$filelocation = $target_dir.$image;
$temp = $_FILES['pimage']['tmp_name'];
move_uploaded_file($temp, $filelocation);

// INSERTAR FECHA FINAL PARA USARLA Y ASI BORRAR LOS REGISTROS DE 2 DIAS O MAS ANTIGUOS A ESOS
  $date1 = $dtym;
  $date = date($date1);
  $mod_date = strtotime($date."+ 2 days");
  $fechafinal = date("Y-m-d",$mod_date);


$query = "INSERT INTO buyerrequests(BuyerName,prod_name,bmessage,image,catename,quantity,unit,dtym, tiempo,country) VALUES ('$user', '$prod_name','$desc' ,'$image','$dropcat','$quantity','$dropunit','$dtym', '$fechafinal', '$pais')";
 //echo $query;
 $result=mysqli_query($connection,$query);
 if($result){
	 $suc='<div class="alert alert-success" id="#suc">Successfuly Requested !</div>';
	 echo $suc;
 }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Request</title>
    <meta charset="utf-8">
    <meta name="description" content="Plus E-Commerce Template">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/swiper.css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <script src="js/jquery.js"></script>
</head>
<body>
<?php require 'topbar.php' ?>
<?php require 'navh.php' ?>
<div class="container">
<div class="row">
<div   class="col-sm-3">  </div>
<div   class="col-sm-6" style="margin-top:50px;background-color:#D1F2EB;">
<div style="background-color:#D1F2EB;width:100%;padding:8px" >
<h2 class="title">Fill below Fields</h2>  <br>
   <form method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                          <label for="pimage">Product Image</label>
                          <input type="file" name="pimage"   required class="form-control input-lg">
                          </div>

                        <div class="form-group">
                          <label class="control-label" for="message" name="description">Descirption</label>
                          <textarea id="message" rows="5" class="form-control" required placeholder="Description ..." name="description"></textarea>
                       </div>
					 <div class="form-group">
                                <input type="submit"  class="btn btn-success round btn-md"  value="Request">
                     </div>
	</form>
</div>
</div>
</div>
</div>
<br> <br>
<?php require 'footer.php' ?>
<script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#suc').fadeOut('fast');
     }, 1000);
});
</script>

</body>
</html>
