<?php include('header.php'); ?>
<?php include('database.php'); ?>
<div class= "maincontainer">
    <div class="heading1">
        <h1>Subjects</h1>     
    </div>

    <div class="all-course">
        <?php 
        $sql = "SELECT * FROM subjects";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>S No</th>";
            echo "<th>Course</th>"; 
            echo "<th>Subject Name</th>"; 
            echo "<th colspan='3'>Action</th>";
            echo "</tr>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $course_id = $row['course'];
                $courseQuery = "SELECT course FROM courses WHERE id = $course_id";
                $courseResult = $conn->query($courseQuery);
                $courseRow = mysqli_fetch_assoc($courseResult);
                $courseName = isset($courseRow['course']) ? $courseRow['course'] : 'Unknown';
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $courseName . "</td>"; 
                echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td><a href='viewsubject.php?id=".$row["id"]."'>View</a></td>";
                echo "<td><a href='editsubject.php?id=".$row["id"]."'>Edit</a></td>";
                echo "<td><a href='deletesubject.php?id=".$row["id"]."' onclick=\"return confirm('Are you sure you want to delete this subject?');\">Delete</a></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "No subjects available at this moment.";
        }
        ?>
    </div>
</div>

<?php include('footer.php'); ?>
