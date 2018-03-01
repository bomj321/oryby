$(document).ready(function(){


    $("a.chart").on('click', function(e){
        var periodo = $(this).attr('href');
        console.log(periodo);
        var producto = $(this).parent().parent("ul");
        var id = producto.attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "charts.php",
            data:("id="+id+"&periodo="+periodo),
            dataType:"json",
        })
        .done(function(response){
			console.log(response);
        });
        


    });
    


/*Cierre de Jquery*/   
});  