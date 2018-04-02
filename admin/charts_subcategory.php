<?php
    function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
    }
    $id = htmlspecialchars($_POST['id']);
    $periodo = htmlspecialchars($_POST['periodo']);
    $charType = strtolower($periodo);
    $description = "";
    include('Connect.php');    

    switch ($charType) {
        case "y":
            $description = "Año";
            $año = htmlspecialchars($_POST['año']);
            $sql="Select n.id_subcatid, Monthname(n.visited_at) AS periodo, 
            COUNT(n.id_subcatid) AS visitas FROM chart_category_subcatego_admin n
            WHERE year(n.visited_at) = '$año' AND n.id_subcatid = '$id' GROUP BY 
            month(n.visited_at),n.id_subcatid;";
        break;
        case "d":
            $description = "Día";
            $año = htmlspecialchars($_POST['año']);
            $mes = htmlspecialchars($_POST['mes']);
            $dia = htmlspecialchars($_POST['dia']);
            $matriz1 = str_split($dia); 
            $min=$matriz1[0].$matriz1[1]; 
            $max=$matriz1[2].$matriz1[3];
            $sql="Select n.id_subcatid, (n.visited_at) AS periodo, 
            COUNT(n.id_subcatid) AS visitas FROM chart_category_subcatego_admin n
            WHERE n.id_subcatid = '$id'  AND YEAR(n.visited_at) = '$año' AND  
            MONTH(n.visited_at) = '$mes' AND DAY(n.visited_at) BETWEEN '$min'
            AND '$max' GROUP BY DAY(n.visited_at),n.id_subcatid order by DAY(n.visited_at)";
        break;
    }            
    $resultado = mysqli_query($connection,$sql);
    $new_array = [];
    while ($rows = $resultado->fetch_all(MYSQLI_ASSOC)) { 
    $new_array= $rows; 
    }
    echo json_encode($new_array);
?>