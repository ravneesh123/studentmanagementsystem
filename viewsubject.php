<?php include('header.php'); ?>
<div class= "maincontainer">
    <div class="heading1">
        <h2>View Subjects</h2>
    </div>
    <div class="all-course">
    <?php include('database.php'); ?>
    <?php
    if( isset($_GET["id"]) ){
        $id = $_GET["id"];

        $stmt = "SELECT * FROM subjects WHERE id = $id";
        $result = $conn->query($stmt);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>course</th>";
            echo "<th>subject_name</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course'];
                $courseQuery = "SELECT course FROM courses WHERE id = $course_id";
                $courseResult = $conn->query($courseQuery);
                $courseRow = mysqli_fetch_assoc($courseResult);
                $courseName = isset($courseRow['course']) ? $courseRow['course'] : 'Unknown';
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $courseName . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No result";
        }
    }
    ?>
    </div>
</div>

<?php include('footer.php'); ?>