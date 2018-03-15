<?php
session_start();
error_reporting(0);
include 'Connect.php';
    
    
    $error =false;
 ?>
  <?php  if (isset($_POST['register-submit'])) {
	
	
		
		 $companyName= $_POST['companyName'];
		  $companyLegalNo= $_POST['companyLegalNo'];
	$p1=$_POST['p1'];
	$p2=$_POST['p2'];
	$p3=$_POST['p3'];
		$phone = $p1 . ' ' . $p2 . ' ' .$p3;
	$street= $_POST['street'];
		  $city= $_POST['city'];
		  $province= $_POST['province'];
		  $zipCode= $_POST['zipCode'];
		  $countryName= $_POST['selectcountryName'];
		  $businessType= $_POST['businessType'];
		  $noOfEmployee= $_POST['noOfEmployee'];
		  $companyDescription= $_POST['companyDescription'];
		  $email= $_SESSION['confemail'];
		  $confirmcode=$_SESSION['code'];
		  ///////////////////////////////////////////
		 	
			$target_dir = "images/";
	
		 		$target_file = $target_dir . basename($_FILES["file1"]["name"]);
				$images=$_FILES['file1']['name'];
			 $filelocation = $target_dir.$images;
        $temp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($temp, $filelocation);
		 /////////////////////////////////////////////
		 
		 //////////////////////////////////////////
	
			///SUBIR IMAGENES
		 foreach ($_FILES["file2"]["error"] as $key => $error) { 
		$nombre_archivo = $_FILES["file2"]["name"][$key];   
		$tipo_archivo = $_FILES["file2"]["type"][$key];   
		$tamano_archivo = $_FILES["file2"]["size"][$key]; 
		$temp_archivo = $_FILES["file2"]["tmp_name"][$key]; 
 
		if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg" ) || strpos($tipo_archivo, "png" ) || strpos($tipo_archivo, "jpg" )) && ($tamano_archivo < 1000000)))  
		{  


			echo "
				<script>
                alert('Maximo 1mb de tamaño y solo imagenes jpeg, jpg, png y git');
                window.location= 'updatesellerprofile.php?email=echo $email'
        		</script>
        		";
		
    		
		} 
		else  
		{   
    		$nom_img = $nombre_archivo;      
    		$directorio = 'images/'; // Directorio
 
    		if (move_uploaded_file($temp_archivo,$directorio . "/" . $nom_img))  
    		{  

    			echo "
    			<script>
                alert('Las imagenes se han subido correctamente');
                </script>
        		";

    		
			}  
		} 
	} // Fin Foreach 		 

		
		 ///SUBIR IMAGENES
						
				$image1=$_FILES['file2']['name'][0];
				$image2=$_FILES['file2']['name'][1];
				$image3=$_FILES['file2']['name'][2];
				$image4=$_FILES['file2']['name'][3];
				$image5=$_FILES['file2']['name'][4];
			 
		 ////////////////////////////////////////////////
		 ////////////////////////////////////////////////
		 
	 $q ="INSERT INTO seller(email,company_name,street,city,zipCode,province,businessType,noOfEmployee,companyDescription,companylogo,countryName,companylicense,phoneNo,companyLegalNo,limitTopList,limitShowCase) VALUES ('$email','$companyName','$street','$city','$zipCode','$province','$businessType','$noOfEmployee','$companyDescription','$images','$countryName','$image1,$image2,$image3,$image4,$image5','$phone','$companyLegalNo','7','5')";
   $qryresult=mysqli_query($connection,$q);
   if (!$qryresult) {
   
   	echo "INSERCION NO EXITOSA";
   }else{
   	
   	echo "
   	alert('Informacion Agregada Correctamente');
				<script>
				window.location.href ='sendconfirmation2.php';
				</script>


   	";

   	
   }

    	
   
   
        }
        
		
		  
		  ?>
		
	
		
		
           		

