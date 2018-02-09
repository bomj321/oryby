<?php session_start();
error_reporting(0);
include('Connect.php');
include('head.php');?>
<?php
include('topbar.php');
include('middlebar.php');
include('navh.php');
//include('middlebar.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype'];
?>
   
<?php

if(isset($_POST['btn_save_updates']))
	{
	  $pid = $_GET['pid'];// item name
	  $ntitle = $_POST['ntitle'];// item name 
		 
			$price = $_POST['price'];// item name
	    	$fulldescription = $_POST['description'];// item name
			$catid = $_POST['catid'];// item name
				$subcatid = $_POST['subcatid'];// item name
					$quantity = $_POST['quantity'];// item name
			$color = $_POST['color'];// item name
			  $productType =$_POST['productType'];
			  
			     $catid = $_POST['catid'];// item name
			    $subcatid = $_POST['subcatid'];// item name
		
	 
			$keyword = $_POST['keyword'];
			$selectedkeyword=$_POST['selectedkeyword'];
			$country = $_POST['dropcountry'];//dropcountry
			$port=$_POST['port'];
			$wquantity=$_POST['wquantity'];
			$weight =$wquantity.' '.$_POST['dropweight'];
			
			$vquantity=$_POST['vquantity'];
			$volume=$vquantity.' '.$_POST['dropvolum'];
			$dquantity=$_POST['dquantity'];
			$dimension=$dquantity.' '.$_POST['dropdimension'];
			$cquantity=$_POST['cquantity'];
			
			$capacity=$cquantity.' '.$_POST['dropcapacity'];
			$equantity=$_POST['equantity'];
			$energy= $equantity.' '.$_POST['dropenergy'];
			$rotation=$_POST['rotation'];
			$elaboration=$_POST['elobration'];
			$use=$_POST['use'];
		    $size=$_POST['size'];
			$packing=$_POST['packaging'];
			$productType = $_POST['productType'];
			//$showcaseid=$_POST['showcaseid'];
			//$showtoplist=$_POST['showtoplist'];
            $description = $_POST['description'];
			$price=$_POST['fobprice'];
			$oquantity=$_POST['oquantity'];
			echo $miniorder=$oquantity.' '.$_POST['dropminimum'];
			
	 $sql="UPDATE products  SET ntitle='".$ntitle."' ,price='".$price."' ,fulldescription='".$fulldescription."' ,image='".$license."' ,catid='".$catid."' ,subcatid='".$subcatid."',productaction='".$productaction."',producttoplist='".$producttoplist."',productType='".$productType."', keywords='".$keyword."',selectedkeyword='".$selectedkeyword."',country='".$country."',port='".$port."',weight='".$weight."',volume='".$volume."',dimension='".$dimension."',capacity='".$capacity."',energypower='".$energy."',rotationspeed='".$rotation."',elaboration='".$elaboration."',puse='".$use."',psize='".$size."',packing='".$packing."',certification='".$fileimage."',miniorder='".$miniorder."'  WHERE (pid='$pid')";
	
			$showcaseid=$_POST['showcaseid'];
			$showtoplist=$_POST['showtoplist'];
			
			  
			if($_POST['showcaseid'] !="")
			{
			 $productstatus=$_POST['showcaseid'];
			}
			else if($productstatus =="")
			{
			 $productstatus=2;
			}
			if($_POST['showtoplist'] !="")
			{
			 $producttoplist=$_POST['showtoplist'];
			}
				 //////////////////////////////////////////
	
				$target_dir = "images/";
	if($_FILES["file2"]["name"][0] !="" )
{
		 	$target_file = $target_dir . basename($_FILES["file2"]["name"][0]);
			$image1=$_FILES['file2']['name'][0];
			$filelocation = $target_dir.$image1;
			$temp1 = $_FILES['file2']['tmp_name'][0];
			move_uploaded_file($temp1, $filelocation);
}	if($_FILES["file2"]["name"][1] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][1]);
			$image2=$_FILES['file2']['name'][1];
			$filelocation = $target_dir.$image2;
			$temp2 = $_FILES['file2']['tmp_name'][1];
}	if($_FILES["file2"]["name"][2] !="" )
{
		
			$target_file = $target_dir . basename($_FILES["file2"]["name"][2]);
			$image3=$_FILES['file2']['name'][2];
			$filelocation = $target_dir.$image3;
			$temp3 = $_FILES['file2']['tmp_name'][2];
			move_uploaded_file($temp3, $filelocation); 
 }	if($_FILES["file2"]["name"][3] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);
			$image4=$_FILES['file2']['name'][3];
			$filelocation = $target_dir.$image4;
			$temp4 = $_FILES['file2']['tmp_name'][3];
			move_uploaded_file($temp4, $filelocation); 
 } 	 ////////////////////////////////////////////////
	
		if($_FILES["file1"]["name"] !="" )
{
			$target_file = $target_dir . basename($_FILES["file1"]["name"]);
			$fileimage1=$_FILES['file1']['name'];
			$filelocation = $target_dir.$image3;
			$tempfile1 = $_FILES['file1']['tmp_name'];
			move_uploaded_file($tempfile1, $filelocation); 
 }	
  $license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4;

	
	
			 $sql="UPDATE products  SET ntitle='".$ntitle."' ,price='".$price."' ,fulldescription='".$fulldescription."' ,image='".$license."' ,catid='".$catid."' ,subcatid='".$subcatid."',productaction='".$productaction."',producttoplist='".$producttoplist."',productType='".$productType."'  WHERE (pid='$pid')";
			
			
			
			

 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 
	
			if($stmt->execute())
			{
				?>
                <script>
				        alert("Updated !");  //not showing an alert box.
		window.location.href="suppliers.php";
				</script>
                <?php
			}
			else{
			echo 	$errMSG = "Sorry Data Could Not Updated !";
				}
		
	
		
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
        }
      });

    }
  
    });

 
  }); 


</script>


	
	     <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
			 <!-- start Form -->
                  <form  method="POST" enctype="multipart/form-data">
				  
			  <div class="row" style="padding-left:10px;">
			  </br>
				<center><h2>UPDATE PRODUCTS</h2>
			
				</center></br>
                    <div class="col-sm-12" style=" background-color:white;">
    

       			 <?php
 $pid=$_GET["pid"];
 $sql="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) WHERE (pid=$pid)";
 $rez=mysqli_query($connection,$sql);
 $rowz=mysqli_fetch_array($rez);
 ?>
		<div class="form-group col-sm-2">  </div>
				<div class="form-group col-sm-4">
				
				
	<?php  $membershipType ?>  
	
								 <?php

						$sql="SELECT * FROM categories";
						 $stmt=mysqli_query($connection,$sql);
						if($stmt == false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
						}
						$nr=mysqli_num_rows($stmt);

						if ($nr > 0)
						 {
						  ?>
						 
					<select  class="form-control"  id="catid" name="catid" required>
					 <option  value="<?php echo $rowz['catid']; ?>"> <?php echo $rowz['title']; ?></option>
										 <?php
						while($row=$stmt->fetch_assoc())
						{
			
						
			?>
					  <option value="<?php echo $row['catid']; ?>"><?php echo $row['title']; ?></option>
					  <?php
					  }
					  ?>
				</select>
				 <?php
					  }
					  ?>
			</div>
			<div class="form-group col-sm-4" id="ShowSubcategory"> <select id="Show" class="form-control"> <option value=""> Select Category first </option> </select></div>  
		<!--	<div class="form-group col-sm-4" id="Show">

            <select id="Show"> <option value=""> Select Category first </option> </select>			
            </div> 
			-->

			</div>  
			</div>  <!-- row  -->
				<hr>
				<div class="row">
			  
				<div class="col-sm-4" style="margin-left:200px;margin-top:0px;">
				
				<div class="form-group"><label> Product Title: </label></div> <br> 
                <div class="form-group"><label> Keyword:</label> </div> <br> 
				<div class="form-group"><label> Selected Keyword: </label></div> 
				</div>
				<div class="col-sm-4" style="margin-left:-200px;">
				<div class="form-group">
						<input type="text" class="form-control input-lg" required placeholder="Enter Title" name="ntitle" id="title" value="<?php echo  $rowz['ntitle'];?>">
				</div>
				<div class="form-group">
						<input type="text" class="form-control input-sm" required placeholder="Enter keyword" name="keyword" id="keyword" value="<?php echo  $rowz['keywords'];?>">
				</div>
				<div class="form-group">
						<!--<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity"> -->
						<textarea class="form-control" placeholder="keyword" name="selectedkeyword" id="selectedkey"  > <?php echo  $rowz['selectedkeyword'];?> </textarea>
				</div>
				</div>
				<script>
// AJAX call for autocomplete 


</script>
				</div>
				<!-- END of ROW -->
		<div class="row"> 
			    <h4 style="margin-left:90px;"> DETAILS:</h4> 
				<div class="col-sm-4" style="margin-left:200px;margin-top:0px;">
				<div class="row">
				<div class="form-group col-sm-6"><label> Country: </label></div> 
               
				</div>
				<div class="form-group" style="margin-top:20px;"><label> Weight: </label></div>
				<div class="form-group" style="margin-top:25px;"><label> Volume: </label></div> 
				<div class="form-group" style="margin-top:30px;"><label> Dimensions: </label></div> 
				<div class="form-group" style="margin-top:25px;"><label> Capicity: </label></div> 
				<div class="form-group" style="margin-top:30px;"><label> Energy Power: </label></div> 
				 
				<div class="form-group" style="margin-top:35px;"><label> Rational Speed: </label></div> 
				<div class="form-group" style="margin-top:25px;"><label> Elabortional Material: </label></div> 
				<div class="form-group" style="margin-top:15px;"><label> Use: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Size: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Packing: </label></div>
                <div class="form-group" style="margin-top:20px;"><label> Product type: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Show case: </label></div> 
				<div class="form-group" style="margin-top:20px;"><label> Top list: </label></div> 				
				<div class="form-group" style="margin-top:31px;"><label> Product Certification: </label></div> 
				<div class="form-group" style="margin-top:250px;"><label> Product Image: </label></div> 
				<div class="form-group" style="margin-top:80px;"><label> FOB Price: </label></div> 
				<div class="form-group" style="margin-top:32px;"><label> Minimum Order: </label></div> 
				
				 
			<!--	 -->
				</div>
				<div class="col-sm-4" style="margin-left:-200px;">
				<div class="row">
				<div class="form-group col-sm-6">
			<select class="form-control input-sm" id="unit" name="dropcountry">
                <option value="<?php echo $rowz['country'];?>">  <?php echo  $rowz['country'];?></option>
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
				<div class="form-group col-sm-2"><label> Port: </label></div>  
				
				<div class="form-group col-sm-4" style="padding-right:0px;">
				<input type="text" class="form-control input-sm" required placeholder="Port" name="port" id="port" value="<?php echo  $rowz['port'];?>">
				</div>
				</div>
				<div class="row">
				<?php $str=$rowz['weight']; $cl = explode(' ', $str);  ?>
				     <div class="form-group col-sm-8" style="padding-right:0px;">
						<input type="text" class="form-control input-sm" placeholder="Enter Weight" name="wquantity" id="wquantity" value="<?php echo $cl[0] ;?>"> 
						</div>
							<div class="form-group col-sm-4" style="padding-left:0px;">
							<select class="form-control input-sm" id="unit" name="dropweight" >
							<option value="<?php echo $cl[1];?>"><?php echo $cl[1];?></option>
	                         <option value="kilogram">Kilogram</option>  
                             <option value="Gram">Gram</option>  
							 <option value="piece">Piece</option>  
							 <option value="ton">Ton</option>
							 <option value="cubic meter">Cubic meter</option>  
						     <option value="20 ft conteiner">20 ft conteiner</option> 
                             <option value="40 ft conteiner">40 ft conteiner</option>
                             <option value="litter">Litter</option>		
                             <option value="others">Others</option>							 
                         </select>
				         </div>
						 </div>
				<div class="row">
				        <div class="form-group col-sm-8" style="padding-right:0px;">
						<?php $str1=$rowz['volume']; $vcl = explode(' ', $str1);  ?>
						<input type="text" class="form-control input-sm" placeholder="Volume" name="vquantity" id="quantity" value="<?php echo $vcl[0]; ?>"> 
						</div>
						<div class="form-group col-sm-4" style="padding-left:0px;">
						<select class="form-control input-sm" id="unit" name="dropvolum">
						     <option value="<?php echo $vcl[1]; ?>"><?php echo $vcl[1]; ?> </option>
	                         <option value="">Volume</option>  
                             <option value="Cubic meter">Cubic meter</option>  
							 <option value="Cubic feet">Cubic feet</option>  
							 <option value="Cubic Centimeter">Cubic Centimeter</option>
							 <option value="cubic meter">Cubic meter</option>  
						    
                             <option value="litter">Litter</option>		
                             <option value="others">Others</option>							 
                         </select>
				         </div>
						 </div>
						 <div class="row">
						 <div class="form-group col-sm-8" style="padding-right:0px;">
						 <?php $str2=$rowz['dimension']; $dcl = explode(' ', $str2);  ?>
						 <input type="text" class="form-control input-sm" placeholder="Dimensions" name="dquantity" id="quantity" value="<?php echo $dcl[0]; ?>"> 
						 </div>
				<div class="form-group col-sm-4" style="padding-left:0px;">
						<!--<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity"> -->
						 <select class="form-control input-sm" id="unit" name="dropdimension">
						    <option value="<?php echo $dcl[1]; ?>"> <?php echo $dcl[1]; ?> </option>
	                         <option value="feet">Feet</option>  
                             <option value="Inch">Inch</option>  
							 <option value="Centimeter">Centimeter</option>  
							 <option value="Meter">Meter</option>
							
                             <option value="others">Others</option>							 
                         </select>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-sm-8" style="padding-right:0px;">
				<?php $st3=$rowz['volume']; $ccl = explode(' ', $st3);  ?>
						<input type="text" class="form-control input-sm" placeholder="Enter Capicity" name="cquantity" id="quantity" value="<?php echo $ccl[0]; ?>"> 
						 </div>
						 <div class="form-group col-sm-4" style="padding-left:0px;">
						 <select class="form-control input-sm" id="unit" name="dropcapacity">
						 <option value="<?php echo $ccl[1] ?>"><?php echo $ccl[1] ;?></option>
	                         <option value="Ton">Ton</option>  
                             <option value="Kilogram">Kilogram</option>  
							 <option value="Cubic Feet">Cubic Feet</option>  
							 <option value="Cubic meter">Cubic meter</option>
							 <option value="Pound">Pound</option>  
						     

                             <option value="others">Others</option>							 
                         </select>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-sm-8" style="padding-right:0px;">
				<?php $st4=$rowz['volume']; $ecl = explode(' ', $st4);  ?>
				<input type="text" class="form-control input-sm" placeholder="Enter Power" name="equantity" id="quantity" value="<?php echo $ecl[0]; ?>">
				</div>
				<div class="form-group col-sm-4" style="padding-left:0px;">
						<!--<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity"> -->
						 <select class="form-control input-sm" id="energy" name="dropenergy">
						    <option value="<?php echo $ecl[1];?>"><?php echo $ecl[1] ;?></option>
	                         <option value="Volt">Volt</option>  
                             <option value="Ohm">Ohm</option>  
							 <option value="Watt">Watt</option>  
							 <option value="empere">empere</option>
									
                             <option value="others">Others</option>							 
                         </select>
				</div>
				</div>
				<div class="form-group">
				
						<input type="text" class="form-control input-sm" required placeholder="Rotation speed" name="rotation" id="rot" value="<?php echo $rowz['rotationspeed'];?>">
				</div>
				<div class="form-group">
						<input type="text" class="form-control input-sm" required placeholder="Elobration Material" name="elobration" id="elobration" value="<?php echo $rowz['elaboration'];?>">
				</div>
				<div class="form-group">
						<input type="text" class="form-control input-sm" required placeholder="Use" name="use" id="use" value="<?php echo $rowz['puse']; ?>">
				</div>
				<div class="form-group">
						 <select class="form-control input-sm" id="unit" name="size">
						   <option value="<?php echo $rowz['psize']; ?>"> <?php echo $rowz['psize']; ?> </option>
	                         <option value="Small">Small</option>  
                             <option value="Medium">Medium</option>  
							 <option value="Large">Large</option>  
							 <option value="Extra large">Extra large</option>
								
                             <option value="others">Others</option>							 
                         </select>
				</div>
				<div class="form-group">
						 <select class="form-control input-sm" id="unit" name="packaging">
						    <option value="<?php echo $rowz['packing']; ?>"> <?php echo $rowz['packing']; ?> </option>
	                         <option value="Bag">Bag</option>  
                             <option value="Bottle">Bottle</option>  
							 <option value="Can">Can</option>  
							 <option value="Barrel">Barrel</option>
							 <option value="Carton">Carton</option>  
						     <option value="Wooden Box">Wooden Box</option>  
                          		
                             <option value="others">Others</option>							 
                         </select>	
						 </div>
					

					
						 
						 <div class="form-group ">
		
			<select  required class="form-control input-sm" name="productType">
			<option  value="<?php echo $rowz['productType']; ?>"><?php echo $rowz['productType']; ?></option>
			<option value="Eco Friendly" >Eco Friendly </option>
			<option value="Innovation" >Innovation</option>
			<option value="Normal Product" >Normal Product </option>
	
			</select>
			
			</div>
	
				<div class="form-group">

			<select  class="form-control input-sm"  id="showcaseid" name="showcaseid" >
			<option value="<?php echo $rowz['productstatus']; ?>"> <?php echo $rowz['productstatus']; ?> </option>
			<option  value="" >Select Product </option>
			<option value ="0">Show on Show Case</option>
			</select>
			</div>
				<div class="form-group">

			<select  class="form-control input-sm"  id="showtoplist" name="showtoplist" >
			<option value="<?php echo $rowz['producttoplist']; ?>"> <?php echo $rowz['producttoplist']; ?> </option>
			<option  value="" >Select For Top List</option>
			<option value ="1">Set As Top List Product</option>
			</select>
			</div>

						 
						
						 <div class="form-group">
						 <img style="height:100px; width:100px;" src="images/<?php echo $rowz['certification']; ?>" />
						   <input class="form-control input-sm" type="file"  name="file1"  required />
                          	</div>
						 
						  <?php $str3=$rowz['image']; 
						  $procl = explode(',', $str3);  ?>
						  <div class="form-group">
					
						   <img style="height:100px; width:100px;" src="images/<?php echo $procl[0]; ?>" />
			   <img style="height:100px; width:100px;" src="images/<?php echo $procl[1]; ?>" />
			    <img style="height:100px; width:100px;" src="images/<?php echo $procl[2]; ?>" />
				 <img style="height:100px; width:100px;" src="images/<?php echo $procl[3]; ?>" />
				  <img style="height:100px; width:100px;" src="images/<?php echo $procl[4]; ?>" />
						   <input class="form-control input-sm" type="file"  name="file2[]" multiple="multiple" required />
                           	
						 </div>
						 <div class="form-group">
						   <input class="form-control input-sm" type="text"  name="fobprice" value="<?php echo $rowz['price']; ?>"  required />
                           	
						 </div>
						 <div class="row">
						 <?php $stt3=$rowz['miniorder']; $mcl = explode(' ', $stt3);  ?>
					<div class="form-group col-sm-8" style="padding-right:0px;"> <input class="form-control input-sm" type="text"  name="oquantity" value="<?php echo $mcl[0]; ?>" required /></div>
					   <div class="form-group col-sm-4"  style="padding-left:0px;">
						   <select class="form-control input-sm" id="unit" name="dropminimum">
						    <option value="<?php echo $mcl[1]; ?>"><?php echo $mcl[1]; ?></option> 
	                         <option value="Unit">Unit</option>  
                             <option value="Ton">Ton</option>  
							 <option value="Gram">Gram</option>  
							 <option value="Inch">Inch</option>
							 <option value="ounace">ounace</option>  
						     <option value="Gallon">Gallon</option>  
                             <option value="Feet">Feet</option>
                             <option value="Cubic Meter">Cubic Meter</option>
							 <option value="Cubic Feet">Cubic Feet</option> 
						     <option value="20 ft container">20 ft container</option>
							 <option value="40 ft container">40 ft container</option>
							<option value="Pallets">Pallets</option>	
							<option value="Carton">Carton</option>	
                            <option value="others">Others</option>							 
                         </select>         	
						 </div>
						 </div>
				</div>						  
				
				
				</div>	
				<div class="row">
				<script src="editor.js"></script>
		<link href="editor.css" type="text/css" rel="stylesheet"/>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
				
			});
				</script>
				<div class="form-group" style="margin-top:32px;margin-left:56px;"><h4><b> DESCRIPTION:</b> </h4></div> 
 <div class="form-group col-sm-2"> </div>        
		<div class="form-group col-sm-8">
			    <textarea   class="form-control" placeholder="Enter Description" name="description" id="txtEditor" rows="4" col="6"><?php echo $rowz['fulldescription']; ?> </textarea>
				</div>	
                </div>				
				<!--<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Color" name="color" id="color">
				</div>  -->
				
				
			<!--	
			<div class="form-group">
			  <input class="form-control" type="file"  name="file2[]" multiple="multiple" required />
			</div>
		    -->
		
		  <center><button type="submit" name="btn_save_updates" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; UPDATE</i>
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
        </section>
		
		<!-- Trigger the modal with a button -->
  
 <?php        

include('footer.php');
?>

    