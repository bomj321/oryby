<?php session_start();
$_SESSION['skeywords']=$_POST['val'];
echo $_SESSION['skeywords'];
//$cart= array($_SESSION['skeywords']);

?>