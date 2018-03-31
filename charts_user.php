<?php session_start();
include('Connect.php');
include('head.php');
$id_user=$_GET['id'];//id del usuario logueado

?>
    <body>
<!-- start topBar -->
        <?php include('topbar.php');?>
        <?php include('middlebar.php');?>
        <?php include('navh.php');?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12 content">
                    <h3 class="text-center">Product Statistics</h3>
                </div><!-- end col -->
            </div><!-- end row --> 
            <!-- Consulta a la db para la ilustración de la imagen-->
                <?php 
                    $sql="SELECT * FROM `products` WHERE user_id = '{$id_user}' ";
                    $rsl=mysqli_query($connection,$sql);
                ?> 
            <?php while($rw=mysqli_fetch_array($rsl)){$myString = $rw['image'];$cl = explode(',', $myString);?>                
            <div class="row">
                <div class="col-md-4 col-xs-4 col-lg-4">
                    <img src="images/<?php echo $cl[0]; ?>" class="img-thumbnail">                         
                </div>
                <div class="col-md-8 col-xs-8 col-lg-8">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#year" aria-controls="year" role="tab" data-toggle="tab">Year</a></li>
						<li role="presentation"><a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a></li>
						<li role="presentation"><a href="#day" aria-controls="day" role="tab" data-toggle="tab">Day</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content" id="<?php echo $rw['pid']?>">
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
						<div role="tabpanel" class="tab-pane" id="month">
							<div class="widget-body">	
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="month_año" required>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>	
										<option value="2022">2022</option>													
									</select>
								</div>
								<div class="form-group" style="margin-top: 2rem;">
									<select class="form-control " id="month_month" required>
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
								<div class="row">
									<div class="col-md-12">
										<button class="btn btn-default pull-right" name="m" type="submit">
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
            <?php }?> 
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