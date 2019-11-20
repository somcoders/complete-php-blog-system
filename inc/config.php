<?php

    define("DB_HOST","localhost");
    define("DB_NAME","blog");
    define("DB_USER","root");
    define("DB_PASS","");


    try{
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
    }catch(PDOException $e){
        exit("Cilad: " . $e->getMessage());
    }

   
    // $posts   =   $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_OBJ);


    // foreach($posts as $post){
    //     echo "<br />";
    //     echo $post->title; //FETCH_OBJ
    // }
       
    // echo "<pre>";
    //var_dump($categories);




?>