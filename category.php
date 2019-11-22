<?php include("inc/init.php"); ?>
<?php 
    if(isset($_GET["cat_id"])){
        $cat_id =  intval($_GET["cat_id"]);
    }

    $category = get_single("categories","id",$cat_id);
    $posts      = get_all_where("posts","cat_id",$category->id);
   // echo $category->name;

?>

                  <div class="cat-head">
                        <p>Browsing category</p> 
            <h2><b style="color:red"><?=  uppercase($category->name); ?></b></h2>
                     </div>
        <main class="main">
            <section class="section">
            <?php foreach($posts as $post){ ?>
                        <article class="article clearfix">
                <a href="single.php">
                    <img src="images/image2.jpg" class="post-image" />
                </a>
                <div class="content">
                <a href="single.php?post_id=<?= $post->id ?>">
                    <h2><?php echo capitalize($post->title); ?></h2>
                    <p><?php echo limit_text($post->body,100); ?>[...]</p>
                    <hr>
                    <h4>Posted on <?php echo $post->created_at; ?>| <?= $category->name ?></h4>
                </a>
                </div>
            </article>

            <?php } ?>

                            
             
                
                
        </section>
             
        <aside class="aside">
            <div class="inner">
            <h2><b style="color:red"><?= uppercase($category->name); ?></b> POSTS</h2>
            <?php foreach($posts as $post){ ?>
            <a href="single.php?post_id=<?= $post->id ?>"><?php echo capitalize($post->title); ?>&nbsp;<b style="color:red">More..</b>  </a>
            <?php } ?>
            </div>
        </aside>
                
        </main>

<?php include("inc/footer.php"); ?>