<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/Password.php');
session_start();

$insert = new MYSQL();
$check = new MySQL();

if(isset($_POST['fullname'])){

    if(!empty($_POST['fullname'])) {

        $fullname = $_POST['fullname'];

        $name_sid = explode(':', $fullname);

        $sid = $name_sid[0];
        $name = $name_sid[1];

        $splitName = explode('+',$name);
        $firstname = $name[0];
        $lastname = $name[1];

        $getStaffEmail = new MySQL();
        $getStaffEmail->Query("SELECT email FROM staff_pdetail WHERE empID = $sid");
        $staffRow = $getStaffEmail->Row();
        $login = trim($staffRow->email);


        $upass = new Password(array(
            'minLength'      => 6,
            'maxLength'      => 15,
            'minNumbers'     => 1,
            'minLetters'     => 4,
            'minLowerCase'   => 0,
            'minUpperCase'   => 0,
            'minSymbols'     => 1,
            'maxSymbols'     => 2,
            'allowedSymbols' => array('@','#','$','%','&','^','*','?'),
        ));

        $genPass = trim($upass->generatePassword());
        $pwd = sha1($genPass);

        $token = sha1(trim($login.$genPass));

        $mailPass = new Password();
        $confirmMailed = $mailPass->newUserPassword($login,$genPass);


        if($confirmMailed=="success"){

        $usercat = $_POST['category'];
        $status = "active";

        $check->Query("SELECT * FROM adm_usr_users WHERE sid = $sid");
        $check_result = $check->RowCount();

        if($check_result > 0){

            echo "exists";exit;

        }else{


            $valuesArray['username'] = MySQL::SQLValue($login);
            $valuesArray['email'] = MySQL::SQLValue($login);
            $valuesArray['password'] = MySQL::SQLValue($pwd);
            $valuesArray['user_cat'] = MySQL::SQLValue($usercat);
            $valuesArray['sid'] = MySQL::SQLValue($sid);
            $valuesArray['first_name'] = MySQL::SQLValue($firstname);
            $valuesArray['last_name'] = MySQL::SQLValue($lastname);
            $valuesArray['status'] = MySQL::SQLValue($status);
            $valuesArray['created_by'] = $_SESSION['p2pAdm_User']['user_id'];

            $sql = MySQL::BuildSQLInsert("adm_usr_users", $valuesArray);
            $result = $insert->Query($sql);

            if($result){

                    echo "ok";exit;

            }else{

                echo "fail";exit;

                }

            }

        }

    }else{

        echo "incomplete";exit;

    }


}
?>