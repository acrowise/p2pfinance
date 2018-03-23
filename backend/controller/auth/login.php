<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/users.class.php');

$newUser = new UserLogin;

if(!isset($_POST['username']) && !isset($_POST['password'])){

    header('Location:../../index.php');

}

if(empty($_POST)=== false){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)=== true || empty($password)=== true){
        //Check if credential post was not empty
        $emptyUserPass = "Enter Username or Password";
        $newUser->getError($emptyUserPass);


    }elseif($newUser->user_exists($username)=== false){
        //Check if username exists
        $noUser = "Username Doesnot Exist";
        $newUser->getError($noUser);


    }elseif($newUser->blacklisted($username,$password)=== true){
        //Check if user account has been blacklisted
        $notAcive = "Your Account Has Been BLACKLISTED. Contact the Administrator for Further Information";
        $newUser->getError($notAcive);


    }elseif($newUser->user_active($username)=== false){
        //Check of user account is active
        $notAcive = "Your Account is INACTIVE. Contact the Administrator for Further Information.";
        $newUser->getError($notAcive);


    }else{
      //Login attempt check
      $login = $newUser->login($username,$password);

        if(strlen($password )> 30){
            //Check password length conformity
            $passlen = "Password too long";
            $newUser->getError($passlen);
        }

        if($login=== false){
            //If login attempt fails return an error message
            $combination = "This Username and Password combination do not match";
            $newUser->getError($combination);

        }else{
            //fetch user record
            $Login_query = "SELECT adm_usr_users.user_id,adm_usr_users.username,adm_usr_users.first_name,adm_usr_users.last_name,adm_usr_users.email,adm_usr_users.user_cat,adm_usr_users.status,cat_name FROM adm_usr_users
                            LEFT JOIN adm_usr_cat ON adm_usr_users.user_cat = adm_usr_cat.cat_id
                            WHERE adm_usr_users.user_id = $login";

            $sess_row = $newUser->QuerySingleRowArray($Login_query,MYSQLI_ASSOC);

            //set user sessions
            $_SESSION['p2pAdm_User'] = $sess_row;

            //Log login action
            $loginLog = new MySQL();
            $ipadd =  $_SERVER['REMOTE_ADDR'];
            $mysessid = session_id();
            $datetime = date('Y-m-d h:i:s');
            $logID = $sess_row['user_id'];

            $valuesArray['user_id'] = MySQL::SQLValue($logID);
            $valuesArray['login_date'] = MySQL::SQLValue($datetime);
            $valuesArray['login_ip'] = MySQL::SQLValue($ipadd);
            $valuesArray['usr_session_id'] = MySQL::SQLValue($mysessid);

            $tableName = 'adm_usr_user_login_log';

            $sql = MySQL::BuildSQLInsert($tableName,$valuesArray);
            $result = $loginLog->Query($sql);
            $_SESSION['login_log_id'] = $loginLog->GetLastInsertID();

            echo "ok";exit;
        }
    }

    //Display Error(s) if any
    echo $newUser->DisplayError();

}
?>