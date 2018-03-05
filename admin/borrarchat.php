<?php 
session_start();
if(!isset($_SESSION['user_id']))
{
  echo "<script>
                alert('Por Favor Logueate!!!');
                window.location= 'singlelogin.php'
        </script>";
}

include('Connect.php');
 $de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
$id_cch = $_GET['id_cch'];




$aside1 = "SELECT * FROM c_chats  WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ";
$asideres1 = $connection->query($aside1);

while ($row=mysqli_fetch_array($asideres1)) {
//SELECION DE CADA CHAT
if ($row['de']==$de) {

$sql = "UPDATE c_chats SET vchata='0' WHERE id_cch ='$id_cch'";

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error;
}
echo "<script>
                window.location= 'artistchat.php'
        </script>";

  
}elseif($row['para']==$de){


$sql2 = "UPDATE c_chats SET vchatb='0' WHERE id_cch ='$id_cch'";

if ($connection->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error;
}

echo "<script>
                window.location= 'artistchat.php'
        </script>";
}






}


   mysqli_close($connection);


 ?>