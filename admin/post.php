<?php include("inc/init-admin.php"); ?>

<?php

$messages = [];
if(isset($_GET["post_id"]) && isset($_GET["token"])){
  csrf_check($_GET["token"]);
    $post_id   = intval($_GET["post_id"]);
    $sql  = delete("posts",$post_id);
    if($sql){
      $messages[] = "Post Deleted successfully";
    }

}



?>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="#">Posts</a></li>
              </ul>
            </div> <!--  end of breadcrumbs -->
            
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel panel-heading">   
                      <p>Posts <a class="pull-right" href="new-post.php">New Post</a></p></div>
                        <div class="panel panel-body">
                        <?php 
                          $messages  ? messages($messages) : "";
                        ?>
                        <table class="table table-bordered table-hovered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Posted</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            foreach(get_all("posts") as $post) {?>
                            <tr>
                                <td><?=  escape($post->title); ?></td>
                                <?php $category = get_single("categories","id",$post->cat_id);   ?>
                                <td><?=  capitalize(($category->name)); ?></td>
                                <td><?=  clean_date($post->created_at); ?></td>
                                <td><?=  get_status($post->status); ?></td>
                                <td><a href="edit-post.php?post_id=<?= escape($post->id); ?>">Edit</a></td>
                                <td><a href="post.php?post_id=<?= escape($post->id); ?>&token=<?= escape($_SESSION["csrf"]);  ?>">Delete</a></td>
                            </tr>
                            <?php } ?>
                 
                            </tbody>
                        </table>
                        </div>
                </div>
                </div>
             

             </div>
            </div> <!--  end of content -->
            

          </div>
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>
