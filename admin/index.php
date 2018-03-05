<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php");
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
  $sql="SELECT * FROM users INNER JOIN access  ON  (users.user_id = access.user_id) INNER JOIN page  ON  (access.pageId = page.pageId) WHERE  access.status ='1'  AND access.pageId='1' AND access.user_id='$user_id' ";

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
					<li>Home</li><li>Dashboard(<?php echo $_SESSION['email']; ?>)</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

			<?php
			include('adminmenu.php');
			?>
				<!-- widget grid -->
		<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						<article class="col-sm-12">
							<!-- new widget -->
							<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Live Feeds </h2>

									<ul class="nav nav-tabs pull-right in" id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Live Stats</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#s2"><i class="fa fa-facebook"></i> <span class="hidden-mobile hidden-tablet">Social Network</span></a>
										</li>

										<li>
											<a data-toggle="tab" href="#s3"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Stats of Category</span></a>
										</li>
									</ul>

								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">

										test
									</div>
									<!-- end widget edit box -->

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
												<div class="row no-space">
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
														<span class="demo-liveupdate-1"> <span class="onoffswitch-title">Live switch</span> <span class="onoffswitch">
																<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
																<label class="onoffswitch-label" for="start_interval">
																	<span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span>
																	<span class="onoffswitch-switch"></span> </label> </span> </span>
														<div id="updating-chart" class="chart-large txt-color-blue"></div>

													</div>
													<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

														<div class="row">
															<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
																<div class="progress">
																	<div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
																</div> </div>
															<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Transfered <span class="pull-right">440 GB</span> </span>
																<div class="progress">
																	<div class="progress-bar bg-color-blue" style="width: 34%;"></div>
																</div> </div>
															<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Bugs Squashed<span class="pull-right">77%</span> </span>
																<div class="progress">
																	<div class="progress-bar bg-color-blue" style="width: 77%;"></div>
																</div> </div>
															<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> User Testing <span class="pull-right">7 Days</span> </span>
																<div class="progress">
																	<div class="progress-bar bg-color-greenLight" style="width: 84%;"></div>
																</div> </div>

															<span class="show-stat-buttons"> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Generate PDF</a> </span> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Report a bug</a> </span> </span>

														</div>

													</div>
												</div>

												<div class="show-stat-microcharts">
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

														<div class="easy-pie-chart txt-color-orangeDark" data-percent="33" data-pie-size="50">
															<span class="percent percent-sign">35</span>
														</div>
														<span class="easy-pie-title"> Server Load <i class="fa fa-caret-up icon-color-bad"></i> </span>
														<ul class="smaller-stat hidden-sm pull-right">
															<li>
																<span class="label bg-color-greenLight"><i class="fa fa-caret-up"></i> 97%</span>
															</li>
															<li>
																<span class="label bg-color-blueLight"><i class="fa fa-caret-down"></i> 44%</span>
															</li>
														</ul>
														<div class="sparkline txt-color-greenLight hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
															130, 187, 250, 257, 200, 210, 300, 270, 363, 247, 270, 363, 247
														</div>
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
														<div class="easy-pie-chart txt-color-greenLight" data-percent="78.9" data-pie-size="50">
															<span class="percent percent-sign">78.9 </span>
														</div>
														<span class="easy-pie-title"> Disk Space <i class="fa fa-caret-down icon-color-good"></i></span>
														<ul class="smaller-stat hidden-sm pull-right">
															<li>
																<span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 76%</span>
															</li>
															<li>
																<span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 3%</span>
															</li>
														</ul>
														<div class="sparkline txt-color-blue hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
															257, 200, 210, 300, 270, 363, 130, 187, 250, 247, 270, 363, 247
														</div>
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
														<div class="easy-pie-chart txt-color-blue" data-percent="23" data-pie-size="50">
															<span class="percent percent-sign">23 </span>
														</div>
														<span class="easy-pie-title"> Transfered <i class="fa fa-caret-up icon-color-good"></i></span>
														<ul class="smaller-stat hidden-sm pull-right">
															<li>
																<span class="label bg-color-darken">10GB</span>
															</li>
															<li>
																<span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 10%</span>
															</li>
														</ul>
														<div class="sparkline txt-color-darken hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
															200, 210, 363, 247, 300, 270, 130, 187, 250, 257, 363, 247, 270
														</div>
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
														<div class="easy-pie-chart txt-color-darken" data-percent="36" data-pie-size="50">
															<span class="percent degree-sign">36 <i class="fa fa-caret-up"></i></span>
														</div>
														<span class="easy-pie-title"> Temperature <i class="fa fa-caret-down icon-color-good"></i></span>
														<ul class="smaller-stat hidden-sm pull-right">
															<li>
																<span class="label bg-color-red"><i class="fa fa-caret-up"></i> 124</span>
															</li>
															<li>
																<span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 40 F</span>
															</li>
														</ul>
														<div class="sparkline txt-color-red hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
															2700, 3631, 2471, 2700, 3631, 2471, 1300, 1877, 2500, 2577, 2000, 2100, 3000
														</div>
													</div>
												</div>

											</div>
											<!-- end s1 tab pane -->

											<div class="tab-pane fade" id="s2">
												<div class="widget-body-toolbar bg-color-white">

													<form class="form-inline" role="form">

														<div class="form-group">
															<label class="sr-only" for="s123">Show From</label>
															<input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
														</div>
														<div class="form-group">
															<input type="email" class="form-control input-sm" id="s124" placeholder="To">
														</div>

														<div class="btn-group hidden-phone pull-right">
															<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
															<ul class="dropdown-menu pull-right">
																<li>
																	<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
																</li>
																<li>
																	<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
																</li>
															</ul>
														</div>

													</form>

												</div>
												<div class="padding-10">
													<div id="statsChart" class="chart-large has-legend-unique"></div>
												</div>

											</div>
											<!-- end s2 tab pane -->

											<div class="tab-pane fade" id="s3">

												<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

													<div class="inline-group">

														<label for="gra-0" class="checkbox">
															<input type="checkbox" name="gra-0" id="gra-0" checked="checked">
															<i></i> Target </label>
														<label for="gra-1" class="checkbox">
															<input type="checkbox" name="gra-1" id="gra-1" checked="checked">
															<i></i> Actual </label>
														<label for="gra-2" class="checkbox">
															<input type="checkbox" name="gra-2" id="gra-2" checked="checked">
															<i></i> Signups </label>

													</div>

													<div class="btn-group hidden-phone pull-right">
														<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
															</li>
														</ul>
													</div>

												</div>

					<?php $qery1="SELECT * FROM categories";
						  $res=mysqli_query($connection,$qery1);
						  $nrcategory=mysqli_num_rows($res);

						  $qery2="SELECT * FROM subcategories";
						  $rezlt=mysqli_query($connection,$qery1);
						  $nrsubcategory=mysqli_num_rows($rezlt);
					$insrStat1="UPDATE statdata SET numofcatsub='$nrcategory' WHERE csnames='Category'" ;
					  mysqli_query($connection,$insrStat1);

					  $insrStat2="UPDATE statdata SET numofcatsub='$nrsubcategory' WHERE csnames='Subcategory'" ;
					  mysqli_query($connection,$insrStat2);

					 $finalqryData="SELECT * FROM statdata";
					  $res=mysqli_query($connection,$finalqryData);

													?>

<!--- Script and Logic FOR GR PIE CHART ---->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {  //  will draw pie chart

    var data = google.visualization.arrayToDataTable([
      ['csnames', 'numofcatsub'],
      <?php
      if(mysqli_num_rows($res) > 0){
          while($rowd = mysqli_fetch_array($res)){
          echo "['".$rowd['csnames']."=".$rowd['numofcatsub']."', ".$rowd['numofcatsub']."],"; //fetched data for drawing piechart
          }
      }
      ?>
    ]);

    var options = {
        title: 'Statistics of Category and Subcategory',
        width: 460,
		backgroundColor: '#70263D',
        height: 406,
		is3D: true,
        titleTextStyle: {
        color: 'white',
		fontSize:20,
		bold:false,
    },

legend: {
    textStyle: {
        color: 'white'
    }
},
    };

    var chart = new google.visualization.PieChart(document.getElementById('flot12'));

    chart.draw(data, options);
}
</script>


												<div class="padding-10" id="flot12">
													<div id="flotcontainer" class="chart-large has-legend-unique">



													</div>
												</div>
											</div>
											<!-- end s3 tab pane -->
										</div>

										<!-- end content -->
									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article>
					</div>

					<!-- end row -->

					<!-- row -->

					<div class="row">


						<article class="col-sm-12 col-md-12 col-lg-6">

							<!-- new widget -->
							<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false">

								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->

								<header>
									<span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
									<h2>Birds Eye</h2>
									<div class="widget-toolbar hidden-mobile">
										<span class="onoffswitch-title"><i class="fa fa-location-arrow"></i> Realtime</span>
										<span class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked="checked" id="myonoffswitch">
											<label class="onoffswitch-label" for="myonoffswitch"> <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> <span class="onoffswitch-switch"></span> </label> </span>
									</div>
								</header>

								<!-- widget div-->
								<div>
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<div>
											<label>Title:</label>
											<input type="text" />
										</div>
									</div>
									<!-- end widget edit box -->

									<div class="widget-body no-padding">
										<!-- content goes here -->

										<div id="vector-map" class="vector-map"></div>
										<div id="heat-fill">
											<span class="fill-a">0</span>

											<span class="fill-b">5,000</span>
										</div>

										<table class="table table-striped table-hover table-condensed">
											<thead>
												<tr>
													<th>Country</th>
													<th>Visits</th>
													<th class="text-align-center">User Activity</th>
													<th class="text-align-center hidden-xs">Online</th>
													<th class="text-align-center">Demographic</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="javascript:void(0);">USA</a></td>
													<td>4,977</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														2700, 3631, 2471, 1300, 1877, 2500, 2577, 2700, 3631, 2471, 2000, 2100, 3000
													</div></td>
													<td class="text-align-center hidden-xs">143</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														17,83
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);">Australia</a></td>
													<td>4,873</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														1000, 1100, 3030, 1300, -1877, -2500, -2577, -2700, 3631, 2471, 4700, 1631, 2471
													</div></td>
													<td class="text-align-center hidden-xs">247</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														22,88
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);">India</a></td>
													<td>3,671</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														3631, 1471, 2400, 3631, 471, 1300, 1177, 2500, 2577, 3000, 4100, 3000, 7700
													</div></td>
													<td class="text-align-center hidden-xs">373</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														10,90
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);">Brazil</a></td>
													<td>2,476</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														2700, 1877, 2500, 2577, 2000, 3631, 2471, -2700, -3631, 2471, 1300, 2100, 3000,
													</div></td>
													<td class="text-align-center hidden-xs ">741</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														34,66
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);">Turkey</a></td>
													<td>1,476</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														1300, 1877, 2500, 2577, 2000, 2100, 3000, -2471, -2700, -3631, -2471, 2700, 3631
													</div></td>
													<td class="text-align-center hidden-xs">123</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														75,25
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);">Canada</a></td>
													<td>146</td>
													<td class="text-align-center">
													<div class="sparkline txt-color-orange text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
														5, 34, 10, 1, 4, 6, -9, -1, 0, 0, 5, 6, 7
													</div></td>
													<td class="text-align-center hidden-xs">23</td>
													<td class="text-align-center">
													<div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
														50,50
													</div>
													<div class="btn-group display-inline pull-right text-align-left hidden-tablet">
														<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog fa-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-xs pull-right">
															<li>
																<a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
															</li>
															<li>
																<a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
															</li>
															<li class="divider"></li>
															<li class="text-align-center">
																<a href="javascript:void(0);">Cancel</a>
															</li>
														</ul>
													</div></td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan=5>
													<ul class="pagination pagination-xs no-margin">
														<li class="prev disabled">
															<a href="javascript:void(0);">Previous</a>
														</li>
														<li class="active">
															<a href="javascript:void(0);">1</a>
														</li>
														<li>
															<a href="javascript:void(0);">2</a>
														</li>
														<li>
															<a href="javascript:void(0);">3</a>
														</li>
														<li class="next">
															<a href="javascript:void(0);">Next</a>
														</li>
													</ul></td>
												</tr>
											</tfoot>
										</table>

										<!-- end content -->

									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

							<!-- new widget -->

							</div>

						</article>

					</div>

					<!-- end row -->

				</section>
				<!-- end widget grid -->


				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

	<?php
	include('footer.php');
	?>
