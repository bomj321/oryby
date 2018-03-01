<?php
    function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest'; 
    }
    $id = htmlspecialchars($_POST['id']);
    $periodo = htmlspecialchars($_POST['periodo']);
    $charType = strtolower($periodo);
    $description = "";
    include('Connect.php');
    {}
    switch ($charType) {
        case "y":
            $description = "Año";
            $sql="Select n.id_pid, year(n.visited_at) AS periodo,
            COUNT(n.id_pid) AS visitas FROM chart_basic_user n
            WHERE n.id_pid = '$id' GROUP BY year(n.visited_at),n.id_pid;";
        break;
        case "m":
            $description = "Mes";
            $sql="Select n.id_pid, MONTHNAME(n.visited_at) AS periodo,
            COUNT(n.id_pid) AS visitas FROM chart_basic_user n
            WHERE n.id_pid = '$id' GROUP BY MONTHNAME(n.visited_at),n.id_pid;";      
        break;
        case "d":
            $description = "Día";
            $sql="Select n.id_pid, n.visited_at AS periodo,
            COUNT(n.id_pid) AS visitas FROM chart_basic_user n
            WHERE n.id_pid = '$id' GROUP BY n.visited_at,n.id_pid";
        break;
    }
            
        $resultado = mysqli_query($connection,$sql);
        $new_array = [];
        while ($rows = $resultado->fetch_all(MYSQLI_ASSOC) ) { 
            $new_array= $rows; // Inside while loop
        }
        echo json_encode($new_array);
?>