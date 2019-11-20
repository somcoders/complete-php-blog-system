<?php include("inc/init.php"); ?>

        <main class="main">
            <section class="section">
            <?php foreach(get_all("posts") as $post){  ?>
            <article class="article clearfix">
                <a href="single.php">
                    <img src="images/image2.jpg" class="post-image" />
                </a>
                <div class="content">
                <a href="single.php">
                    <h2><?php echo $post->title; ?></h2>
                    <p><?php echo $post->body; ?></p>
                    <hr>
                    <h4>Posted on <?php echo $post->created_at; ?>| TECHNOLOGY</h4>
                </a>
                </div>
            </article>
            <?php } ?>
                         
                
                
            </section>
            
         <?php include("inc/aside.php"); ?>       
        </main>
       
<?php include("inc/footer.php"); ?>
      
      