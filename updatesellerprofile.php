<?php session_start();
require 'Connect.php';
error_reporting(0);
include('head.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype'];
 	
$sql="SELECT * FROM seller  WHERE email='$email'";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

$row = mysqli_fetch_array($stmt);


   $companyName= $row['company_name'];
    $companyLegalNo= $row['companyLegalNo'];
		 $street= $row['street'];
		  $city= $row['city'];
		  $province= $row['province'];
		  $zipCode= $row['zipCode'];
		   $countryName= $row['countryName'];
		   $businessType= $row['businessType'];
		  $noOfEmployee= $row['noOfEmployee'];
		   $companyDescription= $row['companyDescription'];
		 $companylogo= $row['companylogo'];
		  $myString = $row['companylicense'];
$cl = explode(',', $myString);
	include('topbar.php');
		include('middlebar.php');
	  include('navh.php');  
?>   
<style>
    #selectedFiles img {
        max-width: 125px;
        max-height: 125px;
        float: left;
        margin-bottom:10px;
    }
</style>
<?php

if(isset($_POST['btn_save_updates']))
	{
	  
	 $companyName= $_POST['companyName'];
	echo  $companyLegalNo= $_POST['companyLegalNo'];
		 $street= $_POST['street'];
		  $city= $_POST['city'];
		  $province= $_POST['province'];
		  $zipCode= $_POST['zipCode'];
		  $countryName= $_POST['selectcountryName'];
		  $businessType= $_POST['businessType'];
		  $noOfEmployee= $_POST['noOfEmployee'];
	 	  $companyDescription= $_POST['companyDescription'];
		  
		
	
			$target_dir = "images/";
	
		 		$target_file = $target_dir . basename($_FILES["file1"]["name"]);
				$images=$_FILES['file1']['name'];
			 $filelocation = $target_dir.$images;
        $temp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($temp, $filelocation);

		 /////////////////////////////////////////////
		 
		 //////////////////////////////////////////
		
		 ///SUBIR IMAGENES
		 foreach ($_FILES["file2"]["error"] as $key => $error) { 
		$nombre_archivo = $_FILES["file2"]["name"][$key];   
		$tipo_archivo = $_FILES["file2"]["type"][$key];   
		$tamano_archivo = $_FILES["file2"]["size"][$key]; 
		$temp_archivo = $_FILES["file2"]["tmp_name"][$key]; 
 
 	
		if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg" ) || strpos($tipo_archivo, "png" ) || strpos($tipo_archivo, "jpg" )) && ($tamano_archivo < 1000000)))  
		{  


			//echo "
			//	<script>
             //   alert('Maximum 1mb in size and only images jpeg, jpg, png or gi');
              //  window.location= 'updatesellerprofile.php?email=echo $email'
        		//</script>
        		//";
		
    		
		}
		 
		else  
		{   
    		$nom_img = $nombre_archivo;      
    		$directorio = 'images/'; // Directorio
 
    		if (move_uploaded_file($temp_archivo,$directorio . "/" . $nom_img))  
    		{  

    			echo "
    			<script>
                alert('Images uploaded correctly');
                window.location= 'updatesellerprofile.php?email=echo $email'
        		</script>
        		";

    		
			}  
		} 
	} // Fin Foreach 		 

		
		 ///SUBIR IMAGENES

				
				$image1=$_FILES['file2']['name'][0];
				$image2=$_FILES['file2']['name'][1];
				$image3=$_FILES['file2']['name'][2];
				$image4=$_FILES['file2']['name'][3];
				$image5=$_FILES['file2']['name'][4];
				
		 ////////////////////////////////////////////////
	
  if(empty($images)){
$license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4. ',' . $image5;

$sqlimages="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqlimages); 
$stmtimages = $connection->prepare($sqlimages);
if($stmtimages === false) 
 {
    trigger_error('Wrong SQL: ' . $sqlimages . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtimages->execute())
			{
				?>
              <script>
				        alert("Updated Your Company Information!");  //not showing an alert box.
				        window.location.href="updatesellerprofile.php?email=echo $email";
		
				</script>
                <?php
			}
			else{
		echo "ERROR1";
		}

}elseif (empty($image1) and empty($image2) and empty($image3) and empty($image4) and empty($image5)) {
	



	$sqllicense="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqllicense); 
$stmtlicense = $connection->prepare($sqllicense);
if($stmtlicense === false) 
 {
    trigger_error('Wrong SQL: ' . $sqllicense . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtlicense->execute())
			{
				?>
              <script>
				        alert("Updated Your Company Information!");  //not showing an alert box.
				         window.location.href="updatesellerprofile.php?email=echo $email";
		
				</script>
                <?php
			}
			else{
				echo "ERROR2";

		}

}else {
$license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4. ',' . $image5;

	$sql="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sql); 
$stmt = $connection->prepare($sql);
if($stmt === false) 
 {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}


   if($stmt->execute())
			{
				?>
              <script>
				        alert("Updated Your Company Information!");  //not showing an alert box.
				         window.location.href="updatesellerprofile.php?email=echo $email";
		
				</script>
                <?php
			}
			else{
						echo "ERROR3";

		}

}


		
	
		
	}
	
?>
        <!-- start section -->
        <div class="container">
                <div class="row ">
                    <!-- start sidebar -->
      
     </br>
                      </br>
					  <div style="padding-left:200px">
                     <div class="col-sm-10 " style="background-color:#f7f7f7;">
 <form method="POST" enctype="multipart/form-data">
								  
					  </br>
                               <center>	</br>
                      </br>
                      <h2>Company Information </h2></center>
									<div class="form-group">
									</br>
									</br>
										<div class="form-group">
										<input type="text" name="companyName" id="comanyName" tabindex="3" class="form-control"  value="<?php echo $companyName ?>" placeholder="Company Information">
									</div>
										<div class="form-group">
										<input type="text" name="companyLegalNo" id="companyLegalNo" tabindex="3" class="form-control"  value="<?php echo $companyLegalNo ?>" placeholder="Company Legal No">
									</div>
						
                                               <input   type="text" name="street" tabindex="1" class="form-control"   value="<?php echo $street ?>" placeholder="Street">
									</div>
									</br>
						<div class="form-group">
										
					        <input  type="text" name="city" tabindex="1" class="form-control"   value="<?php echo $city ?>" placeholder="City">
							
										
						</div>
							<div class="form-group">
										
					        <input  type="text" name="province" tabindex="1" class="form-control"  value="<?php echo $province ?>" placeholder="Province">
							
										
						</div>
							<div class="form-group">
										
					        <input  type="text" name="zipCode" tabindex="1" class="form-control"   value="<?php echo $zipCode ?>" placeholder="Zip Code">
							
										
						</div>
										<div class="form-group">
					      
											    <select name="selectcountryName"  class="form-control input">
								  <option value="<?php echo $countryName ?>"><?php echo $countryName ?></option>
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
											 </select>
									</div>
									</br>
									</br>
									<h4>Describe your Company </h4>
									<div class="form-group">
										<select name="businessType"  class="form-control input">
								  <option value="<?php echo $businessType ?>"><?php echo $businessType ?></option>
                                             <option value="Manufacturer">Manufacturer</option>
                                             <option value="Distributor" >Distributor</option>
											  <option value="Trading Company" >Trading Company </option>
                                             <option value="Retailer" >Retailer</option>  <option value="other" >Other</option>      Trading Company                                       
											 </select>
									</div>
									<div class="form-group">
										
					        <input  type="text" name="noOfEmployee" tabindex="1" class="form-control"   value="<?php echo $noOfEmployee ?>" placeholder="Nro of Employee">
													
							</div>
							<div class="form-group">
										
					        <textarea  name="companyDescription" tabindex="1" class="form-control"   rows="4" cols="50" placeholder="Description">
							 <?php echo $companyDescription?>
							
							</textarea>	
						</div>
										<div class="form-group">
										<label>Company Logo</label>
						
										 <img style="height:100px; width:100px;" src="images/<?php echo $companylogo; ?>" />
					       
					        <input id="files" class="form-control" type="file" name="file1" />
					        

						</div>
						<div="form-group">
						<label>Company License</label>
									 <img style="height:100px; width:100px;" src="images/<?php echo $cl[0]; ?>" />	<img style="height:100px; width:100px;" src="images/<?php echo $cl[1]; ?>" /><img style="height:100px; width:100px;" src="images/<?php echo $cl[2]; ?>" />
									 <img style="height:100px; width:100px;" src="images/<?php echo $cl[3]; ?>" />
									 <img style="height:100px; width:100px;" src="images/<?php echo $cl[4]; ?>" />
					        
					        <input id="files1" class="form-control" type="file" name="file2[]" multiple="multiple" />
					        <div class="form-group">
					<h3>Uploaded Picture Preview Area </h3>
 						<div id="selectedFiles1"></div>
							</div>

							</div>
									<div class="form-group">
										<div class="row">
										</br>
											<div class="col-sm-6 col-sm-offset-3">
											</br>
											</br>
			<center style ="display: inline-block; text-align: center;"><button type="submit" name="btn_save_updates" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; Update Profile</i>
        </button>
           
       
		<a href="profile.php" class="btn btn-warning"><i class="fa fa-times"></i> CANCEL</a>
       </input>
           </br>
		     </br>  </br>
         
        </center>
											</div>
										</div>
									</div>
							
								
						</form>
						</div>
						</div>
				  </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
  

           </div>
       <?php require'footer.php';  ?>
        <!-- end footer -->
        
        
        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.downCount.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/pace.min.js"></script>
        <script type="text/javascript" src="js/star-rating.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
  
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

	
    </body>
</html>
    