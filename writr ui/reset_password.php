<?php

session_start();
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "writr");
       $otp = $_SESSION['random'];

       if ($otp == $_POST["otp"])
{
		$sql = "UPDATE `writr`.`users` SET `password` = '" . md5($_POST["password"]). "' WHERE `users`.`username` = '" . $_POST["user-login-name"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";
		}
		else{

			echo "You Entered The Wrong OTP";
		}
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_password_reset() {
	if((document.getElementById("password").value == "") && (document.getElementById("confirm_password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
}
</script>
<form name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">
<h1>Reset Password</h1>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

<div class="field-group">
		<div><label for="username">Username</label></div>
		<div><input type="text" name="user-login-name" id="user-login-name" class="input-field"> Or</div>
	</div>

<div class="field-group">
		<div><label for="username">OTP</label></div>
		<div><input type="text" name="otp" id="otp" class="input-field"> Or</div>
	</div>


	<div class="field-group">
		<div><label for="Password">Password</label></div>
		<div>
		<input type="password" name="password" id="password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><label for="email">Confirm Password</label></div>
		<div><input type="password" name="confirm_password" id="confirm_password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="reset-password" id="reset-password" value="Reset Password" class="form-submit-button"></div>
	</div>	
</form>