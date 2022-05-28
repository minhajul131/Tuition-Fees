<?php require('includes/header.php'); ?>

<section>
    <div class= "container ">

        <h2 style="margin-top: 20px">Add New Student</h2>
        <br><br>

        <!-- form for add student -->
        <form action="" method = "POST">

            <table>    
                <tr>
                    <td>Full name</td>
                    <td>
                        <input class="box" type="text" name="full_name" placeholder="Enter Your Name" require>
                    </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input class="box" type="text" name="contact_number" placeholder="Enter Your Number" require>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Student" class="btn">
                    </td>
                </tr>
            </table>
        </form>

        <?php            
            //CHeck whether the Submit Button is Clicked or Not
            if(isset($_POST['submit'])){

                //echo "Clicked";
                // Get the Value from  Form
                $full_name = $_POST['full_name'];
                $contact_number = $_POST['contact_number'];

                $sql = "INSERT INTO student_table SET
                    full_name='$full_name',
                    contact_number='$contact_number'
                    ";

                // Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                // Check whether the query executed or not and data added or not
                if($res==true){
                    //Query Executed and Added
                    $_SESSION['add'] = "<div class='success text-center'>Added Successfully.</div>";
                    //Redirect to Manage Page
                    header('location:'.SITEURL.'admin/index.php');
                }
                else{
                    //Failed to Add 
                    $_SESSION['add'] = "<div class='error text-center'>Failed to Add.</div>";
                    //Redirect to Manage Page
                    header('location:'.SITEURL.'admin/add_new_student.php');
                }
            }    
        ?>
    </div>
</section>

<?php require('includes/footer.php'); ?>