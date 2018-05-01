<?php
// Start the session
session_start();
$_SESSION["url"]=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$filename=basename($_SESSION["url"]);
$_SESSION["Project_ID"]=ltrim(strstr($_SESSION["url"], '?'), '?');
$id= $_SESSION["Project_ID"];
include 'connect.php';
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE project_id=$id");
while ($fetch = mysqli_fetch_assoc($query)){
    $title = nl2br($fetch['name']);
    $desc = nl2br($fetch['summary']);
}
?>
<!DOCTYPE html>

<html lang="en">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title." - Tree"?></title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="css/agency.min.css" rel="stylesheet">
        <link href="css/tree.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">Writr</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <?php
    echo "<a class=\"nav-link js-scroll-trigger\" href=\"project.php?$id#description\">Description</a>"
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
    echo "<a class=\"nav-link js-scroll-trigger\" href=\"project.php?$id#central\">Central Branch</a>"
                            ?></li>
                        <li class="nav-item">
                            <?php
    echo "<a class=\"nav-link js-scroll-trigger\" href=\"project.php?$id#contact\">Settings</a>"
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
    echo "<a class=\"nav-link js-scroll-trigger active\" href=\"tree.php?$id\">Branch Tree</a>"
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"><?php echo $title   ?></div>
                    <div class="intro-heading text-uppercase"></div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#description">Read More</a>
                </div>
            </div>
        </header>

        <!-- Services -->
        <section id="description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Project Tree</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="tree">
                            <?php
                            $userid=$_SESSION["user_id"];
                            $query3= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$userid");
                            function tree($fetch,$con,$id) {
                                
                                $node_id= $fetch['node_id'];
                                $desc = $fetch['description'];    
                                echo "<a href=\"node.php?id=$node_id\"><li><div><p>$desc</p></div>";
                                $query2= mysqli_query($con, "SELECT * FROM `nodes` WHERE project_id= $id AND parent_id= $node_id AND isroot=0");
                                if (mysqli_num_rows($query2)!=0){
                                    echo "<ul>";
                                    while ($fetch2 = mysqli_fetch_assoc($query2)){
                                        tree($fetch2,$con,$id);
                                    }
                                    echo "</ul>";
                                }
                                echo "</li></a>";
                            }
                            $query= mysqli_query($con, "SELECT * FROM `nodes` WHERE project_id= $id AND isroot=1");
                            if (mysqli_num_rows($query3)!=0){
                                if (mysqli_num_rows($query)!=0){
                                    while ($fetch = mysqli_fetch_assoc($query)){
                                        echo "<ul>";
                                        tree($fetch,$con,$id);
                                        echo "</ul>";
                                    }
                                }
                                else{
                                    echo "<p>No node found.</p> <a href=\"insertnode.php?project=$id&parent=0\">Insert one now</a>";
                                }    
                            }
                            else{
                                echo "<p> You do not have access to view this project.</p>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/agency.min.js"></script>

    </body>

</html>
