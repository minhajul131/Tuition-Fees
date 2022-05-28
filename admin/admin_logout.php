<?php 
    //Include constants.php for SITEURL
    require('../database/connector.php');

    //1. Destory the Session
    session_destroy(); 

    //2. REdirect to Login Page
    echo "<script>window.open('admin_login.php','_self')</script>";
    
?>