$(document).ready(function(){

    $('.example').DataTable();
    $("a.eliminar").on('click', function(e){
        var id = this.id;
        alert("Este mensaje será eliminado");      
		/*Eliminando*/
		$.ajax({
            type: "GET",
            url: "eliminar.php",
            data:("id="+id),
            dataType:"json",
        })
        .done(function(response){
			console.log(response);
			if(response.respuesta == 1){
				location.reload();
			}
		});
    });
    


/*Cierre de Jquery*/   
});  