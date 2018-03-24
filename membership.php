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
      <h2 class="text-center">Apply For MemberShip</h2>
      <br>
      <br>
    <div class="row">                       
      <div class="responsive">          
            <table class="table table-responsive table-hover memb">
              <thead >
                <tr>        
                <th style="background: #b7e8d1" class="dark">Main Features</th>
                <th style="background: #def7eb" class="light">Basic Account</th>
                <th style="background: #def7eb" class="light">Free Account</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Limits of published products</td>
                  <td style="background: #def7eb" class="light">40</td>
                  <td style="background: #def7eb" class="light">10</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Top List</td>
                  <td style="background: #def7eb" class="light">60</td>
                  <td style="background: #def7eb" class="light">7</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Show Case</td>
                  <td style="background: #def7eb" class="light">40</td>
                  <td style="background: #def7eb" class="light">5</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Comition Per Sale</td>
                  <td style="background: #def7eb" class="light">5%</td>
                  <td style="background: #def7eb" class="light">7%</td>
                </tr>
                <tr class="border">
                  <td  style="background: #b7e8d1" class="dark">Recommended for Buying Request</td>
                  <td style="background: #def7eb" class="light">Yes</td>
                  <td style="background: #def7eb" class="light">No</td>
                </tr>
                <tr class="border">
                  <td style="background: #b7e8d1" class="dark">Price</td>
                  <td style="background: #def7eb" class="light">USD $ 200</td>
                  <td style="background: #def7eb" class="light">Free</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="EMJFY5KBHX2LY">        
                        <input type="hidden" name="titlebasic" value="Basic Membership" />
                        <input type="hidden" name="price" value="$100" />     
                        <input type="submit"  name="save" value="BUY NOW" class="btn btn-default"/>
                      </form>
                  </td>
                  <td>
                      <form method="POST" action="register.php" >
                        <input type="hidden" name="title" value="Free Membership"/>
                        <input type="hidden" name="price" value="$0" />
                        <input name="save" type="submit" value="Join For Free"  class="btn btn-default"/>
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
                            <h4 class="pull-left">Prices</h4>                                
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
                        <a href="buy_st.php" class="btn btn-default btn-block semi-circle btn-md" style="margin-top:5px;">Buy</a>
                    </div><!-- end widget -->                           
    </div>
    </div>
  </div><!-- end container -->
</section>

<!-- end section -->

<!-- start footer -->
    