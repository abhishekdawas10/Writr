<?php
// Start the session
session_start();
$_SESSION["url"]=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$filename=basename($_SESSION["url"]);
$_SESSION["Project_ID"]=( isset($_GET["project"])) ? trim ($_GET["project"]) : 0;
$_SESSION["parent_id"]=( isset($_GET["project"])) ? trim ($_GET["parent"]) : 0;
$id= $_SESSION["Project_ID"];
include 'connect.php';
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE project_id=$id");
while ($fetch = mysqli_fetch_assoc($query)){
    $title = nl2br($fetch['name']);
}
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php 
            echo "$title - Add a new node";
            ?></title>

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


        <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $name = test_input($_POST["name"]);
                                    $message = test_input($_POST["message"]);
                                    $project= test_input($_POST["project"]);
                                    $parent= test_input($_POST["parent"]);
                                    $_SESSION["node_name"]= $name;
                                    $_SESSION["node_text"]=$message;
                                    $_SESSION["project_id"]=$project;
                                    $_SESSION["parent_id"]=$parent;
                                    ob_start();
                                    header("Location: newnode.php");
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

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Add a new node to current project!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Node Description" required data-validation-required-message="Please enter your node description">
                                    <?php
                                    $id= $_SESSION["Project_ID"];
                                    $id2= $_SESSION["parent_id"];
                                    echo "<input type=\"hidden\" name=\"project\" value=\"$id\">
                                    <input type=\"hidden\" name=\"parent\" value=\"$id2\">"
                                    ?>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your node text" required data-validation-required-message="Add some text to your node."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="clearfix"></div>
                                <div id="success"></div>
                                <div style="text-align:center;">
                                    <input id="sendMessageButton" style="center" class="btn btn-primary btn-xl text-uppercase" name="Submit" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




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
