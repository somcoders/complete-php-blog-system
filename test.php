<?php include("inc/init.php"); ?>
<?php

$category = array(
    "id"            => 22,
    "name"          => "Abdifatah ",
    "description"   => "Abdilahi",
    "status"        => 2
  );

    // $pairs = array();
    // foreach($category as $k => $v){
    // $pair = $k." = :".$k;
    // $pairs[] = $pair;
    // }
    // echo implode("," ,$pairs) ;
  //echo $columns . $values;



  $data     =   update("categories",$category);
  if($data){
      echo "Inserted";
  }



?>