<?php include("inc/init.php"); ?>
<?php

$category = array(
  "id"          => 1,
  "name"          => "name",
  "description"   => "desc",
  "status"       => "visible",
);


function delete($table,$id){
    global $db;

    try{
      $sql = $db->prepare("DELETE FROM  $table WHERE id    = :id");
      $sql->execute($id);
      return $sql ? true : false;

    }catch(PDOException $e){
          die($e->getMessage());
    }
  }

?>