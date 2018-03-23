<?php
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 3/20/2018
 * Time: 8:56 AM
 */
if(!isset($_SESSION)){session_start();}

require_once('../../classes/mysql.class.php');

$security = new MySQL();
$security->checkLogin();

$user_fullname = $_SESSION['p2pAdm_User']['first_name'].' '.$_SESSION['p2pAdm_User']['last_name'];
?>
<!-- BEGIN HEADER -->
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="" alt="P2P" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<div class="top-nav">
					<!-- BEGIN QUICK SEARCH FORM -->
					<form class="navbar-search hidden-phone">
						<div class="search-input-icon">
							<input type="text" class="search-query dropdown-toggle" id="quick_search" placeholder="Search" data-toggle="dropdown" />
							<i class="icon-search"></i>
							<!-- BEGIN QUICK SEARCH RESULT PREVIEW -->
<!--							<ul class="dropdown-menu extended">-->
<!--								<li>-->
<!--									<span class="arrow"></span>-->
<!--									<p>Found 23 results</p>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-success"><i class="icon-user"></i></span>-->
<!--									Nick Kim, Technical Mana...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-info"><i class="icon-money"></i></span>-->
<!--									Anual Report,Dec 20...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-warning"><i class="icon-comment"></i></span>-->
<!--									Re: Nick Dalton, Sep 11:...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-important"><i class="icon-bullhorn"></i></span>-->
<!--									Office Setup, Mar 12...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-info"><i class="icon-envelope"></i></span>-->
<!--									Re: Order Status, Jan 12...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									<span class="label label-info"><i class="icon-paper-clip"></i></span>-->
<!--									project_2011.docx, Feb 12...<i class="icon icon-arrow-right"></i>-->
<!--									</a>-->
<!--								</li>-->
<!--								<li>-->
<!--									<a href="#">-->
<!--									See all results...-->
<!--									</a>-->
<!--								</li>-->
<!--							</ul>-->
							<!-- END QUICK SEARCH RESULT PREVIEW -->
						</div>
					</form>
					<!-- END QUICK SEARCH FORM -->
					<!-- BEGIN TOP NAVIGATION MENU -->
					<ul class="nav pull-right" id="top_menu">

						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> <?php echo $user_fullname;?></a></li>
                                <li class="divider"></li>
								<li><a href="#"><i class="icon-key"></i> Change Password</a></li>
								<li class="divider"></li>
								<li><a href="../../controller/auth/logout.php"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->