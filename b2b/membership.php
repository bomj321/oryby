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
			<h2 style="text-align:center">Apply For Member Ship</h2>
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
        
        <th style="border:1px solid lightgray">Main Features</th>
        <th style="border:1px solid lightgray">Basic Account</th>
        <th style="border:1px solid lightgray">Free Account</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="border:1px solid lightgray">Limits of published products</td>
        <td style="border:1px solid lightgray">40</td>
        <td style="border:1px solid lightgray">10</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Top List</td>
        <td style="border:1px solid lightgray">60</td>
        <td style="border:1px solid lightgray">7</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Show Case</td>
        <td style="border:1px solid lightgray">40</td>
        <td style="border:1px solid lightgray">5</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Comition Per Sale</td>
        <td style="border:1px solid lightgray">5%</td>
        <td style="border:1px solid lightgray">7%</td>
      </tr>
	     <tr>
        <td style="border:1px solid lightgray">Recommended for Buying Request</td>
        <td style="border:1px solid lightgray">Yes</td>
        <td style="border:1px solid lightgray">No</td>
      </tr>
	   <tr>
        <td style="border:1px solid lightgray">Price</td>
        <td style="border:1px solid lightgray">USD $ 200</td>
        <td style="border:1px solid lightgray">Free</td>
      </tr>
	     <tr>
        <td></td>
		
		<td><input type="submit"  name="save" value="BUY NOW" class="btn btn-default"/></td>
        
		</form>
			<form method="POST" action="register.php" >
	
                 
	     <input type="hidden" name="title" value="Free Membership"/>
		<input type="hidden" name="price" value="$0" />
        <td><input name="save" type="submit" value="Join For Free"  class="btn btn-default"/></td>
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
    