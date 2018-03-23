<?php
require_once('../../classes/mysql.class.php');
if(!isset($_SESSION)){
    session_start();
}
$object = new MySQL();
$object->checkLogin();
$page = "user";
$sub_page_name = "list_users";

$getAllUsers = new MySQL();
$getAllUsers->Query("SELECT adm_usr_users.*,adm_usr_cat.cat_name FROM adm_usr_users LEFT JOIN adm_usr_cat ON adm_usr_users.user_cat = adm_usr_cat.cat_id");
?>
<!DOCTYPE html>
<!--  
Template Name: Conquer Responsive Admin Dashboard Template build with Twitter Bootstrap 2.2.2
Version: 1.2
Author: KeenThemes
Website: http://www.keenthemes.com
Purchase: http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838
-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="ie10"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>p2p-Finance | List Users</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <link href="../../assets/css/style_responsive.css" rel="stylesheet" />
    <link href="../../assets/css/style_default.css" rel="stylesheet" id="style_color" />
    <link href="#" rel="stylesheet" id="style_metro" />
    <link href="../../assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" href="../../assets/data-tables/DT_bootstrap.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<?php require_once('../inc/header.php');?>
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
<?php require_once('../inc/menu.php');?>
		<!-- BEGIN PAGE -->
		<div id="body">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="widget-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button">×</button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">

						<h3 class="page-title">
							List Users
							<small></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="../../index.php">Home</a> <span class="divider">/</span>
							</li>
							<li><a href="#">List Users</a></li>
							<li class="pull-right dashboard-report-li">
								<div id="dashboard-report-range" class="dashboard-report-range-container no-text-shadow tooltips" data-placement="top" data-original-title="Change dashboard date range"><i class="icon-calendar icon-large"></i><span></span>
									<b class="caret"></b>
								</div>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
					<!-- BEGIN OVERVIEW STATISTIC BARS-->

					<!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid">
						<div class="span9">
							<!-- BEGIN SITE VISITS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-user"></i> List All Users</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th><h5>First Name</h5></th>
                                                <th><h5>Last Name</h5></th>
                                                <th><h5>Username</h5></th>
                                                <th><h5>User Category</h5></th>
                                                <th><h5>Account Status</h5></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while(!$getAllUsers->EndOfSeek()){$usrow = $getAllUsers->Row();?>
                                            <tr>
                                                <td><?php echo $usrow->first_name;?></td>
                                                <td><?php echo $usrow->last_name;?></td>
                                                <td><?php echo $usrow->username;?></td>
                                                <td><?php echo $usrow->cat_name;?></td>
                                                <td><?php echo $usrow->status;?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
									</table>
								</div>
							</div>
							<!-- END SITE VISITS PORTLET-->
						</div>
						<div class="span3">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-info-sign"></i>Guidelines</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
								</div>
								<div class="widget-body">
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
										<li>
											<span class="label label-warning"><i class="icon-bullhorn"></i></span>
											<span><!-- guidelines go here--></span>
										</li>
									</ul>
									<div class="space5"></div>
<!--									<a href="#" class="pull-right">View all notifications</a>										-->
									<div class="clearfix no-top-space no-bottom-space"></div>
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
					</div>
					<!-- BEGIN OVERVIEW STATISTIC BLOCKS-->

					<!-- END OVERVIEW STATISTIC BLOCKS-->

				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->		
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div id="footer">
		2012 &copy; Conquer. Admin Dashboard Template.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
<script src="../../assets/js/jquery-1.8.2.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery.blockui.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="../../assets/js/excanvas.js"></script>
<script src="../../assets/js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="../../assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../assets/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="../../assets/uniform/jquery.uniform.min.js"></script>
<script src="../../assets/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="../../assets/js/app.js"></script>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
    });
</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>