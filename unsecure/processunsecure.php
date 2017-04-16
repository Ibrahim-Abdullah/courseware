<?php

	require_once('../database/dbconnectclass.php');

	//Declare variables 
		$username = $password =$fname= $lname=$email=$major=$gender=$genderErr=$majorErr=$lnameErr = $fnameErr=$passwordErr = '';
		$usernameErr = $successMessage = $emailErr = ''; $status = 'ACTIVE'; $per_id = 1;


	if(isset($_POST['register'])){
		validregister();
	}

	if(isset($_POST['login'])){
		validlogin();
	}


	/**
	 * Load all majors in the Database to be displayed on the register form.
	 */
	function loadallmajors()
	{
		$loadmajors = new dbconnection;

		$sql = "SELECT DISTINCT majorname,majorid FROM allmajor";

		$majors = $loadmajors->query($sql);

		if($majors){
			while ($row = $loadmajors->fetch()) {
				echo "<option value=".$row['majorid'].">".$row['majorname']."</option>";
			}
		}
		
	}

    /**
     *  Validate login details of the user
     */
	function validlogin()
	{
		global $username, $password,$passwordErr;
		$ok = true;
        if (!isset($_POST['username']) || $_POST['username'] ==='')
        {
            $ok = false;
            $passwordErr = "Incorrect Username or Password";
        } else 
        {	
            $username = inputprepping($_POST['username']);
            $username = validateName($username);
        }

        if(!isset($_POST['password']) || $_POST['password'] === '')
    	{
    		$ok = false;
    		$passwordErr = "Incorrect Username or Password";
    	}else
    	{
    		$password = inputprepping($_POST['password']);
    		$password = validatePassword($password);
    	}

    	if($ok){
            echo "Validation true";
    		verify_login($username,$password);
    	}
	}

    /**
     *  Validate the registration details of the user
     */
	function validregister()
	{
		global $username, $password,$fname,$lname, $email, $major, $gender;
		global $usernameErr, $passwordErr, $fnameErr, $lnameErr,$majorErr,$genderErr, $emailErr;

		$ok = true;


		//Username validation
        if (!isset($_POST['username']) || $_POST['username'] === '')
        {
            $ok = false;
            $usernameErr = "Username can't be empty";
        } else 
        {
            $username = inputprepping($_POST['username']);
            $username = validateName($username);
        }

        if(!isset($_POST['password']) || $_POST['password'] === '')
    	{
    		$ok = false;
    		$passwordErr = "Password must contain at least one upper case, symbol,
			number and password length not less than 6 characters.";
    	}else
    	{
    		$password = inputprepping($_POST['password']);
    		$password = validatePassword($password);
    	}
        //Firstname validation 
		if (!isset($_POST['fname']) || $_POST['fname'] === '')
		{
            $ok = false;
            $fnameErr = "First can't be empty";
        }
        else 
        {
        	$fname = inputprepping($_POST['fname']);
            $fname = validateName($fname);
        }
        
        //Lastname validation
        if (!isset($_POST['lname']) || $_POST['lname'] === '') 
        {
            $ok = false;
            $lnameErr = "Lastname can't be empty";
        }
        else 
        {
        	$lname = inputprepping($_POST['lname']);
            $lname = validateName($lname);
        }

        //Email validation
        if (!isset($_POST['email']) || $_POST['email'] ==='') 
        {
            $ok = false;
            $emailErr = "Email can't be empty";
        }
        else 
        {
        	$email = inputprepping($_POST['email']);
            $email = validateEmail($email);
        }

        //Major validation
        if (!isset($_POST['major']) || $_POST['major'] == -1) 
        {
            $ok = false;
            $majorErr = "Select major";
        }
        else 
        {
            $major = $_POST['major'];
        }

        //Gender validation
        if (!isset($_POST['gender']) || $_POST['gender'] ==='') 
        {
            $ok = false;
            $genderErr = "Select Gender";
        }
        else 
        {
            $gender = $_POST['gender'];
        }

        if($ok)
        {
        	if(checkusername($username))
        	{
        		register_new_user();
        	}
        	else
        	{
        		$usernameErr = "Username already exist.";
        	}
        }

	}

	/**
	 * Validate username, firstnams and lastname.
	 * 
	 * @param string username, firstname or lastname
	 * @return string | The validated data;
	 */
	function validateName($data)
	{

  		if(!preg_match("/^[a-zA-Z ]*$/",$data)|| $data === '')
  		{
  			$ok = false;
  		}
  		return $data;
	}

	/**
	 * Validate Email address
	 * @param string| email address
	 * @return string | validated email address
	 */
	function validateEmail($data)
	{
  		if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]??\w+)*(\.\w{2,3})+$/', $data) || $data ==='')
  		{
  			$ok = false;
  		}
  		return $data;
	}

	/**
	 * Validate user password.
	 * @param string| user password
	 * @return string| user validated password
	 */
	function validatePassword($data)
	{
		if ($data ==='') {
			$ok = false;
		}
		return $data;	
	}

	/**
	 * Trim , strip slashes and make form input values special html characters.
	 * @param string| Form input value
	 * @return string | validated form input value
	 */
	function inputprepping($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
  		$data = htmlspecialchars($data);

  		return $data;		
	}

	/**
	 * Check is if username to be registered already exist 
	 * 
	 * @param string| form input value for username
	 * @return boolean| false if the username already exist
	 */
	function checkusername($username)
	{
		$sql = "SELECT * FROM useraccount WHERE username =".'"$username"';
		$user = new dbconnection;
		$result = $user->query($sql);
		if($result)
		{
			$row = $user->fetch();
			if($row['username'] ==$username)
			{
				return false;
			}
		}
		return true;

	}
	/**
	 * Process user registration details
	 */
	function register_new_user()
	{
		global $username, $password,$fname,$lname, $email, $major, $status, $gender, $per_id, $successMessage;
		$pwd = password_hash($password,PASSWORD_DEFAULT);


		//create database class instance
		$reguser = new dbconnection;
		$reguser->connect();

         $sql = "INSERT INTO useraccount(username,pwd,fname,lname,email,gender,major_id,userstatus,per_id) 
                VALUES('$username','$pwd','$fname','$lname','$email','$gender','$major','$status','$per_id')";
		//Execute query
		$dbexec = $reguser->query($sql);

		if($dbexec){

		    echo $successMessage;

            sleep(20);
            header("Location:../login/index.php");
		} 
		else{
		    echo "$sql";
			$successMessage = 'Registration was NOT SUCCESSFUL';
		}
	}


	/**
	 * Verify login details 
	 */
	function verify_login($username,$password)
	{
		//global $username,$password,$successMessage,$passwordErr;
 
		$sql = "SELECT * FROM useraccount WHERE username ='$username'";
		$user = new dbconnection;

		$result = $user->query($sql);

		if($result)
		{

			//fectch data from the database
			$row = $user->fetch();
            //$passwd = $row['pwd'];

				if(password_verify($password,$row['pwd']))
				{
                    session_start();

					$_SESSION['userid'] = $row['userid'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['perid'] = $row['per_id'];
					$_SESSION['mid'] = $row['major_id'];

					//Redirect to the index.php page
                    echo "Loggin  was successful. Redirecting ....";
                    header("Location: ../index.php");
				}else
				{
					$passwordErr = "Incorrect password or username";
					$successMessage = "User could not be logged in";
				}
		}else
		{
			$successMessage = "User could not be logged in";
		}
	}
?>