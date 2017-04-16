<?php
    //session start for the session
    session_start();

    /**
     * Check if a user is loggen into the system
     */
    function verifyuserlogin()
    {
        //Check for login
        if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"]))
        {
            getuserheader();
        }else
        {
            //not valid
            header("Location: ../classproject/login/index.php");
        }
    }

    /**
     *  Get the approriate header for a user depending the permission id of that user.
     */
    function getuserheader()
    {
        //check user permission
        if($_SESSION['perid']==2)
        {
            //include the right header
            require_once($_SERVER["DOCUMENT_ROOT"]. "/classproject/layout/standardheader.php");
        }
        else if($_SESSION['perid']==1)
        {
            //include the right header
            require_once($_SERVER["DOCUMENT_ROOT"]. "/classproject/layout/adminheader.php");
        }


    }
?>