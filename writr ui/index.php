<?php
// Start the session
session_start();
$count = ( isset($_GET["count"])) ? trim ($_GET["count"]) : 5;
$_SESSION["project_count"]= $count;
?>
<html lang="en">

    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Writr - A Collaborative Writing Platform!</title>

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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Writr</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#profile">Your Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="create.php">Create a new project</a>
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
                    <div class="intro-lead-in">Welcome to Writr!</div>
                    <div class="intro-heading text-uppercase"></div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#projects">Your Projects</a>
                </div>
            </div>
        </header>

        <section class="bg-white" id="profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Your Profile</h2>
                        <br/>
                        <br/>
                    </div>
                </div>
                <div id="div2">
                    <div id="loader2">Loading...</div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section id="projects" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="color:white">
                        <h2 class="section-heading text-uppercase">Your Projects</h2>
                        <h3 class="section-subheading text-muted">All the projects you are currently working on.</h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div id="div1">
                                <div id="loader">Loading...</div>
                            </div>
                            <div class="clearfix">
                                <?php
                                $count= $_SESSION["project_count"];
                                $count= $count + 5;
                                echo "
                                    <a class=\"btn btn-primary float-right\" href=\"index.php?count=$count#projects\">Older Projects &rarr;</a>
                                    "
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p id="demo"></p>

        </section>

        <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $name = test_input($_POST["name"]);
                                        $desc = test_input($_POST["desc"]);
                                        $message = test_input($_POST["message"]);
                                        $_SESSION["project_name"]= $name;
                                        $_SESSION["project_desc"]=$desc;
                                        $_SESSION["project_text"]=$message;
                                        ob_start();
                                        header("Location: newproject.php");
                                        ob_end_flush();
                                        die();
                                        exit; 
                                    }

                                function test_input($data) {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                }
        ?>

        

        <script>
            $(document).ready(function(){
                $("#loader").hide();
                $("#loader2").hide();
                $('#div1').load("newsfeed.php",function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        walert(msg + xhr.status + " " + xhr.statusText);
                    }
                });  
                $('#div2').load("profile.php",function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        walert(msg + xhr.status + " " + xhr.statusText);
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
