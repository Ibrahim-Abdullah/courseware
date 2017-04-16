 
 function validRegistration()
{   
    var fname = document.getElementById("fname");
    var fnameErr = document.getElementById("fnameErr");
    var lname = document.getElementById("lname");
    var lnameErr = document.getElementById("lnameErr");
    var username = document.getElementById("username");
    var usernameErr = document.getElementById("usernameErr");
    var email = document.getElementById("email");
    var emailErr = document.getElementById("emailErr");
    var password = document.getElementById("password");
    var passwordErr = document.getElementById("passwordErr");
    var major = document.getElementById("major");
    var majorErr = document.getElementById("majorErr");
    var gender = document.getElementById("gender");
    var genderErr = document.getElementById("genderErr");

    validFname(fname, fnameErr);
    validLname(lname,lnameErr);
    validUsername(username,usernameErr);
    validPassword(password,passwordErr);
    validMajor(major,majorErr);
    validGender(gender,genderErr);
    validEmail(email,emailErr);
}

function validLogin()
{
    var username = document.getElementById("username");
    var usernameErr = document.getElementById("usernameErr");
    var password = document.getElementById("password");
    var passwordErr = document.getElementById("passwordErr");
    validUsername(username,usernameErr);
    validPassword(password,passwordErr);
}

/**
*
*Validate First name
**/
function validFname(fname, fnameErr) 
{
    if(fname.value == "")
    {
        fnameErr.innerHTML = "Enter Firstname";

    }else
    {
        if (!preg_match('/^[a-zA-Z ]+$/', fname)) 
        {
            fnameErr.innerHTML ="Firstname must be only alphabet";
        }
    }
}

function validLname(lname,lnameErr)
{

    if(lname.value == "")
    {
        lnameErr.innerHTML = "Enter Lastname";
    }else
    {
        if (!preg_match('/^[a-zA-Z ]+$/', lname)) 
        {
            lnameErr.innerHTML ="Lastname must be only alphabet";
        }
    }
}

function validUsername(username,usernameErr)
{

    if(username.value == "")
    {
        username.innerHTML = "Enter Username";
    }else
    {
        if (!preg_match('/^[a-zA-Z ]+$/', username)) 
        {
            username.innerHTML ="Username must be only aphabet";
        }
    }
}

function validEmail(email,emailErr)
{

    if(email.value == "")
    {
        email.innerHTML = "Enter Email";
    }else
    {
        if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]??\w+)*(\.\w{2,3})+$/', email)) 
        {
            email.innerHTML ="Username must be only aphabet";
        }
    }   
}
function validPassword(password,passwordErr)
{

    if(password.value == "")
    {
        password.innerHTML = "Enter Password";
    }else
    {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', password)) 
        {
            password.innerHTML ="Incorrect Password";
        }
    }
}


function validMajor(major,majorErr)
{

    if(major.value == "" || major.value == -1)
    {
        majorErr.innerHTML = "Select Major";
    }
}

function validGender(gender,genderErr)
{

    if(gender.value == "")
    {   
        gender.value = gender;
        genderErr.innerHTML = "Select Gender";
    }
}