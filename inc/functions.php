<?php
    require("config.php");

    function get_all($table,$order = "ASC"){
        global $db;
        $query      = $db->query("SELECT * FROM $table ORDER BY created_at $order");
        $query      =$query->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }

    function get_single($table,$column,$value){
        global $db;
        $query      = $db->prepare("SELECT * FROM $table WHERE $column = ?");
        $query->execute([$value]);
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    
    function get_all_where($table,$column,$value){
        global $db;
        $query   = $db->prepare("SELECT * FROM $table WHERE $column =  $value");
        $query->execute([$value]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //waxay kuu geyneysaa bog kale
    function balfis($location){
        header("location:$location");
    }

    function clean_date($date){
        return date("j F Y",strtotime($date));
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