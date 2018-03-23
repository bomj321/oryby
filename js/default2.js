$(document).ready(function(){


    $("tr.favory").on('click', function(e){
        var tbody = $(this).parent("tbody");
        var valor1 = $(this).children("td").children("a");
        var valor2 = $(this).children("td").children("p");

        //Obteniendo datos
        var producto = valor1.attr('class');
        var precio = valor2.attr('class');
        var email = tbody.attr('id');
        console.log(producto);
        console.log(precio);
        console.log(email);
		$.ajax({
            type: "POST",
            url: "add_showcase_toplist.php",
            data:("producto="+producto+"&precio="+precio+"&email="+email),
            dataType:"text",
        })
        .done(function(response){
            if(response == 1)
            {
                window.location.href = "cart.php";
            }
		});
        







    });
    


/*Cierre de Jquery*/   
});  