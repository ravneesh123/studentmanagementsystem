<?php include('header.php'); ?>

<?php include('database.php'); ?>
<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $sql = "SELECT * FROM subjects WHERE id = '".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $id = "";
        $course = "";
        $subject_name = "";
        
        while ($row = $result->fetch_assoc()) {
            $course_id = $row['course'];
            $courseQuery = "SELECT course FROM courses WHERE id = $course_id";
            $courseResult = $conn->query($courseQuery);
            $courseRow = mysqli_fetch_assoc($courseResult);
            $courseName = isset($courseRow['course']) ? $courseRow['course'] : 'Unknown';


            $id = $row["id"];
            $course = $row["course"];
            $subject_name = $row["subject_name"];
            ?>
            <div class= "maincontainer">
                <div class="heading1">
                    <h2>Edit Subjects</h2>
                </div>
                <div class="course-create-form">
                    <form method="POST" action="updatesubject.php">
                        <div class="field-set">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <div class="field-set">
                            <label>Course Name</label>
                            <input type="text" name="courseName" value="<?php echo $courseName ; ?>">
                        </div>
                        <div class="field-set">
                            <label>Course subjects</label>
                            <input type="text" name="coursesubjects" value="<?php echo $subject_name; ?>">
                        </div>
                        
                        <div class="field-set">
                            <input type="submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        
    } else {
        echo "No record found.";
    }
      $conn->close();
    }
    ?>
    </div>
<?php include('footer.php'); ?>
