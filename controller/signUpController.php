<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 04/01/2018
 * Time: 10:39 PM
 */
require_once('../classes/auth.class.php');
require_once('../classes/notifications.class.php');
$notice = new Notification();
$newUser = new Auth();

if(!empty($_POST) && $_POST['do'] == "signup"){

    $check = $newUser->signUp($_POST);
    if($check == 'exist'){
        echo 1;exit;
    }elseif($check == 'error'){
        echo 2;exit;
    }elseif($check == "ok"){
        $email = $_POST['email'];
        $name = $_POST['first_name']." ".$_POST['last_name'];
        $message ='Hello '. $name.' ,<br/> an account has been created on the P2P Finance with your email address .<br/> Please if your email address is '.$email.' and you created this account we wish to inform you that your account will be active after 24hours.<br/><p>Sincerely Admin <br/> P2P Finance</p>';
        $subject = 'New Account Creation';
        $notice->sendEmail($_POST['email'],$message,$subject);
        echo 3;exit;
    }


}
//}


?>