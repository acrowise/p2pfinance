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
$page_sub = "list_user";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>P2PFinance | List User</title>
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
                                <h6 class="panel-title">List User</h6>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form id="form" method="post">
                                        <div class="box-body">

                                            <div align="center"><img src="../img/spinner.gif" alt="loading" id="wait" style="display: none; margin-top: -8px;"></div>
                                            <p id="ack" class="login-box-msg"></p>
                                            <br>

                                            <div class="row" align="center">
                                                <div class="col-md-7">
                                                    <div class="form-group ">
                                                        <div class="col-sm-10 pull-right">
                                                            <select  name="usercat" id="usercat"  data-placeholder="FILTER BY USER CATEGORY" class="form-control select-size-lg">
                                                                <option></option>
                                                                <?php $cat = new MySQL; $cat->MoveFirst(); $cat->Query("SELECT * FROM usr_cat ORDER BY cat_name ASC");
                                                                while(!$cat->EndOfSeek()){$row = $cat->Row(); ?>
                                                                    <option value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_name ;?></option>
                                                                <?php }?>
                                                            </select>
                                                            <br><p id="uerror"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <button type="submit" class="btn btn-info pull-left" id="search">Search User</button>
                                                </div>
                                            </div>


                                            <input type="hidden" name="do" id="do" value="Userlist">
                                    </form>


                                    <div id="listarea" class="container-fluid">

                                    </div>

                                </div>
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
<!-- /page container -->
    <script>
        $(function () {

            var $btns = $("#search");
            $btns.click(function (e) {

                e.preventDefault();

                $('#listarea').empty();
                $('#uerror').empty();

                var usr = $("#usercat").val();
                var action = $("#do").val();
                if(  usr === null){


                    $("#uerror").html('<p><small style="color:red;">select a user category.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                }

                if(usr.length != 0){

                    $("#wait").css("display","block");
                    $("#search").attr("disabled", "disabled");
                    var form  = $('#usform').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../controller/userController.php",
                        data: {usercat:usr,do:action},
                        success: function(e) {
                            console.log(e);


                            if(e=="zero"){

                                $("#wait").css("display","none");

                                $("#listarea").html("<br><div align='center'><span class='alert alert-danger' style='text-align: center'> No results found for this search.</span></div>");
                                $("#listarea").hide().fadeIn(2000);
                                $("#search").removeAttr('disabled')

                            }else{

                                $("#wait").css("display","none");
                                $('#listarea').html(e);
                                $("#search").removeAttr('disabled');

                            }



                        }
                    });
                    return false;
                }

            });

        });

    </script>

</body>
</html>

