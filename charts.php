<?php session_start();
    if(!isset($_SESSION['uemail'])):
        header('location:singlelogin.php');
    endif;
include('Connect.php');
include('head.php');
$id=$_GET['id'];//id del producto

$stquery1="SELECT * FROM products where pid='$id'";
$stres1=mysqli_query($connection,$stquery1);
$r1=mysqli_fetch_array($stres1);
$nombre=$r1['ntitle'];

?>
    <body>
<!-- start topBar -->
        <?php include('topbar.php');?>
        <?php include('middlebar.php');?>
        <?php include('navh.php');?>
    

		<!-- Graficas-->
		<div class="container">
            <div class="row">
                <div class="col-md-12 content">
                    <h3 class="text-center"><?php echo $nombre?> Statistics</h3>
                </div><!-- end col -->
            </div><!-- end row -->               
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#year" aria-controls="year" role="tab" data-toggle="tab">Year</a></li>
						<li role="presentation"><a href="#day" aria-controls="day" role="tab" data-toggle="tab">Month</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content" id="<?php echo $id?>">
						<div role="tabpanel" class="tab-pane active" id="year">
							<div class="widget-body">	
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="año" name="lang" required>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>	
										<option value="2022">2022</option>													
									</select>
								</div>								
								<div class="row">
									<div class="col-md-12">
										<button class="btn btn-default pull-right" name="y" type="submit">
											See Chart
										</button>
									</div>
								</div>
							</div>						
						</div>
						<div role="tabpanel" class="tab-pane" id="day">	
							<div class="widget-body">	
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="day_año" required>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>	
										<option value="2022">2022</option>													
									</select>
								</div>
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="day_month" required>
										<option value="1">January</option>
										<option value="2">February</option>
										<option value="3">March</option>
										<option value="4">April</option>	
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>													
									</select>
								</div>
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="day_day" required>
										<option value="0110">01-10 days</option>
										<option value="1020">10-20 days</option>
										<option value="2031">20-31 days</option>													
									</select>
								</div>								
								<div class="row">
									<div class="col-md-12">
										<button class="btn btn-default pull-right" name="d" type="submit">
											See Chart
										</button>
									</div>
								</div>
							</div>					
						</div>
					</div>					
                </div>
            </div>
			<hr>
			<div class="row">
				<div class="col-md-12 col-xs-12 col-lg-12">
					<div id='columnchart_material'>		
					
					</div> 
				</div>			
			</div>
        <!--Cierre del Container--> 
        </div>


	   <?php include('footer.php');?>

<!-- JavaScript Files -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min_2.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="js/chart.js"></script>        
</body>
</html>