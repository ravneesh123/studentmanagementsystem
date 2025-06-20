<?php include('header.php'); ?>
<?php include('database.php'); 

if(isset($_GET['id'])){
    $student_id = $_GET['id'];
    
    $studentInfoSql = "SELECT name FROM studentsinfo WHERE id = '$student_id'";
    $studentInfoResult = $conn->query($studentInfoSql);
    $student_name = "";
    if ($studentInfoResult && mysqli_num_rows($studentInfoResult) > 0) {
        $studentInfoRow = mysqli_fetch_assoc($studentInfoResult);
        $student_name = $studentInfoRow['name'];
    }
?>
    <div class="maincontainer">
        <div class="heading1">
            <h2>View Student Marks</h2>
            <a href="create-marks.php?id=<?= $student_id; ?>">Add Marks</a>
        </div>
        <div class="all-course">
            <?php
                $sql = "SELECT student_marks.*, subjects.subject_name 
                        FROM student_marks 
                        INNER JOIN subjects ON student_marks.subject_id = subjects.id 
                        WHERE student_marks.student_id = '$student_id'";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>student_id</th>";
                    echo "<th>student_name</th>";
                    echo "<th>Subject Name</th>";  
                    echo "<th>marks</th>"; 
                    echo "<th colspan='2'>Action</th>";
                    echo "</tr>";
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['student_id'] . "</td>"; 
                        echo "<td>" . $student_name . "</td>"; 
                        echo "<td>" . $row['subject_name'] . "</td>";
                        echo "<td>" . $row['marks'] . "</td>";
                        echo "<td><a href='editmarks.php?id=".$row["id"]."'>Edit</a></td>";
                        echo "<td><a href='deletemarks.php?id=".$row["id"]."' onclick=\"return confirm('Are you sure you want to delete this subject?');\">Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No data available at this moment.";
                }
            ?>
        </div>
    </div>
<?php } ?>
<?php include('footer.php'); ?>
