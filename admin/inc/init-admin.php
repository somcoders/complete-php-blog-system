<?php

    require("session.php");
    require("../inc/functions.php");
    include("inc/nav.php");

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
        balfis("login.php");
        exit;
    }

?>