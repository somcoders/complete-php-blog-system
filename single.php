<?php include("inc/init.php"); ?>
<?php

    if(isset($_GET["post_id"])){
        $post_id =  intval($_GET["post_id"]);
        echo $post_id;
    }

?>

                <main class="main">
            <section class="section">
                        <article class="article single clearfix">
                <a href="single.php">
                    <img  src="images/image2.jpg" class="post-image" />
                </a>
                <div class="content">
               
                    <h2>Microsoft Office 365 Is Now Available On Apple’s Mac Store</h2>
                    <p>Last year at WWDC Apple promised to launch Microsoft Office 365. Apple has finally announced on Thursday that Microsoft Office 365 is now available on Mac App Store. Users can now directly download the signature Microsoft apps such as Outlook, Word, PowerPoint, OneNote, and Excel on their MacOS computers.</p>
                
                    <hr>
                    <h4>Posted on 2019-11-01 16:05:41| TECHNOLOGY</h4>
              
                </div>
            </article>
            
                            
                
                
        </section>
            
        <?php include("inc/aside.php"); ?>    
        </main>
<?php include("inc/footer.php"); ?>