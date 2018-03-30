<?php 
include('Connect.php');
$idProducto = 33;
$periodo="m";
$charType = strtolower($periodo);
$description = "";
$cadena = "1234"; 
$matriz1 = str_split($cadena);
$min=$matriz1[0].$matriz1[1]; 
$max=$matriz1[2].$matriz1[3];
echo $min;
echo $max;