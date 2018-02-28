<?php

//ruta de la imagen
  $target_dir = "spanish/b2b/images";
  
  $nombre_imagen = $_FILES['imagen']['name'];
  $tipo_imagen = $_FILES['imagen']['type'];
  $tamaño_imagen = $_FILES['imagen']['size'];
    //echo $tamaño_imagen = $_FILES['imagen']['size'];
      echo $tipo_imagen = $_FILES['imagen']['type'];


    if ($tamaño_imagen<=1000000) {




      // echo $tamaño_imagen = $_FILES['imagen']['size'];
       //ruta del destino del servidor
        $filelocation = $target_dir.$nombre_imagen;
        $tempfile1 = $_FILES['imagen']['tmp_name'];

        //mover imagen a directorio temporal
          move_uploaded_file($tempfile1, $filelocation); 

     

    }else{

        echo "<h3>El tamaño es demasiado grande</h3>";


    }

      




 ?>