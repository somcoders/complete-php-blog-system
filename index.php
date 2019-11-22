<?php include("inc/init.php"); ?>

        <main class="main">
            <section class="section">
            <?php foreach(get_all("posts","DESC") as $post){  ?>
            <article class="article clearfix">
                <a href="single.php?post_id=<?= $post->id ?>">
                    <img src="images/<?= $post->image ? $post->image : "placeholder.png"; ?>" class="post-image" />
                </a>
                <div class="content">
                <a href="single.php?post_id=<?= $post->id ?>">
                    <h2><?php echo capitalize($post->title); ?></h2>
                    <p><?php echo limit_text($post->body,100); ?>[...]</p>
                    <hr>
                    <?php $category = get_single("categories","id",$post->cat_id); ?>
                    <h4>Posted on <?php echo $post->created_at; ?>| <?=  uppercase($category->name); ?></h4>
                </a>
                </div>
            </article>
            <?php } ?>
                         
                
                
            </section>
            
         <?php include("inc/aside.php"); ?>       
        </main>
       
<?php include("inc/footer.php"); ?>
      
      