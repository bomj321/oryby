<?php
require 'Connect.php';
error_reporting(0);
include('head.php');
$email=$_GET['email'];
$companyName= $_POST['companyName'];
$companyLegalNo= $_POST['companyLegalNo'];
$street= $_POST['street'];
$city= $_POST['city'];
$province= $_POST['province'];
$zipCode= $_POST['zipCode'];
$countryName= $_POST['selectcountryName'];
$businessType= $_POST['businessType'];
$noOfEmployee= $_POST['noOfEmployee'];
$companyDescription= $_POST['companyDescription'];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file1"]["name"]);
$images=$_FILES['file1']['name'];
$filelocation = $target_dir.$images;
$temp = $_FILES['file1']['tmp_name'];
move_uploaded_file($temp, $filelocation);	


/////////////////////////////////////SUBIR IMAGENES
         foreach ($_FILES["file2"]["error"] as $key => $error) { 
        $nombre_archivo = $_FILES["file2"]["name"][$key];   
        $tipo_archivo = $_FILES["file2"]["type"][$key];   
        $tamano_archivo = $_FILES["file2"]["size"][$key]; 
        $temp_archivo = $_FILES["file2"]["tmp_name"][$key]; 
 
        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg" ) || strpos($tipo_archivo, "png" ) || strpos($tipo_archivo, "jpg" )) && ($tamano_archivo < 1000000)))  
        {   
            echo "Error en extencion o tamaño del archivo"; 
        } 
        else  
        {   
            $nom_img = $nombre_archivo;      
            $directorio = 'images/'; // Directorio
 
            if (move_uploaded_file($temp_archivo,$directorio . "/" . $nom_img))  
            {  
            echo "Las fotos se publicaron correctamente"; 
            }  
        } 
    } // Fin Foreach         

        
         ///SUBIR IMAGENES

                
                $image1=$_FILES['file2']['name'][0];
                $image2=$_FILES['file2']['name'][1];
                $image3=$_FILES['file2']['name'][2];
                $image4=$_FILES['file2']['name'][3];
                $image5=$_FILES['file2']['name'][4];
                
         ////////////////////////////////////////////////////////////
	


if(empty($images)){
$license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4. ',' . $image5;

$sqlimages="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqlimages); 
$stmtimages = $connection->prepare($sqlimages);
if($stmtimages === false) 
 {
    trigger_error('Wrong SQL: ' . $sqlimages . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtimages->execute())
    {

        echo "<script>
                alert('Actualizada la Informacion de tu compañia');
                window.location= 'updatesellerprofile.php?email=echo $email'
        </script>";
    }
    else{
//NADA
}

}elseif (empty($image1) and empty($image2) and empty($image3) and empty($image4) and empty($image5)) {
	



	$sqllicense="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqllicense); 
$stmtlicense = $connection->prepare($sqllicense);
if($stmtlicense === false) 
 {
    trigger_error('Wrong SQL: ' . $sqllicense . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtlicense->execute())
    {
        echo "<script>
                alert('Actualizada la Informacion de tu compañia');
                window.location= 'updatesellerprofile.php?email=echo $email'
        </script>";
    }
    else{

}

}else {
$license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4. ',' . $image5;

	$sql="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sql); 
$stmt = $connection->prepare($sql);
if($stmt === false) 
 {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmt->execute())
    {
        echo "<script>
                alert('Actualizada la Informacion de tu compañia');
                window.location= 'updatesellerprofile.php?email=echo $email'
        </script>";
    }
    else{

}

}







?>