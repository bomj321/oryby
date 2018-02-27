<?php 
include('Connect.php');
include('head.php');

$meses=array('','Ene','Feb','Marz','Abril','Mayo','Jun','Jul','Agost','Sept','Oct','Nov','Dic');
for ($x=1; $x <= 12; $x++) {
      $dinero[$x]=0;
};

$ano=date('Y');


$sql="SELECT * FROM `chart_basic_user` ";
$datos=mysqli_query($connection,$sql);
  while($row=mysqli_fetch_array($datos)){
  $y=date("Y", strtotime ($row['visited_at'] ) );
  $mes=(int)date("m", strtotime ($row['visited_at']));
      if($y==$ano){
        $dinero[$mes]=$dinero[$mes]+$row['visit'];
      }
}
?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php for ($x=1; $x <= 12; $x++) {  ?>
            ["<?php echo $meses[$x];?>",<?php echo $dinero[$x];?>, "#b87333"],
        <?php }; ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
  </body>
</html>