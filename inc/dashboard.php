<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Director | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

    </style>
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="login.html" class="logo">
        Director
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ion-person"></i>
                        <span>Jane Doe <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">Account</li>


                        <li>
                            <a href="#">
                                <i class="ion-person pull-right"></i>
                                Profile
                            </a>
                            <a data-toggle="modal" href="#modal-user-settings">
                                <i class="ion-gear-a pull-right"></i>
                                Settings
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#"><i class="ion-power pull-right"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../img/26115.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Username</p>

                    <a href="#"><i class="ion-record text-success"></i> IP/GPS</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="ion-home"></i> <span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../settings.html">
                        <i class="ion-gear-a"></i> <span> Settings</span>
                    </a>
                </li>

                <li>
                    <a href="../donate.html">
                        <i class="ion-waterdrop"></i> <span> Make Donation</span>
                    </a>
                </li>

                <li>
                    <a href="../history.html">
                        <i class="ion-social-buffer"></i> <span> History</span>
                    </a>
                </li>
                <li>
                    <a href="../referrals.html">
                        <i class="ion-android-share"></i> <span> Referrals</span>
                    </a>
                </li>
                <li>
                    <a href="../contact.html">
                        <i class="ion-help-buoy"></i> <span> Contact Suppport</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ion-person-stalker"></i> <span> Community</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ion-power"></i> <span> Log Out</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

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
        <div class="footer-main">
            Copyright &copy Director, 2014
        </div>
    </aside><!-- /.right-side -->

</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery UI 1.10.3 -->
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>


<!-- Director App -->
<script src="../js/Director/app.js" type="text/javascript"></script>

<!-- Director dashboard demo (This is only for demo purposes) -->
<script src="../js/Director/dashboard.js" type="text/javascript"></script>

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