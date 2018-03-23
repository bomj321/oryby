$(document).ready(function(){


    $("tr.favory").on('click', function(e){
        console.log(this);
        var id = $(this).parent("tbody");
        var valor1 = $(this).children("td").children("a");
        var valor2 = $(this).children("td").children("p");
        console.log( valor1.attr('class')       );  
        console.log( valor2.attr('class')       ); 
        console.log( id.attr('id')       ); 

    });
    


/*Cierre de Jquery*/   
});  