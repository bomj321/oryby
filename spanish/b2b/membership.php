<?php session_start();
error_reporting(0);
include('Connect.php');
include('head.php');
 include('topbar.php');
 include('middlebar.php');  
 include('navh.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype']; 
?>

<!-- start section -->
<section class="section white-backgorund ">
  <div class="container">
      <h2 class="text-center">Solicitar el envío del miembro</h2>
      <br>
      <br>
    <div class="row">                       
      <div class="responsive">          
            <table class="table table-responsive table-hover table-bordered">
              <thead >
                <tr>        
                <th class="dark">Principales características</th>
                <th class="light">Cuenta Básica</th>
                <th class="light">Cuenta Gratis</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border">
                  <td class="dark">Limites de Productos Publicados</td>
                  <td class="light">40</td>
                  <td class="light">10</td>
                </tr>
                <tr class="border">
                  <td class="dark">Lista Superior</td>
                  <td class="light">60</td>
                  <td class="light">7</td>
                </tr>
                <tr class="border">
                  <td class="dark">Mostrar Caso</td>
                  <td class="light">40</td>
                  <td class="light">5</td>
                </tr>
                <tr class="border">
                  <td class="dark">Comisión por venta</td>
                  <td class="light">5%</td>
                  <td class="light">7%</td>
                </tr>
                <tr class="border">
                  <td  class="dark">Recomendado para la solicitud de compra</td>
                  <td class="light">Sí</td>
                  <td class="light">No</td>
                </tr>
                <tr class="border">
                  <td class="dark">Precio</td>
                  <td class="light">Dólar estadounidense $200</td>
                  <td class="light">Gratis</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="EMJFY5KBHX2LY">        
                        <input type="hidden" name="titlebasic" value="Basic Membership" />
                        <input type="hidden" name="price" value="$100" />     
                        <input type="submit"  name="save" value="COMPRAR AHORA" class="btn btn-default"/>
                      </form>
                  </td>
                  <td>
                      <form method="POST" action="register.php" >
                        <input type="hidden" name="title" value="Free Membership"/>
                        <input type="hidden" name="price" value="$0" />
                        <input name="save" type="submit" value="Únete Gratis"  class="btn btn-default"/>
                      </form>  
                  </td>
                </tr>
              </tbody>
            </table>
      </div>
    </div><!-- end row -->
  </div><!-- end container -->
</section>

<!-- end section -->

<!-- start footer -->

    