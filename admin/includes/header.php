<?php require('../database/connector.php'); ?>

<?php 
    //Authorization - Access Control
    //Check whether the user is logged in or not
    if(!isset($_SESSION['login'])) //IF user session is not set
    {
        //User is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //Redirect to Login Page
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fees</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<section>
    <div class= "container ">

        <div class="logo">
            <a href="index.php">Tuition Fees</a>
        </div>

        <div class = "menu text-right">
            <ul>
                <li>
                    <a href="all_student.php">All Student</a>
                </li>
                <li>
                    <a href="add_new_student.php">Add New Student</a>
                </li>
                <li>
                    <a href="admin_login.php">Sign Out</a>
                </li>
            </ul>           
        </div>
        
    </div>          
</section>