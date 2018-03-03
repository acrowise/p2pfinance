<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 15/01/2018
 * Time: 05:56 AM
 */
if(isset($_FILES["file"]["type"]))
{
    $path_temp= '';
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    if(!file_exists('../upload/'.$_POST['name'].'')){
        mkdir('../upload/'.$_POST['name'].'',0777,true);
        $path_temp ='../upload/'.$_POST['name'].'/';
    }
    else{
        $path_temp ='../upload/'.$_POST['name'].'/';
    }
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 3000000)//Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
            $error1 = "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
            //header('Location:create_user.php?error1='.base64_encode($error1));
            echo "error1";
        }
        else
        {
            if (file_exists($path_temp . $_FILES["file"]["name"])) {

                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = $path_temp."1".$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                echo $targetPath;
            }
            else
            {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = $path_temp.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                echo $targetPath;
            }
        }
    }
    else
    {
        $error3 = "<span id='invalid'>***Invalid file Size or Type***<span>";
        echo "error3";
    }
}
else
{
    echo "error4";
}