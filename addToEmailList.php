<?php
    require_once "./emailList.php";
    require_once "./dataAccess.php"; 

    if(isset($_REQUEST["name"]) && isset($_REQUEST["email"]) && isset($_REQUEST["wantUpdate"]) && isset($_REQUEST["happy"]))
    {
        $dataAccess = DataAccess::getInstance();
        $newEmail = new EmailList;
        $newEmail->name=$_REQUEST["name"];
        $newEmail->email=$_REQUEST["email"];
        $newEmail->wantUpdate=$_REQUEST["wantUpdate"];
        $newEmail->happy = $_REQUEST["happy"];
        
        $dataAccess->addToEmailList($newEmail);
    }
?>
