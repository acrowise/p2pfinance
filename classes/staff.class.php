<?php

/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 15/01/2018
 * Time: 05:58 AM
 */
require_once('mysql.class.php');
class Staff extends MySQL
{
    function __construct(){
        session_start();
        parent::__construct();
    }

    function addStaff(){


    }

}