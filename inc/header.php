<!doctype html>
<html>
    <head>
        <title>BoggaHore</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="naqshad.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
    
     
    <header class="header clearfix">

        <img class="logo" src="images/logo.png" alt="">
        <nav class="navbar" id="nav">
            <span class="gear right" onclick=showMenu();>&#9776;</span>
            <a href="index.php">Home</a>
            <?php foreach(get_all("categories") as $category){ ?>
                <a href="category.php"><?= capitalize($category->name) ?></a>
            <?php } ?>
                    </nav>
    </header>

                  