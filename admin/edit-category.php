<?php include("inc/init-admin.php"); ?>
<?php

    $messages = array();
  if(isset($_GET["cat_id"])){
    $cat_id   = intval($_GET["cat_id"]);
    $cat      = get_single("categories","id",$cat_id);

            if(!$cat){
            balfis("category.php?error=category");
            }

        }else{
            balfis("category.php?error=yes");
        }


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $categoryData = array(
        "id"          => $cat->id,
      "name"          => $_POST["name"],
      "description"   => $_POST["desc"],
      "status"       => $_POST["visible"],
    );

    if($_POST["name"] == "" || $_POST["desc"] == ""){
      $messages[] =  "Fadlan buuxi magaca iyo faahfaahinta";
    }else{
      $data =  update("categories",$categoryData);

      if($data){
        $messages[] = "Category Updated Successfully";
      }
    //balfis("category.php?action=update");
  }
}


?>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="#">Categories</a></li>
              </ul>
            </div> <!--  end of breadcrumbs -->
            
            <div class="col-md-12">
                <div class="col-md-8">
                     <div class="panel panel-default">
                        <div class="panel panel-heading">   <p>Add Category</p></div>
                        <div class="panel panel-body">
                        <?php 
                        if($messages){
                          echo "<ul>";
                          foreach($messages as $m){
                            echo "<li class='text-info'><b> $m </b></li>";
                          } 
                          echo "</ul>";
                        }
                        ?>
                        <form method="post">
                                <div class="form-group">
                                    <label for="usr">Category Name:</label>
                                     <input type="text" name="name" class="form-control" value=<?= $cat ? $cat->name : ""  ?> required>
                                </div>

                                <div class="form-group">
                                    <label for="usr">Desc:</label>
                                     <textarea name="desc" class="form-control" ><?= $cat ? $cat->description : ""  ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Visible</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="visible" 
                                    <?= $cat->status == 1 ? "checked" : ""  ?>>Yes</label>
                                    <label class="radio-inline"><input type="radio" value="0" name="visible"
                                    <?= $cat->status == 0 ? "checked" : ""  ?>>No</label>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Add Category" class="form-control btn-block btn-primary">
                                </div>
                            </form>
                        </div>
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
