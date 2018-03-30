<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
	include('Connect.php');
$userType=$_SESSION["userType"];
if($userType !='Admin')
{
$email =$_SESSION["email"];
  $sqll="SELECT * FROM `users` WHERE email ='$email' ";
 
$stmtt=mysqli_query($connection,$sqll);
if($stmtt == false) {
trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
}

$nr=mysqli_num_rows($stmtt);
$row=mysqli_fetch_array($stmtt);
 $user_id =$row['user_id'];
  $sql="SELECT * FROM users INNER JOIN access  ON  (users.user_id = access.user_id) INNER JOIN page  ON  (access.pageId = page.pageId) WHERE  access.status ='1'  AND access.pageId='5' AND access.user_id='$user_id' ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr =mysqli_num_rows($stmt);
if($nr > 0)
{
		
}
else
{
?>
		
			    <script>
					window.location.href='NotAccess.php';
				</script>
  <?php 
}
}
include('header.php');
?>

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Tables</li><li>Data Tables</li>
				</ol>

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-table fa-fw "></i> 
								Table 
							<span>> 
								Chart Categories
							</span>
						</h1>
					</div>
			</div>
			<div class="container-fluid">
            <div class="row">
                <div class="col-md-12 content">
                    <h3 class="text-center">Product Statistics</h3>
                </div><!-- end col -->
            </div><!-- end row -->               
            <div class="row">
                <div class="col-md-8 col-xs-8 col-lg-8">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#year" aria-controls="year" role="tab" data-toggle="tab">Year</a></li>
						<li role="presentation"><a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a></li>
						<li role="presentation"><a href="#day" aria-controls="day" role="tab" data-toggle="tab">Day</a></li>
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
				<div class="col-md-3 col-xs-3 col-lg-3" style="float:right;">
					<h3 class="text-center">Summary</h3>
					<?php
						try {
							require_once('Connect.php');
							$sql = "SELECT * FROM `categories` ";
							$resultado=mysqli_query($connection,$sql);
						}
						catch (Exception $e)
						{ $error= $e->getMessage();}
						?>
					<ul class="list-group">
					<?php while ($resumen = $resultado->fetch_all(MYSQLI_ASSOC) ) { ?>
					<?php foreach($resumen as $resu): ?>
						<li class="list-group-item">
							<span><?php echo $resu['catid'];?></span>
							<?php echo $resu['title'];?>						
						</li>
					<?php endforeach;?>
					<?php }?>
					</ul>
				</div>			
            </div>
			<hr>
			<div class="row">
				<div class="col-md-8 col-xs-8 col-lg-8" style="margin-top:-20%;">
					<div id='columnchart_material'>
					</div> 
				</div>
			</div>
        <!--Cierre del Container--> 
        </div>


			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">SmartAdmin 1.8.2 <span class="hidden-xs"> - Web Application Framework</span> © 2014-2015</span>
				</div>

				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
						<div class="btn-group dropup">
							<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
								<i class="fa fa-link"></i> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right text-left">
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Download Progress</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Server Load</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<button class="btn btn-block btn-default">refresh</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="js/demo.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript" src="js/chart_global.js"></script>
	</body>
</html>