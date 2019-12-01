<?php
    require("config.php");

    function get_all($table,$order = "ASC"){
        global $db;

        try{
            $query      = $db->query("SELECT * FROM $table ORDER BY created_at $order");
            $query      =$query->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
           die("Cilad " . $e->getMessage()); 
        }

        return $query;
    }

    function get_single($table,$column,$value){
        global $db;
        try{
        $query      = $db->prepare("SELECT * FROM $table WHERE $column = ?");
        $query->execute([$value]);
        }catch(PDOException $e){
        die("Cilad " . $e->getMessage()); 
    }
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    
    
    function get_all_where($table,$column,$value){
        global $db;
        try{
        $query   = $db->prepare("SELECT * FROM $table WHERE $column =  $value");
        $query->execute([$value]);
        }catch(PDOException $e){
            die("Cilad " . $e->getMessage()); 
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function count_rows($table,$where = null){
        global $db;
        try{
            if($where){
                $query   = $db->query("SELECT count(*) FROM $table WHERE $where")->fetchColumn();
            }else{
                $query   = $db->query("SELECT count(*) FROM $table")->fetchColumn();
            }
        }catch(PDOException $e){
            die("Cilad " . $e->getMessage()); 
        }
        return $query;
    }

    function get_status($status){ // expects 0 or 1
        switch($status){
            case 0 : return "<b class='text-danger'>Draft</b>"; break;
            case 1 : return "<b class='text-success'>Published</b>"; break;
            default : return "Unkown";
        }

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

    function escape($string){
        return htmlspecialchars($string);
    }
    

    
    // foreach(get_all("categories") as $post){
    //     echo "<br />";
    //     echo $post->name; //FETCH_OBJ
    // }
?>