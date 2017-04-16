<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" href="../css/loginstyle.css">
</head>
<body >

	<!--Include PHP file for processing user registration and login verification -->
	<!--<?php require("../unsecure/processunsecure.php");?>-->

	<!--HTML content goes here -->
	<div class="container">  
		<form id="contact" action="" method="POST">
			<center><h2>Register</h2></center>
			<fieldset>
				<input id="username" placeholder="Username" type="text" tabindex="1" name="username" required maxlength="30"
                       value= "<?php echo "$username"; ?>" pattern="^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$"
                       title="Please enter a valid name: at least two letters required">
				<span id="usernameErr" style="color: red;"><?php echo "$usernameErr";?></span>
			</fieldset>

			<fieldset>
				<input id="password" placeholder="Password" type="password" tabindex="2" name="password" value = "<?php echo "$password";?>" required >
				<span id="passwordErr" style="color: red;"><?php echo "$passwordErr";?></span>
			</fieldset>
			<fieldset>
				<input id="fname" placeholder="First name" type="text" tabindex="3" name ="fname" maxlength="20" value = "<?php echo "$fname";?>"
                       pattern="^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$" title="Please enter a valid name: at least two letters required" required >
				<span id="fnameErr" style="color: red;"><?php echo "$fnameErr";?></span>
			</fieldset>
			<fieldset>
				<input id="lname" placeholder="Last name" type="text" tabindex="4" name ="lname" maxlength="20" value = "<?php echo "$lname";?>"
                       pattern="^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$" title="Please enter a valid name: at least two letters required">
				<span id="lnameErr" style="color: red;"><?php echo "$lnameErr";?></span>
			</fieldset>
			<fieldset>
				<input id="email" placeholder="Email" type="email" tabindex="5" name="email" value= "<?php echo "$email" ?>" required
                       pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                       title="Please enter a valid email address: example@example.com">
				<span id="emailErr" style="color: red;"><?php echo "$emailErr";?></span>
			</fieldset>

			<fieldset>
				<label>Gender</label>&nbsp &nbsp &nbsp &nbsp<span id="genderErr" style="color: red;"><?php echo "$genderErr";?></span><br>
				<input type="radio" name="gender" value="m" <?php if ($gender == 'm'){ echo "checked";}?>>Male
				<input type="radio" name="gender" value="f" <?php if($gender == 'f'){ echo "checked";}?>>Female
				
			</fieldset>

			<fieldset>
				<select id="majorSelect" name="major" required>
					<option value="-1">Please select a major</option>
					<?php loadallmajors(); ?>
				</select>
				<span id="majorErr" style="color: red;"><?php echo "$majorErr";?></span>
			</fieldset>

			<fieldset>
				<button name="register" type="submit" id="registerSubmit" data-submit="...Sending" >REGISTER</button>
			</fieldset>
			<fieldset>
				<center id="success" style="color: red;"><?php echo "$successMessage";?></center>
			</fieldset>
			<center><a href="../login/index.php">BACK TO LOGIN</a></center>
		</form>
	</div>
</body>
</html>