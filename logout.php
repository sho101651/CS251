<?php

    session_start();

    session_destroy(); 

    unset($_SESSION['User_ID']);

    header("location:index.php");

?>