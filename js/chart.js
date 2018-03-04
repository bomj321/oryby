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
            console.log(dataChart);
            // aqui ya pasarle el arreglo a la grafica

        });
        


    });
    


/*Cierre de Jquery*/   
});  