<?php include("inc/init-admin.php"); ?>
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
                        <table class="table table-bordered table-hovered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Posted</th>
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
                                <td><a href="post.php?post_id=<?= escape($post->id); ?>">Update</a></td>
                                <td><a href="post.php?post_id=<?= escape($post->id); ?>&action=del">Delete</a></td>
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
