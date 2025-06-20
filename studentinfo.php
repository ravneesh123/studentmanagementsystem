<?php include('header.php'); ?>
<?php include('database.php'); ?>
<div class= "maincontainer">
    <div class= "heading1">
        <h1>Student Data</h1>     
    </div>
    <div class="all-course">
        <?php 
        $role = 'student';
        $sql = "SELECT * FROM studentsinfo";
        $sql = "SELECT studentsinfo.* , courses.course FROM studentsinfo INNER JOIN courses ON studentsinfo.course_id = courses.id";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>S No</th>";
            echo "<th>Name</th>";
            echo "<th>fname</th>";
            echo "<th>mname</th>";            
            echo "<th>mobile_number</th>";
            echo "<th>dob</th>";            
            echo "<th>email</th>";
            echo "<th>address</th>";            
            echo "<th>course</th>";
            echo "<th>joining_year</th>";
            echo "<th>profile_image</th>";
            echo "<th colspan= 3>Action</th>";
            echo "</tr>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $course_id = $row['course_id'];
                // $courseQuery = "SELECT course FROM courses WHERE id = $course_id";
                // $courseResult = $conn->query($courseQuery);
                // $courseRow = mysqli_fetch_assoc($courseResult);
                // $courseName = isset($courseRow['course']) ? $courseRow['course'] : 'Unknown';
                
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['mname'] . "</td>";
                echo "<td>" . $row['mobile_number'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['joining_year'] . "</td>";
                echo "<td>" . $row['profile_image'] . "</td>";

                echo  "<td><a href='viewstudentinfo.php?id=".$row["id"]."'>View</a></td>";
                echo  "<td><a href='editstudentinfo.php?id=".$row["id"]."'>Edit</a></td>";
                if($role == 'admin'){
                    
                }
                echo  "<td><a href='studentMarks.php?id=".$row["id"]."'>Marks</a></td>";
                echo "<td><a href='deletestudentinfo.php?id=".$row["id"]."' onclick=\"return confirm('Are you sure you want to delete this employee?');\">Delete</a></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
            } else {
                echo "No student data is available at this moment.";
            }
        ?>
    </div>
</div>


<?php include('footer.php'); ?>