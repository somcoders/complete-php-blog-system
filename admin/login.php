<?php include("inc/init-login.php"); 
    echo $_SESSION['csrf'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Add custom CSS here -->
    <link href="assets/css/sidebar.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-glyphicons.css" rel="stylesheet" />
      <style>
          .form-control,
          .table,
          .panel,
          .panel-body,
          .panel-heading,
          {
            border-radius:0 !important;
          }
      </style>
  </head>

  <body>
    <!-- Sidebar -->
    <div id="wrapper">
    <div class="container">
    <div class="col-md-4 col-md-offset-4" style="margin-top:100px">
                     <div class="panel panel-default">
                        <div class="panel panel-heading">   <p>Login</p></div>
                        <div class="panel panel-body">
                        <?php 
                         // $messages  ? messages($messages) : "";
                        ?>
                        <form method="post">
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
                                    <input type="submit" value="Login" class="form-control btn-block btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    </div>
</body>
</html>