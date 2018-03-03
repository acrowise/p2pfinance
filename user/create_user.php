<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 04/01/2018
 * Time: 04:25 PM
 */

session_start();
require_once('../classes/mysql.class.php');
require_once('../classes/util.class.php');

$object = new MySQL();
$util = new Util();
$object->checkLogin();
$page = "user";
$page_sub = "create_user";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>P2PFinance | Create User</title>
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

                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-lg-12">


                        <!-- Latest posts -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Create User</h6>

                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form id="form" method="post">
                                        <div class="box-body">

                                            <div align="center"><img src="../img/spinner.gif" alt="loading" id="wait" style="display: none; margin-top: -8px;"></div>
                                            <p id="ack" class="login-box-msg"></p>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                                        <div class="col-sm-10">
                                                            <select name="fullname" id="fullname"  data-placeholder="Select Staff..." class="form-control select-size-lg">
                                                                <option></option>                                                                <?php $uname = new MySQL;  $uname->Query("SELECT * FROM membership ORDER BY first_name ASC");
                                                                while(!$uname->EndOfSeek()){$urow = $uname->Row(); ?>
                                                                    <option value="<?php echo $urow->id .":".$urow->last_name.' '.$urow->first_name; ?>">
                                                                        <?php echo "$urow->first_name $urow->last_name";?>
                                                                    </option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.col -->

                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="description" class="col-sm-2 control-label">category</label>
                                                        <div class="col-sm-10">
                                                            <select name="category" id="category"  data-placeholder="Select Staff Category..." class="form-control select-size-lg">
                                                                <?php $cat = new MySQL; $cat->MoveFirst(); $cat->Query("SELECT * FROM usr_cat ORDER BY cat_name ASC");
                                                                while(!$cat->EndOfSeek()){$row = $cat->Row(); ?>
                                                                    <option value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_name ;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">username</label>
                                                        <div class="col-sm-10">
                                                            <input  name="username" id="username" type="text" class="form-control" required readonly>
                                                            <span id="unerror" style="color: red;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">password</label>
                                                        <div class="col-sm-10">
                                                            <input name="password" id="password" type="password" class="form-control" required>
                                                            <span id="pwerror" style="color: red;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="box-footer " align="center">
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-info " id="add">Add User</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="do" value="createUser"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /latest posts -->

                    </div>
                <!-- /dashboard content -->
                </div>
            </section>
        <?php require_once('../inc/footer.php');?>
    </aside><!-- /.right-side -->

<!-- /page container -->
    <script>
        $(document).on('click','#add',function(e){
            e.preventDefault();
            var uname = $.trim($("#username").val());
            var pass = $.trim($("#password").val());
            if(uname.length == 0){

                $("#unerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");

            }

            if(pass.length == 0){

                $("#pwerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");

            }

            if(uname.length != 0 && pass.length != 0) {

                $("#wait").css("display", "block");
                $("#add").attr("disabled", "disabled");
                $.ajax({
                    type: "POST",
                    url: "../controller/userController.php",
                    data: $("#form").serialize(),
                    success: function (e) {
                        console.log(e);

                        if (e == "fail") {
                            $("#wait").css("display", "none");
                            $("#add").removeAttr('disabled');

                            $('#username').val("");
                            $('#password').val("");

                            $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User Creation Failed</span></div>")
                            $("#ack").hide().fadeIn(2000).fadeOut(4000);

                        } else if (e == "ok") {

                            $("#wait").css("display", "none");
                            $("#add").removeAttr('disabled');

                            $('#username').val("");
                            $('#password').val("");
                            $('#ack').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User Created successfully</span></div>")
                            $("#ack").hide().fadeIn(2000).fadeOut(4000);

                        } else if (e == "incomplete") {

                            $("#wait").css("display", "none");
                            $("#add").removeAttr('disabled');

                            $('#username').val("");
                            $('#password').val("");
                            $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Complete all fields before submitting</span></div>");
                            $("#confirmation").hide().fadeIn(2000);

                        } else if (e == "exists") {

                            $("#wait").css("display", "none");
                            $("#add").removeAttr('disabled');

                            $('#username').val("");
                            $('#password').val("");
                            $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User already exists in the system</span></div>")
                            $("#confirmation").hide().fadeIn(2000);

                        }


                    }
                });
                return false;
            }

        });
        $(document).on("change","#fullname",function(){

            $("#eerror").empty();
            $("#email_wait").css("display", "block");
            var dropvalue = $("#fullname").prop("value");

            $.ajax({
                type: "POST",
                url: "../controller/userController.php",
                data: {eid : dropvalue},
                success:function(email) {

                    var fetched = email;

                    if(fetched == "empty") {

                        $("#eerror").html('<p><small style="color:red;">This staff has no email in the system</small><p/>');
                        $("#email_wait").css("display", "none");

                    }else{

                        $("#username").val(email);
                        $("#email_wait").css("display", "none");
                        $("#create").removeAttr('disabled');

                    }

                }

            });
        });
    </script>

</body>
</html>

