<?php
    //start session
    session_start();

    //destroy session
    session_destroy();

    //redirect to login
    header("Location: index.php");
?>