<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 15/01/2018
 * Time: 05:58 AM
 */
require_once('../classes/staff.class.php');
$object  = new Staff();
if(isset($_POST['firstname']) ){
    if(isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['contact_number']) && isset($_POST['email']) && isset($_POST['region']) && isset($_POST['nkfirstname']) && isset($_POST['nklastname']) && isset($_POST['title']) && isset($_POST['gender']) && isset($_POST['address']) && !isset($_POST['id']) && empty($_POST['id']))
    {

        $valuesArray['firstname'] = MySQL::SQLValue($_POST['firstname']);
        $valuesArray['surname'] = MySQL::SQLValue($_POST['surname']);
        $valuesArray['region_id'] = MySQL::SQLValue($_POST['region']);
        $valuesArray['birth_place'] = MySQL::SQLValue($_POST['branch']);
        $valuesArray['department'] = MySQL::SQLValue($_POST['department']);
        $valuesArray['title'] = MySQL::SQLValue($_POST['title']);
        $valuesArray['gender'] = MySQL::SQLValue($_POST['gender']);
        $valuesArray['nationality_id'] = MySQL::SQLValue($_POST['nationality']);
        $valuesArray['marital_status'] = MySQL::SQLValue($_POST['marital_status']);
        $valuesArray['nk_surname'] = MySQL::SQLValue($_POST['nklastname']);
        $valuesArray['mobile'] = MySQL::SQLValue($_POST['contact_number']);
        $valuesArray['res_address'] = MySQL::SQLValue($_POST['address']);
        $valuesArray['staff_number'] = MySQL::SQLValue($_POST['employeeid']);
        $valuesArray['staff_cat_id'] = MySQL::SQLValue($_POST['staff_cat_id']);
        $valuesArray['personal_email'] = MySQL::SQLValue($_POST['email']);
        $valuesArray['nk_firstname'] = MySQL::SQLValue($_POST['nkfirstname']);
        $valuesArray['position'] = MySQL::SQLValue($_POST['position']);
        $valuesArray['nk_email'] = MySQL::SQLValue($_POST['nk_email']);
        $valuesArray['nk_mobile'] = MySQL::SQLValue($_POST['nk_mobile']);
        if(isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])){
            $valuesArray['dob'] = MySQL::SQLValue($_POST['year'].'-'.$_POST['month'].'-'.$_POST['day']);
        }
        if(isset($_POST['r_day']) && isset($_POST['r_month']) && isset($_POST['r_year'])){
            $valuesArray['nk_dob'] = MySQL::SQLValue($_POST['r_year'].'-'.$_POST['r_month'].'-'.$_POST['r_day']);
        }
        $valuesArray['nk_address'] = MySQL::SQLValue($_POST['nk_address']);
        $valuesArray['nk_relation'] = MySQL::SQLValue($_POST['relationship']);
        if(isset($_POST['ssnit_number'])){
            $valuesArray['ssnit_num'] = MySQL::SQLValue($_POST['ssnit_number']);
        }
        if(isset($_POST['office_number'])){
            $valuesArray['office_num'] = MySQL::SQLValue($_POST['office_number']);
        }if(isset($_POST['othername'])){
        $valuesArray['othername'] = MySQL::SQLValue($_POST['othername']);
    }
        if(isset($_POST['corporate_email'])){
            $valuesArray['corporate_email'] = MySQL::SQLValue($_POST['corporate_email']);
        }if(isset($_POST['picture'])){
        $valuesArray['picture'] = MySQL::SQLValue($_POST['picture']);
    }if(isset($_POST['supervisor_id'])){
        $valuesArray['supervisor_id'] = MySQL::SQLValue($_POST['supervisor_id']);
    }if(isset($_POST['mmda_id'])){
        $valuesArray['mmda_id'] = MySQL::SQLValue($_POST['mmda_id']);
    }
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['HMIS_user']['sid']);
        $valuesArray['status'] = MySQL::SQLValue($_POST['status']);
        $table = "staff";
        $sql = MySQL::BuildSQLInsert($table,$valuesArray);
        echo $sql;
        $check= $object->Query($sql);
        if($check){
            echo "success";exit;
        }
        else{
            echo "error";exit;
        }
    }
}