<?php session_start();
error_reporting(0);
include('Connect.php');

include('head.php');

?>
<?php
include('topbar.php');
include('middlebar.php');
include('navh.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype'];
$qry="SELECT * FROM `seller` WHERE `email`='$email' ";
$result01=mysqli_query($connection,$qry);
 $count = mysqli_num_rows($result01);

if($count <=  0){
	 	?>
			  <script >;
               alert("Tu perfil esta incompleto  !");  //not showing an alert box.
		       window.location.href="profileComplete.php";
         </script>
		 
			<?php
			
}
else{
 }
 ?>
 <?php
 
 $qry="SELECT * FROM `users` WHERE `email`='$email'  AND `userstatus` ='0'";
$result01=mysqli_query($connection,$qry);
 $count = mysqli_num_rows($result01);


if($count > 0){
	 	?>
	
		 <script >;
                alert("Tu perfil esta en espera de ser aprobado !");  //not showing an alert box.
		       window.location.href="suppliers.php";
         </script>
			 
			<?php
}
else{
 }
 ?>
 
 <script>
$(document).ready(function() {
  
       $('#catid').on('change',function()
     {
    var domain_name = $(this).val();

	//alert(domain_name);
    var dataString = "domain_name="+domain_name;
    if(domain_name)
    {
      $.ajax({
        type:'POST',
        url:'subcategoryList.php',
        data: dataString,


        success:function(html) {
          $('#ShowSubcategory').html(html);
		  $('#Show').hide(html);
        }
      });

    }
	else{
		$('#ShowSubcategory').hide(html);
		$('#Show').html(html);
	}
  
    });

 
  }); 


</script>
  <?php
 
   $sqlquery="SELECT * FROM `membership` WHERE `email`='$email' ORDER BY membershipid DESC";
$result1=mysqli_query($connection,$sqlquery);
 $nr = mysqli_num_rows($result1);
 $row = mysqli_fetch_array($result1);
  $membershipType = $row['membershiptype'];
 if($nr <0 )
{
?>
<script>
alert("Get Membership First");
window.location.href="membership.php";
</script>
<?php
}  



 $sql="SELECT * FROM seller Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    
$row=$stmt->fetch_assoc();
$userId=$row['user_id'];
$totalproduct=$row['limitTotalProduct']; 
$producttoplist=$row['limitTopList']; 
$productshowcase=$row['limitShowCase']; 
?>
 <?php
 
$fm='Free Membership';
$bm ='Basic Membership';
 $membershiptype;
$str1 = preg_replace('/\s+/', ' ', trim($membershipType));
$str2 = preg_replace('/\s+/', ' ', trim($fm));
$str3 = preg_replace('/\s+/', ' ', trim($bm));
if(trim($str1) ==trim($str2))
{

   if($totalproduct <= '0' )
   {
   ?>
    <script>
	 alert("Your Product Limit Exceeded");
	 window.location.href="suppliers.php";
	 </script>
   <?php
   }
   else
   {
     if($producttoplist <= '0')
	 {
	 ?>
	 <script>
	 alert("Your Top List Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	 if($productshowcase <= '0')
	 {
	  ?>
	 <script>
	 alert("Your Show Case Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	
  
   }
}
else if(trim($str1) ==trim($str3))
{
  if($totalproduct <= '0' )
   {
   ?>
    <script>
	 alert("Your Product Limit Exceeded");
	 window.location.href="suppliers.php";
	 </script>
   <?php
   }
   else
   {
     if($producttoplist <= '0')
	 {
	 ?>
	 <script>
	 alert("Your Top List Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	 if($productshowcase <= '0')
	 {
	  ?>
	 <script>
	 alert("Your Show Case Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	
  
   }
  
  }

 

 ?>
		<script src="editor.js"></script>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
				
				$("#keyword").blur(function(){
    
	 
                var keyword=$('#keyword').val();

     $.ajax({
                    type:'POST',
                    url:"saveval.php",
                    data:'val='+keyword,
                    success:function(response){
                    //alert(response);
					var keysd = [response,","];
					$('#selectedkey').append(keysd);
					
                    }
                }); 
});
				
	
			});
		</script>
		
	     <!-- start section -->
            <div class="container">
			 <!-- start Form -->
                  <form action="addproduct.php" method="POST" enctype="multipart/form-data">				  
			  <div class="row">
				<h2 class="text-center">AGREGA PRODUCTOS</h2>			
					<div class="col-sm-8 col-sm-offset-2">  
					<div class="form-inline">				
						<?php  $membershipType ?>	
						<?php
							$sql="SELECT * FROM categories WHERE NOT title ='Eco Friendly' AND NOT title ='Innovation'";
							$stmt=mysqli_query($connection,$sql);
							if($stmt == false) {
							trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
							}
							$nr=mysqli_num_rows($stmt);

							if ($nr > 0)
							{
						?>
							<div class="form-group ">
								<select class="form-control " id="catid" name="catid" required>
								<option  value="">Selecciona la Categoria</option>
									<?php while($row=$stmt->fetch_assoc()){ ?>
										<option value="<?php echo $row['catid']; ?>"><?php echo $row['titulo']; ?></option>
									<?php } ?>
								</select>
							</div>
						<?php } ?>
						<div class="form-group " id="ShowSubcategory">
							<select id="Show" class="form-control "> 
								<option value=""> Primera Categoria </option> </select></div>  
					</div>
					</div>  
				</div>  <!-- row  -->
				<hr>
				<div class="row">			  
					<div class="col-sm-4" style="margin-left:200px;margin-top:0px;">				
						<div class="form-group"><label> Titulo del producto <span class="text-danger">*</span></label></div> <br> 
						<div class="form-group"><label> Palabra Clave <span class="text-danger">*</span></label> </div> <br> 
						<div class="form-group"><label> Palabra Clave Seleccionada</label></div> 
					</div>
					<div class="col-sm-4" style="margin-left:-200px;">
						<div class="form-group">
							<input required type="text" class="form-control " required placeholder="Inserta el Titulo" name="title" id="title">
						</div>
						<div class="form-group">
							<input required type="text" class="form-control" required placeholder="Inserta palabra clave" name="keyword" id="keyword" >
						</div>
						<div class="form-group">
							<textarea  class="form-control" placeholder="Palabra clave" name="selectedkeyword" id="selectedkey">  </textarea>
						</div>
					</div>
						<?php
                            $sqll="Select * from `images` where id = '2'";
                            $result=mysqli_query($connection,$sqll);
                        ?>

                        <?php while ($results = $result->fetch_all(MYSQLI_ASSOC) ) { ?>
                        <?php foreach($results as $resu): ?>
						<div class="col-sm-4 col-md-4">
							<img src="images/<?php echo $resu['image'];?>" alt="imagen"  class="pull-right" style="width:20rem;height:17rem">
						</div>
						<?php endforeach;?>
						<?php }?>
				</div>
				<!-- END of ROW -->
		<div class="row"> 
				<h4 style="margin-left:90px;"> Detalles:</h4> 
				<br>
				<div class="col-sm-4" style="margin-left:200px;margin-top:0px;">
				<div class="row">
					<div class="form-group col-sm-6"><label> Pais<span class="text-danger">*</span> </label></div>               
				</div>

				<div class="form-group" style="margin-top:20px;"><label> Peso: <span class="text-danger">*</span>  </label></div>
				<div class="form-group" style="margin-top:20px;"><label> Volumen:</label></div> 
				<div class="form-group" style="margin-top:35px;"><label> Dimensiones: </label></div> 
				<div class="form-group" style="margin-top:30px;"><label> Capacidad: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Fuente de Poder:</label></div> 				 
				<div class="form-group" style="margin-top:40px;"><label> Velocidad de Rotacion:</label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Material de Elaboracion: <span class="text-danger">*</span></label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Uso: <span class="text-danger">*</span></label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Tamaño: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Empaquetado  <span class="text-danger">*</span>  </label></div>
                <div class="form-group" style="margin-top:20px;"><label> Tipo de Producto: </label></div> 				
				<div class="form-group" style="margin-top:20px;"><label> Certificacion del Producto: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Imagen del Producto: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label>Precio FOB <span class="text-danger">*</span></label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Ordenes Minimas <span class="text-danger">*</span></label></div> 
				<div class="form-group" style="margin-top:20px;"><label>Detalles de envío: </label></div>
				<div class="form-group" style="margin-top:20px;"><label> Metodo de Pagos: </label></div>				
				</div>
				<div class="col-sm-4" style="margin-left:-200px;">
				<div class="row">
				<div class="form-group col-sm-6">
			<select  class="form-control " id="unit" name="dropcountry" required>

	                <option value="Chile">Chile</option>
					<option value="Afganistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bonaire">Bonaire</option>
					<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Canary Islands">Canary Islands</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Channel Islands">Channel Islands</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos Island">Cocos Island</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote DIvoire">Cote D'Ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Curaco">Curacao</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="East Timor">East Timor</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands">Falkland Islands</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Ter">French Southern Ter</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Great Britain">Great Britain</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran">Iran</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea North">Korea North</option>
					<option value="Korea Sout">Korea South</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libya">Libya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Midway Islands">Midway Islands</option>
					<option value="Moldova">Moldova</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Nambia">Nambia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherland Antilles">Netherland Antilles</option>
					<option value="Netherlands">Netherlands (Holland, Europe)</option>
					<option value="Nevis">Nevis</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau Island">Palau Island</option>
					<option value="Palestine">Palestine</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Phillipines">Philippines</option>
					<option value="Pitcairn Island">Pitcairn Island</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Republic of Montenegro">Republic of Montenegro</option>
					<option value="Republic of Serbia">Republic of Serbia</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="St Barthelemy">St Barthelemy</option>
					<option value="St Eustatius">St Eustatius</option>
					<option value="St Helena">St Helena</option>
					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
					<option value="St Lucia">St Lucia</option>
					<option value="St Maarten">St Maarten</option>
					<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
					<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
					<option value="Saipan">Saipan</option>
					<option value="Samoa">Samoa</option>
					<option value="Samoa American">Samoa American</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia">Serbia</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syria">Syria</option>
					<option value="Tahiti">Tahiti</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Erimates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States of America">United States of America</option>
					<option value="Uraguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vatican City State">Vatican City State</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
					<option value="Wake Island">Wake Island</option>
					<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
					<option value="Yemen">Yemen</option>
					<option value="Zaire">Zaire</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>						 
                         </select>
				</div>
				<div class="form-group col-sm-2">
					<label>Puerto<span class="text-danger">*</span></label></div> 
				
				<div class="form-group col-sm-4" style="padding-right:0px;">
				<input type="text" class="form-control " required placeholder="Puerto" name="port" id="port">
				</div>
				</div>
				<div class="row">
				     <div class="form-group col-sm-8" style="padding-right:0px;">
						<input type="text" class="form-control " placeholder="Inserte Peso" name="wquantity" id="wquantity"> 
						</div>
							<div class="form-group col-sm-4" style="padding-left:0px;">
							<select class="form-control " id="unit" name="dropweight" >
	                         <option value="kilogram">Kilogramo</option>  
                             <option value="Gram">Gramo</option>  
							 <option value="piece">Pieza</option>  
							 <option value="ton">Ton</option>
							 <option value="cubic meter">Metro Cúbico</option>  
						     <option value="20 ft conteiner">Envase de 20ft</option> 
                             <option value="40 ft conteiner">Envase de 40ft</option>
                             <option value="litter">Litter</option>		
                             <option value="others">Others</option>							 
                         </select>
				         </div>
						 </div>
				<div class="row">
				        <div class="form-group col-sm-8" style="padding-right:0px;">
						<input  type="text" class="form-control " placeholder="Volumen" name="vquantity" id="quantity"> 
						</div>
						<div class="form-group col-sm-4" style="padding-left:0px;">
						<select class="form-control " id="unit" name="dropvolum">
	                         <option value="">Volumen</option>  
                             <option value="Cubic meter">Metro Cúbico</option>  
							 <option value="Cubic feet">Pie Cúbico</option>  
							 <option value="Cubic Centimeter">Centrimetro Cúbico</option>
							 <option value="cubic meter">Metro Cúbico</option>  
						    
                             <option value="litter">Litro</option>		
                             <option value="others">Otros</option>							 
                         </select>
				         </div>
						 </div>
						 <div class="row">
						 <div class="form-group col-sm-8" style="padding-right:0px; margin-top: 10px;">
						 <input  type="text" class="form-control " placeholder="Dimensiones" name="dquantity" id="quantity"> 
						 </div>
				<div class="form-group col-sm-4" style="padding-left:0px;">
						 <select class="form-control " id="unit" name="dropdimension">
	                         <option value="feet">Pie</option>  
                             <option value="Inch">Pulgada</option>  
							 <option value="Centimeter">Centímetro</option>  
							 <option value="Meter">Metro</option>
							
                             <option value="others">Otros</option>							 
                         </select>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-sm-8" style="padding-right:0px;">
						<input  type="text" class="form-control " placeholder="Inserte Capacidad" name="cquantity" id="quantity"> 
						 </div>
						 <div class="form-group col-sm-4" style="padding-left:0px;">
						 <select class="form-control" id="unit" name="dropcapacity">
	                         <option value="Ton">Tonelada</option>  
                             <option value="Kilogram">Kilogramo</option>  
							 <option value="Cubic Feet">Pie Cúbico</option>  
							 <option value="Cubic meter">Metro Cúbico</option>
							 <option value="Pound">Onza</option>  
						     

                             <option value="others">Otros</option>							 
                         </select>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-sm-8" style="padding-right:0px;">
				<input  type="text" class="form-control " placeholder="Inserte Fuente de Poder" name="equantity" id="quantity">
				</div>
				<div class="form-group col-sm-4" style="padding-left:0px;">
						<!--<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity"> -->
						 <select required class="form-control " id="energy" name="dropenergy">
	                         <option value="Volt">Voltio</option>  
                             <option value="Ohm">Ohmio</option>  
							 <option value="Watt">Watt</option>  
							 <option value="empere">Amperio</option>
									
                             <option value="others">Otros</option>							 
                         </select>
				</div>
				</div>
				<div style="margin-top: 26px;" class="form-group">
						<input  type="text" class="form-control input-sm" placeholder="Rotacion" speed" name="rotation" id="rot">
				</div>
				<div class="form-group">
						<input required type="text" class="form-control input-sm" placeholder="Material de Elaboración" name="elobration" id="elobration">
				</div>
				<div class="form-group">
						<input type="text" class="form-control input-sm" required placeholder="Uso" name="use" id="use">
				</div>
				<div class="form-group">
						 <select class="form-control " id="unit" name="size">
	                         <option value="Small">Pequeño</option>  
                             <option value="Medium">Mediano</option>  
							 <option value="Large">Grande</option>  
							 <option value="Extra large">Extra Grande</option>
								
                             <option value="others">Otro</option>							 
                         </select>
				</div>
				<div class="form-group">
						 <select required class="form-control " id="unit" name="packaging" require>
	                         <option value="Bag">Bolso</option>  
                             <option value="Bottle">Botella</option>  
							 <option value="Can">Lata</option>  
							 <option value="Barrel">Barril</option>
							 <option value="Carton">Carton</option>  
						     <option value="Wooden Box">Caja de Madera</option>  
                          		
                             <option value="others">Otro</option>							 
                         </select>	
						 </div>
					

					
						 
						 <div class="form-group ">
		
			<select  required class="form-control " name="productType">
			<option  value="">Selecciona el tipo de Producto</option>
			<option value="Eco Friendly" >Eco Friendly</option>
			<option value="Innovation" >Innovacion</option>
			<option value="Normal Product" >Producto Normal</option>
	
			</select>
			
			</div>
	



						 
						 
						 <div style="margin-top: -5px;" class="form-group">
						   <input id="files" class="form-control " type="file"  name="file1"/>
                           	
						 </div>
						  <div class="form-group">
						   <input  id="files1" class="form-control " type="file"  name="file2[]" multiple="multiple"/>
                           	
						 </div>
						 <div class="row">
						 <div class="form-group col-sm-8" style="padding-right:0px;"> <input class="form-control " type="text" placeholder="FOB Price"  name="fobprice" required /></div>
					   <div class="form-group col-sm-4"  style="padding-left:0px;">
						   <select class="form-control " id="unit" name="dropminimum">
	                         <option value="Unit">Unidad</option>  
                             <option value="Ton">Tonelada</option>  
							 <option value="Gram">Gramo</option>  
							 <option value="Inch">Pulgada</option>
							 <option value="ounace">Onza</option>  
						     <option value="Gallon">Galón</option>  
                             <option value="Feet">Píe</option>
                             <option value="Cubic Meter">Metro Cúbico</option>
							 <option value="Cubic Feet">Píe Cúbico</option> 
						     <option value="20 ft container">Envase de 20 ft</option>
							 <option value="40 ft container">nvase de 40 ft</option>
							<option value="Pallets">Embalajes</option>	
							<option value="Carton">Caja</option>	
                            <option value="others">Otros</option>							 
                         </select>         	
						 </div>
					<div class="form-group col-sm-8" style="padding-right:0px;"> <input class="form-control " type="text"  placeholder="Orden Minima" name="oquantity" required /></div>
					   <div class="form-group col-sm-4"  style="padding-left:0px;">
						   <select class="form-control " id="unit" name="dropminimum2">
	                         <option value="Unit">Unidad</option>  
                             <option value="Ton">Tonelada</option>  
							 <option value="Gram">Gramo</option>  
							 <option value="Inch">Pulgada</option>
							 <option value="ounace">Onza</option>  
						     <option value="Gallon">Galón</option>  
                             <option value="Feet">Píe</option>
                             <option value="Cubic Meter">Metro Cúbico</option>
							 <option value="Cubic Feet">Píe Cúbico</option> 
						     <option value="20 ft container">Envase de 20 ft</option>
							 <option value="40 ft container">Envase de 40 ft</option>
							<option value="Pallets">Embalajes</option>	
							<option value="Carton">Caja</option>	
                            <option value="others">Otros</option>							 
                         </select>         	
						 </div>
						 </div>
						 <div class="form-group">
								 <input type="text" class="form-control input-sm" placeholder="Detalles de Envio" name="delivery_details" id="delivery_details">
						 </div>	
						 <div class="form-group">
							<select class="form-control " id="payment" name="payment">
								<option value="Paypal">Paypal</option>  
								<option value="WebPay">WebPay</option>  
								<option value="Paypal and WebPay">Paypal y WebPay</option>  							 
							</select>   
						 </div>
						</div>	
						<?php
                            $sqll="Select * from `images` where id = '4' ";
                            $result=mysqli_query($connection,$sqll);
                        ?>

                        <?php while ($results = $result->fetch_all(MYSQLI_ASSOC) ) { ?>
                        <?php foreach($results as $resu): ?>
						<div class="col-sm-4 col-md-4">
							<img src="images/<?php echo $resu['image'];?>" alt="imagen"  class="pull-right" style="width:20rem;height:28rem">
						</div>
						<?php endforeach;?>
						<?php }?>				
				</div>	

				<!------------------------------EDITOR---------------->
				<div class="row">
				<?php 
				include('editor.php');
				 ?>	
				
               </div>	
                <!------------------------------EDITOR---------------->
			
		<div class="form-group col-sm-8">
									<h3>Área de vista previa de la imagen cargada </h3>
									 <div id="selectedFiles"></div>
 <div id="selectedFiles1"></div>
		</div>	
		
		  <center><button type="submit" name="save" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; SAVE</i>
        </button>
		<a href="suppliers.php" class="btn btn-warning"><i class="fa fa-times"></i> CANCEL</a>
       </input>
           </br>
         
        </center>
        
	  </form>  
 <!-- END of FORM -->	  
       </div><!-- end col -->    
                <!-- end row -->
            </div><!-- end container -->
		</div>	
		
		<!-- Trigger the modal with a button -->
     	 <script>
	var selDiv = "";
		
	document.addEventListener("DOMContentLoaded", init, false);
	
	function init() {
		document.querySelector('#files').addEventListener('change', handleFileSelect, false);
		selDiv = document.querySelector("#selectedFiles");
	}
		
	function handleFileSelect(e) {
		
		if(!e.target.files || !window.FileReader) return;
		
		selDiv.innerHTML = "";
		
		var files = e.target.files;
		var filesArr = Array.prototype.slice.call(files);
		filesArr.forEach(function(f) {
			if(!f.type.match("image.*")) {
				return;
			}
	
			var reader = new FileReader();
			reader.onload = function (e) {
				var html = "<img src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
				selDiv.innerHTML += html;				
			}
			reader.readAsDataURL(f); 
			
		});
		
		
	}
	</script>
	<script>
	var selDiv = "";
		
	document.addEventListener("DOMContentLoaded", init1, false);
	
	function init1() {
		document.querySelector('#files1').addEventListener('change', handleFileSelect, false);
		selDiv = document.querySelector("#selectedFiles1");
	}
		
	function handleFileSelect(e) {
		
		if(!e.target.files || !window.FileReader) return;
		
		selDiv.innerHTML = "";
		
		var files = e.target.files;
		var filesArr = Array.prototype.slice.call(files);
		filesArr.forEach(function(f) {
			if(!f.type.match("image.*")) {
				return;
			}
	
			var reader = new FileReader();
			reader.onload = function (e) {
				var html = "<img src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
				selDiv.innerHTML += html;				
			}
			reader.readAsDataURL(f); 
			
		});
		
		
	}
	</script>
 <?php        

include('footer.php');
?>

    