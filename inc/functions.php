<?php
    require("config.php");

    function get_all($table,$order = "ASC"){
        global $db;
        $query = $db->query("SELECT * FROM $table ORDER BY created_at $order")->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }

    function get_single($table,$column,$value){
        global $db;
        $query = $db->query("SELECT * FROM $table WHERE $column =  $value")->fetch(PDO::FETCH_OBJ);
        return $query;
    }


    function capitalize($str){
        return ucfirst($str);
    }

    function uppercase($str){
        return strtoupper($str);
    }

    function limit_text($str,$end){
        return substr($str,0,$end);
    }
    

    
    // foreach(get_all("categories") as $post){
    //     echo "<br />";
    //     echo $post->name; //FETCH_OBJ
    // }
?>