<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Class Project 2017</title>  
	<link rel="stylesheet" href="../css/loginstyle.css">  
</head>

<body>

	<?php require_once('../unsecure/processunsecure.php');?>
	<div class="container">  
		<form id="contact" action="" method="post">
			<center><h2>Login</h2></center>
			<fieldset>
				<input placeholder="Username" type="text" tabindex="1" name="username" required maxlength="30" value= "<?php echo "$username"; ?>"" pattern="^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$" title="Please enter a valid name: at least two letters required">
			</fieldset>

			<fieldset>
				<input placeholder="Password" type="password" tabindex="2" name="password" value = "<?php echo "$password";?>" required >
			</fieldset>
			<fieldset>
				<center style="color: red;"><?php echo "$passwordErr";?></center>
				<center style="color: red;"><?php echo "$successMessage";?></center>
			</fieldset>
			<fieldset>
				<button name="login" type="submit" id="loginSubmit" data-submit="...Sending" >LOGIN</button>
			</fieldset>
            <fieldset>
                <center><a href="../register/register.php">SIGN UP</a></center>
            </fieldset>

		</form>
	</div>
	<!--<script type="text/javascript" src="../js/validate.js"></script>-->

</body>
</html>
