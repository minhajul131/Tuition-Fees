<?php
    include('../database/connector.php');
    //get student id
    $student_id = $_GET['student_id'];
    
    //delete data from table
    $sql = "DELETE FROM student_table WHERE student_id ='$student_id'";
    
    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        //echo "Student deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        echo "<script>window.open('all_student.php','_self')</script>";
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        echo "<script>window.open('all_student.php','_self')</script>";
    }
?>