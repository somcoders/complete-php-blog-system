<?php include("inc/init.php"); ?>
<?php

    if(isset($_GET["post_id"])){
        $post_id =  intval($_GET["post_id"]);
    }else{
        balfis("index.php");
    }

    $post = get_single("posts","id",$post_id);
    if($post){
        $category = get_single("categories","id",$post->cat_id);
    }else{
        balfis("index.php");
    }

?>

                <main class="main">
            <section class="section">

                        <article class="article single clearfix">
                <a href="single.php?post_id=<?= $post->id; ?>">
                    <img  src="images/<?= $post->image ? $post->image : "placeholder.png"; ?>" class="post-image" />
                </a>
                <div class="content">
               
                    <h2><?= escape($post->title); ?></h2>
                    <p><?= escape($post->body); ?></p>
                
                    <hr>
                    <h4>Posted on <?= clean_date($post->created_at); ?>| <?= $category->name; ?></h4>
              
                </div>
            </article>
            
                            
                
                
        </section>
            
        <?php include("inc/aside.php"); ?>    
        </main>
<?php include("inc/footer.php"); ?>