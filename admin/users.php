<?php include("inc/init-admin.php"); ?>
<?php
  $messages = array();
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    csrf_check($_POST["csrf"]);

   $username =  str_replace(" ","",$_POST["username"]);
    $userData = array(
      "fullname"          => $_POST["fullname"],
      "username"          => $username,
      "email"             => $_POST["email"],
      "password"          => password_hash($_POST["password"],PASSWORD_DEFAULT),
      "role"              => $_POST["role"],
    );

    $check_username = get_single("users","username",$username);
    $check_email = get_single("users","email",$_POST["email"]);

    if($_POST["fullname"] == ""){
      $messages[] =  "Fadlan buuxi magaca";
    }else if($_POST["username"] == ""){
        $messages[] =  "Fadlan buuxi username-ka";
    }else if($check_username){
      $messages[] =  "Username-ka horuu u jiray fadlan dooro mid kale";
    }else if($check_email){
      $messages[] =  "Email-ka horuu u jiray fadlan dooro mid kale";
    }else if($_POST["password"] < 6){
      $messages[] =  "Password-ka kama yaraan karo 6 xaraf";
    }else if($_POST["email"] == ""){
        $messages[] =  "Fadlan buuxi-ka";
    }else{
      $sql = insert("users", $userData);
      if($db->lastInsertId()){
        $messages[] =  "user Added successfully";
      }else{
        $messages[] =  "Failed";
      }
    }

   
  }

  if(isset($_GET["user_id"]) && isset($_GET["token"])){
    csrf_check($_GET["token"]);
      $user_id   = intval($_GET["user_id"]);
      $check_user = get_single("users","id",$user_id);
      if($check_user){
        $sql  = delete("users",$user_id);
        if($sql){
          $messages[] = "User Deleted successfully";
        }
      }else{
        $messages[] = "User not found";
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
                <div class="col-md-4">
                     <div class="panel panel-default">
                        <div class="panel panel-heading">   <p>Add User</p></div>
                        <div class="panel panel-body">
                        <?php 
                          $messages  ? messages($messages) : "";
                        ?>
                        <form method="post">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                     <input type="text" name="fullname" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                     <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Username:</label>
                                     <input type="text" name="username" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                     <input type="password" name="password" class="form-control" required>
                                </div>

                                <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                                <div class="form-group">
                                    <label>Role</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="role" >Admin</label>
                                    <label class="radio-inline"><input type="radio" value="0" name="role" checked>Editor</label>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Add User" class="form-control btn-block btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <div class="col-md-8">
                    <div class="panel panel-default">
                    <div class="panel panel-heading">   <p>Categories</p></div>
                        <div class="panel panel-body">
                        <table class="table table-bordered table-hovered">
                            <thead>
                            <tr>
                                <th>FullName</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach(get_all("users") as $user) {?>
                            <tr>
                                <td><?=  escape(ucfirst($user->fullname)) ; ?></td>
                                <td><?=  escape(ucfirst($user->username)) ; ?></td>
                                <td><?=  escape(ucfirst($user->email)) ; ?></td>
                                <td><?=  get_role($user->role); ?></td>
                                <td><a href="edit-user.php?user_id=<?= escape($user->id); ?>">Edit</a></td>
                                <td><a href="users.php?user_id=<?= escape($user->id); ?>&token=<?=  escape($_SESSION["csrf"]); ?>">Delete</a></td>
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
