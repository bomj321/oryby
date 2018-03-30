<?php 
include('Connect.php');

$idProducto = 33;
$periodo="m";
$charType = strtolower($periodo);
$description = "";

switch ($charType) {
    case "y":
        $description = "Año";
        $visitas="Select n.id_pid, year(n.visited_at) AS periodo,
        COUNT(n.id_pid) AS visitas FROM chart_basic_user n
        WHERE n.id_pid = 33 GROUP BY year(n.visited_at),n.id_pid;";
    break;
    case "m":
        $description = "Mes";
        $visitas="Select n.id_pid, MONTHNAME(n.visited_at) AS periodo,
        COUNT(n.id_pid) AS visitas FROM chart_basic_user n
        WHERE n.id_pid = 33 GROUP BY MONTHNAME(n.visited_at),n.id_pid;";      
    break;
    case "d":
        $description = "Día";
        $visitas="Select n.id_pid, n.visited_at AS periodo,
        COUNT(n.id_pid) AS visitas FROM chart_basic_user n
        WHERE n.id_pid = 33 GROUP BY n.visited_at,n.id_pid";
    break;
}
$datos_usuario=mysqli_query($connection,$visitas);
?>
<script> var dataChart = [];</script>

<?php while ($titulo = $datos_usuario->fetch_all(MYSQLI_ASSOC) ) { ?>
    <?php foreach($titulo as $titu): ?>
      <script> dataChart.push(
                <?php echo "'$titu[periodo]'";?>,
                <?php echo "'$titu[visitas]'";?>
              );
              console.log(dataChart);
      </script>
    <?php endforeach;?>
<?php }?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
            var data = new google.visualization.DataTable();
                data.addColumn('string', '<?php echo $description;?>'); 
                data.addColumn('number', 'Visit'); 
                data.addRows([
                  ["01", 2],
                  ["04", 3],
                  ["05", 2],
                  ["08", 11],
                  ["10", 7]
            ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>