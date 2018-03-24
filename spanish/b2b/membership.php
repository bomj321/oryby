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
      <h2 class="text-center">Solicitar el envío de Membresias</h2>
      <br>
      <br>
    <div class="row">                       
      <div class="responsive">          
            <table class="table table-responsive table-hover table-bordered border">
              <thead >
                <tr>        
                <th style="background: #b7e8d1" class="dark">Principales características</th>
                <th style="background: #def7eb" class="light">Cuenta Básica</th>
                <th style="background: #def7eb" class="light">Cuenta Gratis</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border">
                  <td style="background: #b7e8d1"class="dark">Limites de Productos Publicados</td>
                  <td style="background: #def7eb" class="light">40</td>
                  <td style="background: #def7eb" class="light">10</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Lista Superior</td>
                  <td style="background: #def7eb" class="light">60</td>
                  <td style="background: #def7eb" class="light">7</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Mostrar Caso</td>
                  <td style="background: #def7eb" class="light">40</td>
                  <td style="background: #def7eb" class="light">5</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Comisión por venta</td>
                  <td style="background: #def7eb" class="light">5%</td>
                  <td style="background: #def7eb" class="light">7%</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Recomendado para la solicitud de compra</td>
                  <td style="background: #def7eb" class="light">Sí</td>
                  <td style="background: #def7eb" class="light">No</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Precio</td>
                  <td style="background: #def7eb" class="light">Dólar estadounidense $200</td>
                  <td style="background: #def7eb" class="light">Gratis</td>
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
    <div class="row">
    <div class="col-sm-4 col-md-4">
                    <div class="widget"> 
                        <ul class="items">
                            <li> 
                            <h4 class="pull-left">Precios</h4>                                
                            </li>
                            <li> 
                                10 Top List = 20 USD
                            </li>
                            <li> 
                                5 Show Case = 20 USD
                            </li>
                            <li> 
                                20 Top List - 10 Show Case = 60 USD
                            </li>
                            <li> 
                                50 Top List – 25 Show Case = 100 USD
                            </li>
                        </ul>
                        <br>
                        <a href="buy_st.php" class="btn btn-default btn-block semi-circle btn-md" style="margin-top:5px;">Comprar</a>
                    </div><!-- end widget -->                           
    </div>
    </div>
  </div><!-- end container -->
</section>

<!-- end section -->

<!-- start footer -->

    