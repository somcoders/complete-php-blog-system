<?php
    require("inc/init-login.php");

    if(isset($_GET["token"])){
        csrf_check($_GET["token"]);
    }else{
        balfis("login.php");
    }


    $_SESSION = array();

    session_destroy();

    // redirect
    balfis("login.php");
    exit;


?>