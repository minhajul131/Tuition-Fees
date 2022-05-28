<?php require('includes/header.php'); ?>

<section>
    <div class = "container">

        <!-- form for search student payment for which month -->
        <form action="search.php" method="POST" class="text-center">
            <input class = "box-search" type="search" name="search" placeholder="Search Month..." required>
            <input type="submit" name="submit" value="Search" class="btn">
        </form>
    </div>   
</section>

<?php 
        
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
?>

<section>
    <div class= "container">
        <table class="table-full">

            <thead>
                <td> Student ID </td>
                <td> Student Name </td>
                <td> Phone Number </td>
                <td> Month </td>
                <td> Transiction Number </td>
                <td> Amount </td>
            </thead>
            
            <?php
                //get data from db
                $sql = "SELECT st.*,tf.* FROM student_table st, tuition_fees tf WHERE st.student_id=tf.student_id ";
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                if($res == TRUE){
                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether food available of not
                    if($count>0){

                        while($rows=mysqli_fetch_assoc($res)){
                            //Get the details
                            $student_id  = $rows['student_id'];                           
                            $full_name = $rows['full_name'];
                            $contact_number = $rows['contact_number'];
                            $transaction_number = $rows['transaction_number'];
                            $month = $rows['month'];
                            $amount = $rows['amount'];
                                    
                            ?>
                            <tbody>
                            
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $contact_number; ?></td>
                                <td><?php echo $month; ?></td>
                                <td><?php echo $transaction_number; ?></td>
                                <td><?php echo $amount; ?></td>
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