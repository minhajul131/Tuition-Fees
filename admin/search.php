<?php require('includes/header.php'); ?>

<section>
    <div class= "container">
        <?php 

            //Get the Search Keyword
            // $search = $_POST['search'];
            $search = mysqli_real_escape_string($conn, $_POST['search']);            
        ?>

        <h2 class = "text-center">Students on Your Search "<?php echo $search; ?>"</h2>
    </div>
</section>

<section >
    <div class= "container">

        <h2 >Students Information</h2>
        <br><br>

        <table class="table-full">
            <thead>
                <td> Student ID </td>
                <td>Student Name</td>
                <td>Contact Number</td>
                <td> Month </td>
                <td> Transiction Number</td>
                <td> Amount </td>
            </thead>

            <?php 
                //SQL Query to Get foods based on search keyword               
                $sql = "SELECT st.*,tf.* FROM student_table st, tuition_fees tf WHERE st.student_id=tf.student_id AND tf.month LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0){ 

                    while($row=mysqli_fetch_assoc($res)){

                        //Get the details
                        $student_id = $row['student_id'];
                        $full_name = $row['full_name'];
                        $contact_number = $row['contact_number'];
                        $month = $row['month'];
                        $transaction_number = $row['transaction_number'];
                        $amount = $row['amount'];
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
                else
                {
                    // Not Available
                    echo "<div class='error'>Student not found.</div>";
                    echo "<br>";
                }
            
            ?>
        </table>
    </div>
</section>

<?php require('includes/footer.php'); ?>