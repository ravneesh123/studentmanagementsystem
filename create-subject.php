<!-- create-subject.php -->
<?php include('header.php'); ?>
<?php include('database.php'); 
$sql = "SELECT id, course FROM courses"; 
$result = $conn->query($sql);
?>
<div class= "maincontainer">
    <div class="heading1">
        <h2>subjects</h2>
    </div>
    <div class="course-create-form">
        <form method="POST" action="subjectDB.php">
            <div class="field-set">
                <label>Select Course</label>
                <select name="coursename" required>
                    <option value="">Select Course</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['course'] . "</option>"; 
                    }
                    ?>
                </select>
            </div>
            <div class="field-set">
                <label>Course subjects</label>
                <input type="text" name="coursesubjects" required/>
            </div>
            <div class="field-set">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>