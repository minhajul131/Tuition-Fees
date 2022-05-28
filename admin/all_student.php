<?php require('includes/header.php'); ?>

<section>
    <div class= "container">

        <div class="text-center">
            <h1>All Students</h1>
            <br>
        </div>
        <?php 
        
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
        ?>

        <table class="table-full">

            <thead>
                <td> Student ID </td>
                <td> Student Name </td>
                <td> Phone Number </td>
                <td>Option</td>               
            </thead>
            
            <?php
                //get data from db
                $sql = "SELECT * FROM student_table";
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                if($res == TRUE){
                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether food available of not
                    if($count>0){
                        //Get the details
                        while($rows=mysqli_fetch_assoc($res)){

                            $student_id  = $rows['student_id'];                           
                            $full_name = $rows['full_name'];
                            $contact_number = $rows['contact_number'];
                            
                            ?>

                            <tbody>                           
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $contact_number; ?></td>
                                <td><a href="<?php echo SITEURL; ?>admin/delete_student.php?student_id=<?php echo $student_id; ?>"</a>Delete</td>
                            </tbody>

                            <?php                            
                        }
                    }                   
                    else{                        
                        //no data
                        echo "<div class='error text-center'>No Information Found...</div>";
                    }                    
                }               
            ?>                                                                                       
        </table>
    </div>  
</section>

<?php require('includes/footer.php'); ?>