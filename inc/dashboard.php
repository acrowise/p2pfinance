<?php
session_start();
require_once('../classes/mysql.class.php');
$page = 'home';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Director | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->

</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php require_once('../inc/header.php');?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
   <?php require_once('../inc/sidebar.php')?>

    <aside class="right-side">

        <!-- Main content -->
        <section class="content">


            <!-- Main row -->
            <div class="row">



                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                            <div class="sm-st-info">
                                <span>3200</span>
                                Total Tasks
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                            <div class="sm-st-info">
                                <span>2200</span>
                                Total Messages
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                            <div class="sm-st-info">
                                <span>100,320</span>
                                Total Profit
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                            <div class="sm-st-info">
                                <span>4567</span>
                                Total Documents
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">

                <div class="col-md-8">
                    <!--earning graph start-->
                    <section class="panel">
                        <header class="panel-heading">
                            Work Progress
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Manager</th>
                                    <!-- <th>Client</th> -->
                                    <th>Deadline</th>
                                    <!-- <th>Price</th> -->
                                    <th>Status</th>
                                    <th>Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Facebook</td>
                                    <td>Mark</td>
                                    <!-- <td>Steve</td> -->
                                    <td>10/10/2014</td>
                                    <!-- <td>$1500</td> -->
                                    <td><span class="label label-danger">in progress</span></td>
                                    <td><span class="badge badge-info">50%</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Twitter</td>
                                    <td>Evan</td>
                                    <!-- <td>Darren</td> -->
                                    <td>10/8/2014</td>
                                    <!-- <td>$1500</td> -->
                                    <td><span class="label label-success">completed</span></td>
                                    <td><span class="badge badge-success">100%</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Google</td>
                                    <td>Larry</td>
                                    <!-- <td>Nick</td> -->
                                    <td>10/12/2014</td>
                                    <!-- <td>$2000</td> -->
                                    <td><span class="label label-warning">in progress</span></td>
                                    <td><span class="badge badge-warning">75%</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>LinkedIn</td>
                                    <td>Allen</td>
                                    <!-- <td>Rock</td> -->
                                    <td>10/01/2015</td>
                                    <!-- <td>$2000</td> -->
                                    <td><span class="label label-info">in progress</span></td>
                                    <td><span class="badge badge-info">65%</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Tumblr</td>
                                    <td>David</td>
                                    <!-- <td>HHH</td> -->
                                    <td>01/11/2014</td>
                                    <!-- <td>$2000</td> -->
                                    <td><span class="label label-warning">in progress</span></td>
                                    <td><span class="badge badge-danger">95%</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Tesla</td>
                                    <td>Musk</td>
                                    <!-- <td>HHH</td> -->
                                    <td>01/11/2014</td>
                                    <!-- <td>$2000</td> -->
                                    <td><span class="label label-info">in progress</span></td>
                                    <td><span class="badge badge-success">95%</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Ghost</td>
                                    <td>XXX</td>
                                    <!-- <td>HHH</td> -->
                                    <td>01/11/2014</td>
                                    <!-- <td>$2000</td> -->
                                    <td><span class="label label-info">in progress</span></td>
                                    <td><span class="badge badge-success">95%</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!--earning graph end-->

                </div>
                <div class="col-lg-4">

                    <!--chat start-->
                    <section class="panel">
                        <header class="panel-heading">
                            Notifications
                        </header>
                        <div class="panel-body" id="noti-box">

                            <div class="alert alert-block alert-danger">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                            </div>
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </div>
                            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                            </div>



                        </div>
                    </section>



                </div>


            </div>




            <!-- row end -->
        </section><!-- /.content -->
        <?php require_once('../inc/footer.php');?>

<!-- Director for demo purposes -->


<script>
    $('#noti-box').slimScroll({
        height: '450px',
        size: '5px',
        BorderRadius: '5px'
    });

</script>
</body>
</html>