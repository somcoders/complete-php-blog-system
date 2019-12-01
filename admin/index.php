   <?php include("inc/init-admin.php"); ?>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
              </ul>
            </div> <!--  end of breadcrumbs -->
            
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <h4><?= count_rows("posts"); ?></h4></div>
                                        <div>All Posts</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <h4><?= count_rows("categories"); ?></h4>
                                        </div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-university fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <h4><?= count_rows("posts"," status = 1"); ?></h4>    
                                        </div>
                                        <div>Published Posts</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-play-circle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <h4><?= count_rows("posts"," status = 0"); ?></h4>
                                        </div>
                                        <div>Unpublished Posts</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
         <div class="panel panel-default">
                    <div class="panel panel-heading">   <p>Posts</p></div>
                        <div class="panel panel-body">
                        <table class="table table-bordered table-hovered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Created</th>
                                
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
                                <td>Update</td>
                                <td>Delete</td>
                            </tr>
                            <?php } ?>
                 
                            </tbody>
                        </table>
                        </div>
                </div>
                </div>
             

<?php include("inc/footer.php"); ?>
