<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration system </title>
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
        <h1 style="text-align:center">REGISTRATION</h1>
        <div class="header">
            <h2 style= font size = "10">Register</h2>
        </div>

        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label><font color = "white">USERNAME</font></label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    </div>
                <div class="input-group">
                    <label><font color = "white">NAME</font></label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-group">
                    <label><font color = "white">EMAIL</font></label>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>


                <div class="input-group">

                    <label><font color = "white">PASSWORD</font></label>
                        <input type="password" name="password_1">
                        </div>
                    <div class="input-group">
                        <label><font color = "white">CONFIRM PASSWORD</font></label>
                            <input type="password" name="password_2">
                            </div>
                        <div class="input-group"><font color = "white">
                            <button type="submit" class="btn" name="reg_user"><font color = "white">Register</font></button>
                                </div>
                            <p><font color = "white">
                                Already a member? <a href="login.php">Sign in</a>
                                </font></p>
                            </form>
                            </body>
                        </html>