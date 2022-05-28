<?php require('database/connector.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fees</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section>
    <div class= "container">
        <div class="text-center">
            <h1>Welcome to Tuition Fees System</h1>

            <h4>Pay your fees By Bkash/Nagad (01700000000) </h3>
        </div>
        
        <div class="bg">
            <div class="info">
            <?php 
        
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
                <form action="" method = "POST">

                <h2> Student ID</h2>
                <input class="box-search" type="number" name="student_id" placeholder="Enter your ID Number">
                    
                <h2> Transaction number</h2>
                <input class="box-search" type="text" name="transaction_number" placeholder="Enter your Transaction Number">

                <h2>Month</h2>
                <select name="month" class="box-search">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="Octobor">Octobor</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                    
                <h2> Amount</h2>
                <input class="box-search" type="number" name="amount" placeholder="Enter your amount">
                <br>
                <button type="submit" name="submit" class="btn"> Confirm</button>

            </form>

            <?php 
                    
                //CHeck whether the Submit Button is Clicked or Not
                if(isset($_POST['submit'])){

                    //echo "Clicked";
                    // Get the Value from Form                   
                    $student_id = $_POST['student_id'];
                    $transaction_number = $_POST['transaction_number'];
                    $month = $_POST['month'];
                    $amount = $_POST['amount'];

                    $sql = "INSERT INTO tuition_fees SET
                        student_id='$student_id',
                        transaction_number='$transaction_number',
                        month='$month',
                        amount='$amount'
                    ";

                    // Execute the Query and Save in Database
                    $res = mysqli_query($conn, $sql);

                    // Check whether the query executed or not and data added or not
                    if($res==true){

                        //Query Executed and Category Added
                        $_SESSION['add'] = "<div class='success'>Confirmed...</div>";
                        //Redirect to Manage Category Page
                        header('location:'.SITEURL.'index.php');
                    }
                    else
                    {
                        //Failed to Add CAtegory
                        $_SESSION['add'] = "<div class='error'>Failed .....</div>";
                        //Redirect to Manage Category Page
                        header('location:'.SITEURL.'index.php');
                    }
                }
                    
            ?>
        </div>
    </div>
    </div>
</section>


</body>
</html>