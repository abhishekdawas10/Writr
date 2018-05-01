<?php
// Start the session
session_start();
$_SESSION["url"]=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$filename=basename($_SESSION["url"]);
$_SESSION["node_id"]=( isset($_GET["id"])) ? trim ($_GET["id"]) : 0;
$_SESSION["version"]=( isset($_GET["version"])) ? trim ($_GET["version"]) : 1;
$currentversion= $_SESSION["version"];
$nodeid= $_SESSION["node_id"];
include 'connect.php';
$query= mysqli_query($con, "SELECT * FROM `nodes` WHERE node_id=$nodeid");
while ($fetch = mysqli_fetch_assoc($query)){
    $desc = nl2br($fetch['description']);
    $date= $fetch['creation_date'];
    $id= $fetch['project_id'];
    $_SESSION['project_id']=$id;
    $userid= $fetch['user_id'];
}
$query2= mysqli_query($con,"SELECT * FROM `users` WHERE id=$userid");
while ($fetch = mysqli_fetch_assoc($query2)){
    $username= $fetch['username'];
}
$currentid= $_SESSION['user_id'];
$query3= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$currentid");
$_SESSION['access_var']=0;
if (mysqli_num_rows($query3)!=0){
    $_SESSION['access_var']=1;
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

        <title>Node View</title>

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
                                echo "<a class=\"nav-link js-scroll-trigger \" href=\"project.php?$id#tree\">Branch Tree</a>"
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
                    <div class="intro-lead-in"><?php echo "Description: ".$desc."<br/>Created on ".$date." by ".$username   ?></div>
                    <div class="intro-heading text-uppercase"></div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#description">Full Text</a>
                </div>
            </div>
        </header>

        <?php

                                function parentNode($fetch,$con,$projectid) {
                                $parent_id= $fetch['parent_id'];    
                                $query2= mysqli_query($con, "SELECT * FROM `nodes` WHERE node_id= $parent_id");
                                if (mysqli_num_rows($query2)!=0){
                                    while ($fetch2 = mysqli_fetch_assoc($query2)){
                                        $rootcheck= $fetch2['isroot'];
                                        if ($rootcheck!=1){
                                            parentNode($fetch2,$con,$projectid);
                                        }
                                        $file = file_get_contents("projects/$projectid/$parent_id/main.txt");
                                        $GLOBALS['fulltext']=$GLOBALS['fulltext'].$file;
                                        echo "$file";
                                    }
                                }
                            }
        ?>


        <section id="description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Full Text</h2>
                        <h3 class="section-subheading text-muted" style="font-size:20px"><?php 
                            if ($_SESSION['access_var']==1){
                                $GLOBALS['fulltext']="";
                                $query3= mysqli_query($con, "SELECT * FROM `nodes` WHERE node_id= $nodeid");
                                if (mysqli_num_rows($query3)!=0){
                                    while ($fetch = mysqli_fetch_assoc($query3)){
                                        $rootcheck= $fetch['isroot'];
                                        if ($rootcheck!=1){
                                            parentNode($fetch,$con,$id);
                                        }
                                    }
                                }    
                            }
                            else{
                                echo "<p>Sorry. You do not have access permission.</p>";
                            }
                            
                            ?></h3>
                        <h3 style="color:#fed136; font-size: 25px" class="section-subheading"><?php 
                            if ($_SESSION['access_var']==1){
                                if ($currentversion==1){
                                    $file = file_get_contents("projects/$id/$nodeid/main.txt");    
                                }
                                else{
                                    $file = file_get_contents("projects/$id/$nodeid/main_$currentversion.txt");
                                }

                                echo "$file";
                                $GLOBALS['fulltext']=$GLOBALS['fulltext'].$file;
                                $txt= $GLOBALS['fulltext'];
                                $_SESSION["fulltext"]=$txt;
                                }
                            ?></h3>
                        <?php
                        if ($_SESSION['access_var']==1){
                            echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"getdata.php\">Edit this node</a>";
                        }
                        ?>
                        <?php 
                        if ($_SESSION['access_var']==1){
                            echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"insertnode.php?project=$id&parent=$nodeid\">Insert new child node</a>";}
                        
                        ?>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <?php
                        if ($_SESSION['access_var']==1){
                            echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"export.php\">Export all text</a>";
                        }
                        ?>
                    </div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <form action="deletenode.php" method="get">
                            <input type="submit" class="btn btn-primary btn-xl text-uppercase" value="Delete Node">
                        </form>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="dropdown">
                            <?php
                            $query2= mysqli_query($con,"SELECT * FROM `nodes` WHERE node_id=$nodeid");
                        while ($fetch = mysqli_fetch_assoc($query2)){
                            $versioncount= $fetch['version_count'];
                            $_SESSION['version_count']=$versioncount;
                        }
                            ?>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">View Previous Versions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <?php
                                echo "<li><a href=\"node.php?id=$nodeid\">Latest Version</a></li>";
                                $count= 1;
                                while ($count<$versioncount){
                                    $version=$versioncount-$count;
                                    $version2= $version+1;
                                    echo "<li><a href=\"node.php?id=$nodeid&version=$version2\">Version $version</a></li>";
                                    $count=$count+1;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            $(document).ready(function(){
                $("#loader").hide();
                $('#div1').load("projectupdate1.php",function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        alert(msg + xhr.status + " " + xhr.statusText);
                    }
                });  
            });
        </script>





        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Writr 2018</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item">
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Portfolio Modals -->

        <!-- Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Explore</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3 -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Finish</li>
                                        <li>Category: Identity</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 4 -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Lines</li>
                                        <li>Category: Branding</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 5 -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Southwest</li>
                                        <li>Category: Website Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 6 -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Window</li>
                                        <li>Category: Photography</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
