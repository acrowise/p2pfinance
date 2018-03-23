<?php
require_once('../../classes/mysql.class.php');
if(!isset($_SESSION)){
    session_start();
}
$object = new MySQL();
$object->checkLogin();
$page = "user";
$sub_page_name = "add_user";

$getUserCat = new MySQL();
$getUserCat->Query("SELECT * FROM adm_usr_cat WHERE status = 'Active' AND cat_id > 2");
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
	<title>p2p-Finance | Add User</title>
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
	<link rel="stylesheet" type="text/css" href="../../assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="../../assets/uniform/css/uniform.default.css" />
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap-daterangepicker/daterangepicker.css" />
	<link href="../../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="../../assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
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
							Add User
							<small></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="../../index.php">Home</a> <span class="divider">/</span>
							</li>
							<li><a href="#">Add User Category</a></li>
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
									<h4><i class="icon-user"></i> Add A User Category</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
                                    <p id="confirmation"></p>
                                    <p id="wait" style="display: none; text-align: center"><img src="../../assets/img/loading.gif"> processing. Please wait...</p>
                                    <form method="POST" action="" id="addUserCatForm">
									<table class="table table-bordered table-advance">
                                        <tbody>
                                            <tr>
                                                <td><h5>Category Name:</h5></td>
                                                <td><input type="text" name="cat_name" id="cat_name" class="form-inline"><br><p id="cname_error"></p></td>

                                            <td><h5>Category Description:</h5></td>
                                            <td><textarea name="cat_desc" id="cat_desc" class="form-inline"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><input style="float: right;" type="submit" name="create" id="create" value="Create" class="btn btn-primary btn-small"></td>
                                        </tr>
                                        </tbody>
									</table>
                                    </form>
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
											<span class="small italic">2 days ago</span>										
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
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<script src="../../assets/js/jquery-1.8.2.min.js"></script>
	<script src="../../assets/jQuery-slimScroll/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="../../assets/jQuery-slimScroll/slimScroll.min.js"></script>
	<script src="../../assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/js/jquery.blockui.js"></script>
	<script src="../../assets/js/jquery.cookie.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="../../assets/js/excanvas.js"></script>
	<script src="../../assets/js/respond.js"></script>
	<![endif]-->	
	<script src="../../assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="../../assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script src="../../assets/jquery-knob/js/jquery.knob.js"></script>
	<script src="../../assets/flot/jquery.flot.js"></script>
	<script src="../../assets/flot/jquery.flot.resize.js"></script>
	<script src="../../assets/js/jquery.peity.min.js"></script>
	<script type="text/javascript" src="../../assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="../../assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.pulsate.min.js"></script>
	<script type="text/javascript" src="../../assets/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../../assets/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="../../assets/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="../../assets/js/app.js"></script>
	<script>
		jQuery(document).ready(function() {		
			// initiate layout and plugins
			App.setMainPage(true);
			App.init();
		});
	</script>
    <script type="text/javascript">

        $(function () {

            var $btns = $("#create");
            $btns.click(function (e) {
                e.preventDefault();

                $("#fname_error").empty();

                var fname = $.trim($("#fullname").val());

                if(fname.length == 0){

                    $("#fname_error").html('<p><small style="color:red;">No option selected.</small><p/>');

                }


                if(fname.length != 0) {

                    $("#wait").css("display", "block");
                    $("#create").attr("disabled", "disabled");

                    $.ajax({
                        type: "POST",
                        url: "../../controller/users/process_user_creation.php",
                        data: $('#cuform').serialize(),
                        success: function (e) {


                            if (e == "fail") {
                                $("#wait").css("display", "none");
                                $("#create").removeAttr('disabled');

                                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User Creation Failed</span></div>");
                                $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                            } else if (e == "ok") {

                                $("#wait").css("display", "none");
                                $("#create").removeAttr('disabled');

                                $('#confirmation').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User Created successfully</span></div>")
                                $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                            } else if (e == "incomplete") {

                                $("#wait").css("display", "none");
                                $("#create").removeAttr('disabled');

                                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Complete all fields before submitting</span></div>");
                                $("#confirmation").hide().fadeIn(2000);

                            } else if (e == "exists") {

                                $("#wait").css("display", "none");
                                $("#create").removeAttr('disabled');

                                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User already exists in the system</span></div>");
                                $("#confirmation").hide().fadeIn(2000);

                            }


                        }
                    });
                    return false;
                }

            });

        });
    </script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>