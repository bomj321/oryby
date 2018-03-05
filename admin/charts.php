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
            $sql="Select n.id_catid, year(n.visited_at) AS periodo, 
                COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
                WHERE n.id_catid = '$id' GROUP BY year(n.visited_at),n.id_catid;";
        break;
        case "m":
            $description = "Mes";
            $sql="Select n.id_catid, MONTHNAME(n.visited_at) AS periodo, 
                COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
                WHERE n.id_catid = '$id' GROUP BY year(n.visited_at),n.id_catid;";
      
        break;
        case "d":
            $description = "Día";
            $sql="Select n.id_catid, n.visited_at AS periodo,
            COUNT(n.id_catid) AS visitas FROM chart_category_subcatego_admin n
            WHERE n.id_catid = '$id' GROUP BY n.visited_at,n.id_catid";
        break;
    }
            
        $resultado = mysqli_query($connection,$sql);
        $new_array = [];
        while ($rows = $resultado->fetch_all(MYSQLI_ASSOC)) { 
            $new_array= $rows; 
        }
        echo json_encode($new_array);
?>