$(document).ready(function(){

    //Categorias
    $("button.pull-right").on('click', function(e){
        var producto = $(this).parent().parent().parent().parent().parent("div");
        var id = producto.attr('id');
        var periodo = $(this).attr('name');
        switch (periodo) { 
            case 'y': 
                var div = $(this).parent().parent().parent("div");
                var select = div.children("div").children("select");
                var año = select.val();
                var datos = {
                    id : id,
                    periodo : periodo,
                    año : año
                };
                console.log(datos);
            break;
            case 'd':
                var select = $("#day_año");
                var año = select.val();
                var select2 = $("#day_month");
                var mes = select2.val();
                var select3 = $("#day_day");
                var dia = select3.val();
                var datos = {
                    id : id,
                    periodo : periodo,
                    año : año,
                    mes:mes,
                    dia:dia
                };        
            break;
        }
        var row = [];

        $.ajax({
            type: "POST",
            url: "charts__user.php",
            data:(datos),
            dataType:"text",
        })
        .done(function(response){
            var resultado = JSON.parse(response);
            const dataChart = [];
            for(let i = 0; i < resultado.length; i++){
                dataChart.push([resultado[i].periodo, parseInt(resultado[i].visitas) ])
            }
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                    var data = new google.visualization.DataTable();
                        data.addColumn('string', ''); 
                        data.addColumn('number', 'Visit'); 
                        data.addRows(dataChart,                               
                    );
                    var options = {
                        chart: {
                            title: 'Visit',
                            subtitle: 'Orybu',
                        }
                    };                      

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }      
            
         });          
    });
/*Cierre de Jquery*/   
});  