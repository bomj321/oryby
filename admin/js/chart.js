$(document).ready(function(){
    $("a.chart").on('click', function(e){
        var periodo = $(this).attr('href');
        var producto = $(this).parent().parent("ul");
        var id = producto.attr('id');
        var row = []  ;
        $.ajax({
            type: "POST",
            url: "charts.php",
            data:("id="+id+"&periodo="+periodo),
            dataType:"text",
        })
        .done(function(response){
            var resultado = JSON.parse(response);
            const dataChart = [];
            for(let i = 0; i < resultado.length; i++){
                dataChart.push([resultado[i].periodo, resultado[i].visitas])
            }
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                console.log(dataChart);
                    var data = new google.visualization.DataTable();
                        data.addColumn('string', ''); 
                        data.addColumn('string', 'Visit'); 
                        data.addRows(dataChart,                               
                    );

                var options = {
                chart: {
                    title: 'Visit',
                    subtitle: '',
                }
                };                        

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }


 
            
         });              
    });




/*Cierre de Jquery*/   
});  