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
			<h2 style="text-align:center">Solicitar el envío del miembro</h2>
			</br>
			</br>
                <div class="row">
			
						
			
				 
				
				
				 
                   
				
	
		
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="EMJFY5KBHX2LY">

				 
				<input type="hidden" name="titlebasic" value="Basic Membership" />
				<input type="hidden" name="price" value="$100" />
                  
				<!--<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GL8PRJ9GVWFC2">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
-->
		
     <div class="  responsive" style="margin-right:10px;">          
  <table class="table table-responsive table-bordered" style="border:1px solid lightgray">
    <thead >
      <tr>
        
        <th style="border:1px solid lightgray">Principales características</th>
        <th style="border:1px solid lightgray">Cuenta Básica</th>
        <th style="border:1px solid lightgray">Cuenta gratis</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="border:1px solid lightgray">Límites de productos publicados</td>
        <td style="border:1px solid lightgray">40</td>
        <td style="border:1px solid lightgray">10</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Lista superior</td>
        <td style="border:1px solid lightgray">60</td>
        <td style="border:1px solid lightgray">7</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Mostrar caso</td>
        <td style="border:1px solid lightgray">40</td>
        <td style="border:1px solid lightgray">5</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Comición por venta</td>
        <td style="border:1px solid lightgray">5%</td>
        <td style="border:1px solid lightgray">7%</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Recomendado para la solicitud de compra</td>
        <td style="border:1px solid lightgray">Sí</td>
        <td style="border:1px solid lightgray">No</td>
      </tr>
	   <tr>
        <td style="border:1px solid lightgray">Precio</td>
        <td style="border:1px solid lightgray">Dólar estadounidense $ 200</td>
        <td style="border:1px solid lightgray">Gratis</td>
      </tr>
	     <tr>
        <td></td>
		
		<td><input type="submit"  name="save" value="COMPRA AHORA" class="btn btn-default"/></td>
        
		</form>
			<form method="POST" action="register.php" >
	
                 
	     <input type="hidden" name="title" value="Free Membership"/>
		<input type="hidden" name="price" value="$0" />
        <td><input name="save" type="submit" value="Únete gratis"  class="btn btn-default"/></td>
			</form>  
      </tr>
    </tbody>
  </table>
  </div>
		
				
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
				
        <!-- end section -->
               
        <!-- start footer -->
    