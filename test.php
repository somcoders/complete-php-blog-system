<?php include("inc/init.php"); ?>
<?php

$category = array(
  "id"          => 1,
  "name"          => "name",
  "description"   => "desc",
  "status"       => "visible",
);


function update($table,$data){
    global $db;

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

?>