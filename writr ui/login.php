<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <style>
            body  {
                background-image: url("download.jpg");   
            }

            .header {
                width: 30%;
                margin: 50px auto 0px;
                color: black;
                background-color: white;
                opacity: 0.5;
                text-align: center;
                border: 1px solid black;
                border-bottom: none;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
            }

            a {
                color: hotpink;
            }

        </style>
        <div class="header">
            <div font size="20">
                <h2> LOGIN</h2>
            </div>
        </div>

        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label><font color = "white">USERNAME</font></label>
                    <input type="text" name="username" >
                    </div>
                <div class="input-group">
                    <label><font color = "white">PASSWORD</font></label>
                        <input type="password" name="password">
                        </div>
                    <div class="input-group">

                        <button type="submit" class="btn" name="login_user"> <font face ="WildWest" size = "5" color = "white">Login</font></button>
                            </div>
                        <p><font color = "white">
                            Are you not registered? <a color = "white" href="register.php">Sign up</a></font>
                            </p>
                        </form>
                    </body>
                </html>