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
$page_sub="assign_privis";
$alluserlinks = new MySQL();

$psql = sprintf("SELECT * FROM usr_links WHERE status = 'Active' ORDER BY disp_order");

$all_links = $alluserlinks->QueryArray($psql, MYSQLI_ASSOC);

$main = array();
$children = array();
if(!empty($all_links)) {
    foreach ($all_links as $r_links) {
        if ($r_links['link_parent'] == 0) {
            $main[] = $r_links;
        } else {
            $children[] = $r_links;
        }
    }
}
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
                                <h6 class="panel-title">Assign Privilege</h6>

                            </div>

                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div>
                                        <p align="center" style="display: none; color: limegreen;" id="wait"><i class="fa fa-spinner fa-spin"></i> saving privileges. Please wait....</p>
                                        <p align="center" style="display: none; color: limegreen;" id="wait_fetch"><i class="fa fa-spinner fa-spin"></i> Fetching privileges for selected category. Please wait....</p>
                                    </div>
                                    <div>

                                        <form method="POST" class="new_user_form" action="" id="laform">
                                            <table class="table table-responsive table-email table-bordered" align="center">
                                                <tr>
                                                    <td colspan="4"><p id="confirmation" style="text-align:center"></p></td>
                                                </tr>


                                                <tr>
                                                    <td><label>Category:</label></td>
                                                    <td><select name="user_cat" id="user_cat" style=" height:30px" class="select-size-lg" data-placeholder="SELECT CATEGORY...">
                                                            <option disabled selected></option>
                                                            <?php $cat = new MySQL; $cat->Query("SELECT * FROM usr_cat ORDER BY cat_name ASC");
                                                            while(!$cat->EndOfSeek()){$crow = $cat->Row(); ?>
                                                                <option value="<?php echo $crow->cat_id; ?>">
                                                                    <?php echo $crow->cat_name; ?>
                                                                </option>
                                                            <?php }?>
                                                        </select>
                                                    </td>
                                                    <td><div><input type="submit" id="assign" class="btn btn-primary rounded-4" value="Assign Privileges"></div></td>
                                                </tr>
                                            </table>
                                            <div id="listarea">
                                                <table class="table table-responsive table-bordered">
                                                    <?php foreach($main as $mainlink){ ?>
                                                        <tr>
                                                            <td colspan="2"><h5><strong><?php echo $mainlink['link_name']; ?></strong></h5></td>
                                                        </tr>
                                                        <?php foreach($children as $subs){ if($mainlink['link_id']==$subs['link_parent']){ ?>
                                                            <tr>
                                                                <td style="width: 60px;"><input type="checkbox" name="priv_check[]" id="priv_check" value="<?php echo $subs['link_id'];?>"></td>
                                                                <td><?php echo $subs['link_name'];?></td>
                                                            </tr>
                                                        <?php }} ?>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                            <input type="hidden" name="do" value="assignPrivs">
                                        </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /latest posts -->

                    </div>
                <!-- /dashboard content -->
                </div>
            <!-- /dashboard content -->

        </section>
        <?php require_once('../inc/footer.php');?>
    </aside><!-- /.right-side -->
    <script>
        $(document).on("change","#user_cat",function(){
            var dropvalue = $("#user_cat").val();

            $("#wait_fetch").css("display", "block");

            $.ajax({
                type: "POST",
                url: "../controller/userController.php",
                data: {category_id : dropvalue
                },
                success:function(data) {


                    $('#listarea').html(data);
                    $("#assign").removeAttr('disabled');
                    $("#wait_fetch").css("display","none");


                }

            });
        });



        $("document").ready(function(){

            $("#assign").attr("disabled", true)

        });

        $(function () {

            var $btns = $("#assign");
            $btns.click(function (e) {
                e.preventDefault();

                $("#wait").css("display","block");
                $("#assign").attr("disabled", "disabled");

                $.ajax({
                    type: "POST",
                    url: "../controller/userController.php",
                    data: $('#laform').serialize(),
                    success: function(e) {


                        if(e=="d_fail"){
                            $("#wait").css("display","none");
                            $("#assign").removeAttr('disabled');


                            $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User privilege assignment failed</span></div>");
                            $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                        }else if(e=="ok"){

                            $("#wait").css("display","none");
                            $("#assign").removeAttr('disabled');


                            $('#confirmation').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User privileges were assigned successfully</span></div>");
                            $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                        }else if(e=="unchecked"){

                            $("#wait").css("display","none");
                            $("#assign").removeAttr('disabled');


                            $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Privilege assignment failed. No option was checked before assigning privileges</span></div>");
                            $("#confirmation").hide().fadeIn(2000);

                        }else if(e=="unselected"){

                            $("#wait").css("display","none");
                            $("#assign").removeAttr('disabled');


                            $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i>Privilege assignment failed. No user category was selected</span></div>");
                            $("#confirmation").hide().fadeIn(2000);

                        }


                    }
                });
                return false;

            });

        });
    </script>

</body>
</html>

