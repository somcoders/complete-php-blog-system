<?php include("inc/init-admin.php"); ?>
<?php

$messages = array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  csrf_check($_POST["csrf"]);

    
  $target_dir = "../images/";
  $file_tmp       = $_FILES["image"]["tmp_name"];
  $imageFileType = strtolower(pathinfo($file_tmp,PATHINFO_EXTENSION));
  $ramdom_name    = rand();
  $extention      = ".jpg";
 

  
  $postData = array(
    "title"          => $_POST["title"],
    "body"           => $_POST["body"],
    "status"         => $_POST["status"],
    "cat_id"         => $_POST["category"],
    "image"          => $ramdom_name.".jpg",
    "user_id"        => 1
  );
  

  if($_POST["title"] == "" || $_POST["body"] == ""){
    $messages[] =  "Fadlan buuxi Ciwaanka iyo faahfaahinta";
  }else{
    $sql = insert("posts", $postData);
    if($sql){
      move_uploaded_file($file_tmp, $target_dir.$ramdom_name.$extention);
      $messages[] =  "Post Added successfully";
    }else{
      $messages[] =  "Failed";
    }
  }

 
}







?>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="#">New post</a></li>
              </ul>
            </div> <!--  end of breadcrumbs -->
            
            <div class="col-md-10">
                <div class="col-md-8">
                        <div class="panel panel-body">
                        <?php 
                          $messages  ? messages($messages) : "";
                        ?>
                      <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="usr">Title</label>
                                     <input type="text" name="title" class="form-control" id="usr">
                                </div>

                                <div class="form-group">
                                    <label for="usr">Desc:</label>
                                     <textarea name="body" rows="10" class="form-control" ></textarea>
                                </div>

                          

                        </div>
                    </div>

                   <div class="col-md-4">
                        <div class="panel panel-body">
                                <div class="form-group">
                                    <label for="sel1">Select Category:</label>
                                    <select class="form-control" name="category">
                                    <?php foreach(get_all("categories") as $category){ ?>
                                      <option value=<?= $category->id ?>><?= $category->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file"  name="image" class="form-control" required>
                                </div>
                                <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">     
                                <div class="form-group">
                                    <label>Visible</label>
                                    <label class="radio-inline"><input type="radio"  value="1" name="status" checked>Yes</label>
                                    <label class="radio-inline"><input type="radio" value="0" name="status">No</label>
                                </div>
                            </div>
                                
                                <div class="form-group">
                                    <input type="submit" value="Add Post" class="form-control btn-block btn-primary">
                                </div>
                            </form>
                        </div>

                 
             
               

             </div>
            </div> <!--  end of content -->
            

          </div>
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>
