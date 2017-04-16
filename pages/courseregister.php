<!DOCTYPE html>
<html>
	<head>
		<title>Class Project</title>
	</head>
<body>
     <!--load initial file-->
	<?php 
	require_once("../settings/initialization.php");
	require_once("../controller/coursemanagement.php");
	
	
	//check user login
	verifyuserlogin();

	?>
	<h2>Course registration</h2>
	
	<form>
	<?php listunregcourses();?>
	<input type="Submit" name="Regcourse" value="Register">
	</form>
</body>
</html>