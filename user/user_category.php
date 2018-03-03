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
$page_sub = "usr_category";
$pull_ucat = new MySQL();
$pull_ucat->Query("SELECT * FROM usr_cat");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>P2PFinance | User Category</title>
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
                                <h6 class="panel-title">User Category</h6>

                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form id="createUserCatForm" method="post" action="">

                                        <table class="table table-responsive table-email table-bordered" style="width: 700px;" align="center">

                                            <thead>

                                            <tr>
                                                <td colspan="5"><p id="confirmation" style="text-align:center"></p></td>
                                            </tr>

                                            </thead>
                                            <tbody>


                                            <tr>
                                                <td><label>Category Name:</label></td>
                                                <td><input type="text" name="cat_name" id="cat_name" class="form-control"><p id="cname_error"></p></td>
                                                <td><label>Status:</label></td>
                                                <td>
                                                    <select class="form-control" id="status" name="status" style="height: 35px;">
                                                        <option value="Active">Active</option>
                                                        <option value="Active">Inactive</option>
                                                    </select>
                                                </td>

                                                <td><input  type="submit" name="save" id="save" class="btn btn-primary" value="Save"></td>
                                            </tr>

                                            </tbody>

                                            <input type="hidden" name="do" value="CreateUserCat">

                                        </table>
                                        <hr>
                                    </form>
                                    <div>
                                        <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../dist/img/spinner-grey.gif" > Adding user category. Please wait....</p>
                                    </div>
                                    <div id="uc_response"></div>
                                </div>

                                    <div id="uclisted">
                                        <table class="table table-striped table-hover table-email table-bordered" style="width: 400px;" align="center">
                                            <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                                <tr>
                                                    <td><?php echo $ucrow->cat_name;?></td>
                                                    <td><?php echo $ucrow->status;?></td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /latest posts -->

                    </div>
                <!-- /dashboard content -->

            </section>
            <?php require_once('../inc/footer.php');?>
        </aside><!-- /.right-side -->
<script>
$(function () {

            var $buttons = $("#save");
            var $form = $("#createUserCatForm");

            $buttons.click(function (e) {

                e.preventDefault();
                $("#uc_response").empty();

                var cname = $.trim($("#cat_name").val());


                if(cname.length == 0){

                    $("#cname_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                }


                if(cname.length != 0){

                    $("#save").attr("disabled", "disabled");
                    $("#wait").css("display","block");
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                    $.ajax({
                        type: "POST",
                        url: "../controller/userController.php",
                        data: $form.serialize(),
                        success: function(e) {


                            if(e=="error"){


                                $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save user category.</span></div><br>").hide().fadeIn(1000);
                                $("#wait").css("display","none");
                                $("#save").removeAttr('disabled');


                            }else if(e=="exists"){


                                $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This user category already exists.</span></div><br>").hide().fadeIn(1000);
                                $("#wait").css("display","none");
                                $("#save").removeAttr('disabled');


                            }else {

                                $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>User category saved successfully.</span></div><br>").hide().fadeIn(1000);
                                $('#uclisted').empty();
                                $('#uclisted').html(e);
                                $("#wait").css("display","none");
                                $("#cat_name").val("");
                                $("#save").removeAttr('disabled');
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

