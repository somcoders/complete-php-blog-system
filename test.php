<?php include("inc/init.php"); ?>
<?php

function insert($table,$data){
  global $db;
  $columns   =  implode(",",array_keys($category));
  $values    =  ":" . implode(",:",array_keys($category));
  
  try{
    $sql = $db->prepare("INSERT INTO $table ($columns)
    VALUES($values)");
    $sql->execute($category);
    return $db->lastInsertId() ? true : false;
  }catch(PDOException $e){
    die("Cilad ayaa jirta " . $e->getMessage());
  }
}

?>