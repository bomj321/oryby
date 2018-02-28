<?php 
include('Connect.php');
$usuario="SELECT title FROM categories" ;
$datos_usuario=mysqli_query($connection,$usuario);
?>
<?php while ($titulo = $datos_usuario->fetch_all(MYSQLI_ASSOC) ) { ?>
    <?php foreach($titulo as $titu): ?>
        <?php echo $titu['title'];?>
    <?php endforeach;?>
<?php }?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Visit'],
          ['2014', 100,],
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