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
</style>
<h1 style = "text-align:center">PLEASE LOGIN!!</h1>
  <div class="header">
      <div font size="20">
  	<h2 style="background-color:red"> LOGIN</h2>
   </div>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>USERNAME</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>PASSWORD</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
           
  		<button type="submit" class="btn" name="login_user"> <font face ="WildWest" size = "5"><style="background-color:black>Login</font></button>
  	</div>
  	<p>
  		Are you not registered? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>