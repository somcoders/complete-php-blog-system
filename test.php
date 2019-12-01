<?php

    //  FILTER INPUT 
    //  ESCAPE OUTPUT

    $qoraal = "<script>alert('hacked');</script>";

    //htmlspecialchars
    //htmlentities


    echo htmlspecialchars($qoraal);



?>