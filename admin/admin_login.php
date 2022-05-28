<?php require('../database/connector.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tution Fee</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <section class= "login-form text-center">
        
        <?php            
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>

        <h1> Admin Login </h1>

        <br><br><br>

        <!-- form for login -->
        <form action="" method="POST">

            <h3>Username</h3>
            <input class="box" type="text" name="username" placeholder="Enter your username" require>

            <h3>Password</h3>
            <input class="box" type="password" name="password" placeholder="Enter your password" require>
            <br>
            <button class="btn" type="submit" name="submit" class="buttonSubmit">Log In</button>

        </form>

    </section>

    <?php 

        if(isset($_POST['submit'])){

            // Get the Data from Login form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // SQL to check whether the user with username and password exists or not
            $sql = "SELECT * FROM teacher_table WHERE username='$username' AND password='$password'";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Count rows to check whether the user exists or not
            $count = mysqli_num_rows($res);

            if($count==1){

                //User Available and Login Success
                $row=mysqli_fetch_assoc($res);                
                $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
                $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

                //Redirect to HOme Page/Dashboard
                header('location:'.SITEURL.'admin/index.php');
            }
            else{
                //User not Available and Login FAil
                $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
                //Redirect to Home Page/Dashboard
                header('location:'.SITEURL.'admin/admin_login.php');
            }

        }
    ?>

</body>
</html>