<?php 
    
    session_start();
    
    //Create Constants to Store Non Repeating Values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'id19008568_root');
    define('DB_PASSWORD', 'CT)(byuzwKL#^y%v6nl3');
    define('DB_NAME', 'id19008568_tutionfee');
    
    //database connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
    //selecting database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>