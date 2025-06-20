<?php include('header.php'); ?>
<?php include('database.php'); ?>
<div class= "maincontainer">
    <div class= "heading1">
        <h1>Course</h1>     
    </div>
    <div class="all-course">
        <?php 
        $sql = "SELECT * FROM courses";
        // $sql = "SELECT courses.* , subjects.subject_name FROM courses INNER JOIN subjects ON courses.id = subjects.course GROUP BY subjects.course";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr>";
            echo "<th>S No</th>";
            echo "<th>Name</th>";
            echo "<th>Years</th>";
            echo "<th>Fee</th>";
            
            echo "<th colspan= 3>Action</th>";
            echo "</tr>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                // echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['Fees'] . "</td>";


                echo  "<td><a href='viewcourse.php?id=".$row["id"]."'>View</a></td>";
                echo  "<td><a href='editcourse.php?id=".$row["id"]."'>Edit</a></td>";
                echo "<td><a href='deletecourse.php?id=".$row["id"]."' onclick=\"return confirm('Are you sure you want to delete this employee?');\">Delete</a></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
            } else {
                echo "No course available at this moment.";
            }
        ?>
    </div>
</div>


<?php include('footer.php'); ?>

                            