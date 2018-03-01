$(document).ready(function(){
    $("a.chart").on('click', function(e){
        var periodo = $(this).attr('href');
        console.log(periodo);
        var producto = $(this).parent().parent("ul");
        var id = producto.attr('id');
        console.log(id);


    });
    


/*Cierre de Jquery*/   
});  