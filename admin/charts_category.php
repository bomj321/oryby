<?php
    function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
    }
    $periodo = htmlspecialchars($_POST['periodo']);
    $charType = strtolower($periodo);
    $description = "";
    include('Connect.php');   

    switch ($charType) {
        case "y":
            $description = "Año";
            $año = htmlspecialchars($_POST['año']);
            $sql="Select n.id_catid AS categoria, year(n.visited_at) AS periodo, 
            COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
            WHERE year(n.visited_at) = '$año' GROUP BY 
            year(n.visited_at),n.id_catid order by COUNT(n.id_catid);";
        break;
        case "m":
            $description = "Mes";
            $año = htmlspecialchars($_POST['año']);
            $mes = htmlspecialchars($_POST['mes']);
            $sql="Select n.id_catid, MONTHNAME(n.visited_at) AS periodo, 
            COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
            WHERE MONTH(n.visited_at) = '$mes' AND YEAR(n.visited_at) = '$año' 
            GROUP BY MONTHNAME(n.visited_at),n.id_catid order by COUNT(n.id_catid)";      
        break;
        case "d":
            $description = "Día";
            $año = htmlspecialchars($_POST['año']);
            $mes = htmlspecialchars($_POST['mes']);
            $dia = htmlspecialchars($_POST['dia']);
            $matriz1 = str_split($dia); 
            $min=$matriz1[0].$matriz1[1]; 
            $max=$matriz1[2].$matriz1[3];
            $sql="Select n.id_catid, (n.visited_at) AS periodo, 
            COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
            WHERE YEAR(n.visited_at) = '$año' AND  
            MONTH(n.visited_at) = '$mes' AND DAY(n.visited_at) BETWEEN '$min'
            AND '$max' GROUP BY DAY(n.visited_at),n.id_catid order by COUNT(n.id_catid)";
        break;
    }            
    $resultado = mysqli_query($connection,$sql);
    $new_array = [];
    while ($rows = $resultado->fetch_all(MYSQLI_ASSOC)) { 
    $new_array= $rows; 
    }
    echo json_encode($new_array);
?>