<?php
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 3/21/2018
 * Time: 12:01 PM
 */

require_once("../../classes/mysql.class.php");

if (isset($_SESSION['p2pAdm_User']['user_cat'])) {
    $colname_links = $_SESSION['p2pAdm_User']['user_cat'];
}

$menu = new MySQL();

$sql = sprintf("SELECT adm_usr_links.link_id, adm_usr_links.page_id,adm_usr_links.page_id_sub, adm_usr_links.link_url, adm_usr_links.link_name, adm_usr_links.link_image, adm_usr_links.link_parent FROM adm_usr_cat_links INNER JOIN adm_usr_links ON adm_usr_cat_links.link_id = adm_usr_links.link_id WHERE adm_usr_cat_links.cat_id = %s ORDER BY adm_usr_links.link_name ASC", MySQL::SQLValue($colname_links, MySQL::SQLVALUE_NUMBER));

$links = $menu->QueryArray($sql, MYSQLI_ASSOC);

$parents = array();
$child = array();

foreach($links as $row_links){
    if($row_links['link_parent']==0){
        $parents[] = $row_links;
    }else{
        $child[] = $row_links;
    }
}
?>

<!-- BEGIN SIDEBAR -->
<div id="sidebar" class="nav-collapse collapse">
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search" />
        </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul>
        <li class="<?php if($page == "dash"){echo "active";}?>">
            <a href="../../views/dashboard/dashboard.php">
                <i class="icon-home"></i> Dashboard
            </a>
        </li>

        <?php foreach($parents as $parent){ ?>
            <li class="has-sub <?php if($page==$parent['page_id']){echo "active";}?>">
                <a href="javascript:;">
                    <i class="<?php echo $parent['link_image'] ?>"></i>
                    <?php echo $parent['link_name']; ?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <?php foreach($child as $sub){ if($parent['link_id']==$sub['link_parent']){ ?>
                        <li class="<?php if($sub_page_name == $sub['page_id_sub']){echo "active";}?>">
                            <a href="<?php echo $sub['link_url']; ?>"><i class="<?php echo $sub['link_image'] ?>"></i><?php echo $sub['link_name']; ?></a>
                        </li>
                    <?php } } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->