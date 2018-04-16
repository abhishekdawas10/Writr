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
</style>
  <h1 style="text-align:center">REGISTRATION</h1>
  <div class="header">
  	<h2 style= font size = "10">Register</h2>
</div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label><font color = "black">USERNAME</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
<div class="input-group">
  	  <label>NAME</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>EMAIL</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>


  	<div class="input-group">

  	  <label><font color = "black">PASSWORD</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label><font color = "black">CONFIRM PASSWORD</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group"><font color = "white">
  	  <button type="submit" class="btn" name="reg_user"><font color = "white">Register</button>
  	</div>
  	<p><font color = "black">
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>