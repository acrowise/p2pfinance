<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 03/03/2018
 * Time: 12:43 PM
 *
 */
require_once("../classes/mysql.class.php");
if (isset($_SESSION['P2P_UserGroup'])) {
    $colname_links = $_SESSION['P2P_UserGroup'];
}
$menu = new MySQL();
$sql = sprintf("SELECT usr_links.link_id, usr_links.page_id,usr_links.page_id_sub, usr_links.link_url, usr_links.link_name, usr_links.link_target, usr_links.link_image, usr_links.link_parent FROM usr_cat_links INNER JOIN usr_links ON usr_cat_links.link_id = usr_links.link_id WHERE usr_cat_links.cat_id = %s ORDER BY usr_links.disp_order ASC", MySQL::SQLValue($colname_links, MySQL::SQLVALUE_NUMBER));
$links = $menu->QueryArray($sql, MYSQLI_ASSOC);
$menu_count = $menu->RowCount();
if($menu_count > 0) {
    $parents = array();
    $child = array();

    foreach ($links as $row_links) {
        if ($row_links['link_parent'] == 0) {
            $parents[] = $row_links;
        } else {
            $child[] = $row_links;
        }
    }

}

?>

<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/26115.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php @session_start(); echo $_SESSION['P2P_username'];?></p>

                <a href="#"><i class="ion-record text-success"></i> <?php echo $_SERVER['REMOTE_ADDR'] ?></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php if($page === "home"){echo "active";}?>">
                <a href="../inc/dashboard.php">
                    <i class="ion-home "></i> <span> Dashboard</span>
                </a>
            </li>

            <?php
            if($menu_count > 0){?>

                <?php foreach($parents as $parent){ ?>

                    <li class="treeview <?php if($page==$parent['page_id']){echo "active";}?>" >
                        <a href="#" class="<?php if($page==$parent['page_id']){echo "has-ul legitRipple";}?>">
                            <i class="<?php echo $parent['link_image'] ?>"></i><span> <?php echo $parent['link_name']; ?></span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach($child as $sub){ if($parent['link_id']==$sub['link_parent']){ ?>
                                <li class="treeview <?php if(isset($page_sub) && $page_sub==$sub['page_id_sub']){echo "active";}?>">
                                    <a href="<?php echo $sub['link_url'] ?>"><i style="color: #f39c12;" class="<?php echo $sub['link_image'] ?>"></i><?php echo $sub['link_name']; ?></a></li>
                            <?php }}?>
                        </ul>
                    </li>
                <?php }}?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
