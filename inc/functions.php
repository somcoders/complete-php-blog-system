<?php
    require("config.php");

    function get_all($table){
        global $db;
        $query = $db->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }


    
    // foreach(get_all("categories") as $post){
    //     echo "<br />";
    //     echo $post->name; //FETCH_OBJ
    // }
?>