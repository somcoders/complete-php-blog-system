<?php include("inc/init.php"); ?>
<?php 
    if(isset($_GET["cat_id"])){
        $cat_id =  intval($_GET["cat_id"]);
    }else{
        balfis("index.php");
    }

    $category = get_single("categories","id",$cat_id);

    if($category){
        $posts      = get_all_where("posts","cat_id",$category->id);
    }else{
        $posts = false;
    }


?>

                  <div class="cat-head">
                        <p>Browsing category</p> 
            <?php if($category){ ?>
                <h2><b style="color:red"><?=  uppercase($category->name); ?></b></h2>
            <?php }else{
                echo "<h4>QAYBTA AAD BAASHAYSID MA JIRTO</h4>";
            } ?>
                     </div>
        <main class="main">
            <section class="section">
            <?php if(!$posts){
                echo "<h4>QAYBTAN WAX POSTYO AH LAGAMA SOO GELIN</h4>";
            }else{
                foreach($posts as $post){ ?>
                        <article class="article clearfix">
                <a href="single.php">
                    <img src="images/<?= $post->image ? $post->image : "placeholder.png"; ?>" class="post-image" />
                </a>
                <div class="content">
                <a href="single.php?post_id=<?= $post->id ?>">
                    <h2><?php echo capitalize($post->title); ?></h2>
                    <p><?php echo limit_text($post->body,100); ?>[...]</p>
                    <hr>
                    <h4>Posted on <?php echo clean_date($post->created_at); ?>| <?= $category->name ?></h4>
                </a>
                </div>
            </article>
            <?php } // end of foreach ?>
            <?php }  // end of if?>

                            
             
                
                
        </section>
       <?php if($category){ ?>      
        <aside class="aside">
            <div class="inner">
            <h2><b style="color:red"><?= uppercase($category->name); ?></b> POSTS</h2>
            <?php foreach($posts as $post){ ?>
            <a href="single.php?post_id=<?= $post->id ?>"><?php echo capitalize($post->title); ?>&nbsp;<b style="color:red">More..</b>  </a>
            <?php } ?>
            </div>
        </aside>
            <?php } ?>           
        </main>

<?php include("inc/footer.php"); ?>