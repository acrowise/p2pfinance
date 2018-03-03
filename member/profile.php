<?php
session_start();
require_once('../classes/mysql.class.php');
$page = 'member';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>P2PFinance | Assign Privilege</title>
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
    <?php require_once('../inc/sidebar.php') ?>

    <aside class="right-side">

        <!-- Main content -->
        <section class="content">


            <!-- Main row -->
            <div class="row">

                <div class="col-md-8">
                    <!--earning graph start-->
                    <section class="panel general">
                        <header class="panel-heading">
                            Account
                        </header>
                        <header class="panel-heading tab-bg-dark-navy-blue">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#profile">
                                        <i class="ion-person"></i>
                                        Profile
                                    </a>
                                </li>
                                <li >
                                    <a data-toggle="tab" href="#account">
                                        <i class="ion-briefcase"></i>
                                        Account
                                    </a>
                                </li>
                                <li >
                                    <a data-toggle="tab" href="#password">
                                        <i class="ion-key"></i>
                                        Password
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">

                                <div id="profile" class="tab-pane active">
                                    <h5>Profile Info</h5>
                                    <br>
                                    <div class="col-md-4 ">
                                        <img src="../img/26115.jpg" alt="Avatar" class="img-circle" width="120" height="120">
                                        <br>
                                        <p class="col-md-offset-1">Profile Picture</p>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p><b>Full name</b><br>
                                            User fullname</p>
                                        <p><b>Phone Number</b><br>
                                            0244 5544646 </p>
                                        <p><b>Email Address</b><br>
                                            example@email.com</p>

                                    </div>

                                    <div class="col-md-4">
                                        <p><b>State</b><br>
                                            Accra</p>
                                        <p><b>Last Amount</b><br>
                                            $100.00 </p>
                                        <p><b>Last Login</b><br>
                                            March 1,2018,9 am</p>
                                    </div>
                                    <br>
                                </div>
                                <div id="account" class="tab-pane ">
                                    <h5>Account Info</h5>
                                    <p>You will not be able to change the account number and bank name after putting it for the first time, but you can change the account name. To change the account name, please contact support. </p>
                                    <br>
                                    <div class="input-group m-b-10">
                                        <span class="input-group-addon">Account Type</span>
                                        <select  class="form-control" >
                                            <option>MTN Mobile Money</option>
                                            <option>Tigo Cash</option>
                                            <option>Vodafone Cash</option>
                                            <option>Airtel Money</option>
                                        </select>
                                    </div>
                                    <div class="input-group m-b-10">
                                        <span class="input-group-addon">Full Name</span>
                                        <input type="text" class="form-control" placeholder="" value="User Name" disabled>
                                    </div>
                                    <div class="input-group m-b-10">
                                    <span class="input-group-addon">Phone Number</span>
                                    <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-10">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="password" class="tab-pane ">
                                    <h5>Change Password</h5>
                                    <br>
                                    <div class="col-md-8 col-lg-offset-2 form-group">
                                        <input type="password" placeholder="Old password" class="form-control">
                                    </div>
                                    <div class="col-md-8 col-lg-offset-2 form-group">
                                        <input type="password" placeholder="New password" class="form-control">
                                    </div>
                                    <div class="col-md-8 col-lg-offset-2 form-group">
                                        <input type="password" placeholder="Re-type password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-10">
                                            <button type="submit" class="btn btn-default">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4">

                    <!--chat start-->
                    <section class="panel">
                        <header class="panel-heading">
                           Notifications
                        </header>
                        <div class="panel-body" id="noti-box">


                            <div class="alert alert-warning">
                                <button  class="close" type="button">
                                    <i class="ion-pin"></i>
                                </button>
                                <strong>HOW IT WORKS!</strong>  To give to the community click on Give(Make Donation). Fill in the amount you wish to give to the community. Note that you will be merged to pay 20% first after which you will be merged to pay the remaining 80%.<br><br>

                                On the 6th day, a recommit button will appear on your dashboard; click on it and input the amount you wish to give the community again. In some hours, you will be merged to pay 20% of this commitment.<br><br>

                             After you must have fulfilled all these, on the 7th day "Add to queue" button will appear. This is the button that you will click for the community to pay you, your money plus 50% ROI.<br><br>

                                   Still confused, chat up an admin or use the support channel.</div>
                        </div>



                    </section>



                </div>


            </div>

            <!-- row end -->

        </section>
        <?php require_once('../inc/footer.php');?>
    </aside><!-- /.right-side -->

<script>
    $('#noti-box').slimScroll({
        height: '450px',
        size: '5px',
        BorderRadius: '5px'
    });

</script>
</body>
</html>