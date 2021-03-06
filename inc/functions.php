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

    function insert($table,$data){
        global $db;
        $columns   =  implode(",",array_keys($data));
        $values    =  ":" . implode(",:",array_keys($data));
        
        try{
          $sql = $db->prepare("INSERT INTO $table ($columns)
          VALUES($values)");
          $sql->execute($data);
          return $db->lastInsertId() ? true : false;
        }catch(PDOException $e){
          die("Cilad ayaa jirta " . $e->getMessage());
        }
      }
    
    function update($table,$data){
        global $db;
    
        //waxaan samaystay array madhan.
        $pairs = array();
        foreach($data as $k => $v){
            $pairs[] = $k . " = :" . $k;
        }
        $keyVal = implode(",",$pairs);
    
        try{
          $sql = $db->prepare("UPDATE  $table SET 
          $keyVal
          WHERE id    = :id");

          $sql->execute($data);
          return $sql ? true : false;
    
        }catch(PDOException $e){
              die($e->getMessage());
        }
      }
    

      function delete($table,$id){
        global $db;
    
        try{
          $sql = $db->prepare("DELETE FROM  $table WHERE id    = :id");
          $sql->execute([":id" => $id]);
          return $sql ? true : false;
    
        }catch(PDOException $e){
              die($e->getMessage());
        }
      }


    function get_status($status){ // expects 0 or 1
        switch($status){
            case 0 : return "<b class='text-danger'>Draft</b>"; break;
            case 1 : return "<b class='text-success'>Published</b>"; break;
            default : return "Unkown";
        }
    }

    
    function get_role($status){ // expects 0 or 1
        switch($status){
            case 0 : return "<b class='text-info'>Editor</b>"; break;
            case 1 : return "<b class='text-success'>Admin</b>"; break;
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
    
    function csrf_check($input){
        if (!hash_equals($_SESSION['csrf'], $input)){
            balfis("400.php");
        }
    }

    function messages($messages){
        echo "<ul>";
        foreach($messages as $m){
            echo "<li class='text-info'><b> $m </b></li>";
        } 
        echo "</ul>";
    }
?>