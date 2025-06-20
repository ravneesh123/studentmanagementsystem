<?php include('header.php'); ?>
<?php include('database.php'); ?>
<?php
if(isset($_GET['id'])){
    $student_id = $_GET['id'];
    $sql = "SELECT name, course_id FROM studentsinfo where id = '".$student_id."'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // $student_name = $row['name'];
            $course_id = $row['course_id'];
            $subjectsQuery = "SELECT * FROM subjects WHERE course = $course_id";
            $subjectsResult = $conn->query($subjectsQuery);
            
        }
    }
    ?>
    <div class="maincontainer">
        <div class="heading1">
            <h1>Create Marks</h1>
        </div>
        <div class="marks">
            <form method="POST" action="marksdb.php">
                <div class = "feild">
                    <label>Subjects :</label>
                    <select name = "subject">
                        <option value= "">--Select--</option>
                        <?php
                        if ($subjectsResult && $subjectsResult->num_rows > 0) {
                            while ($subjectRow = $subjectsResult->fetch_assoc()) {
                                echo "<option value='" . $subjectRow['id'] . "'>" . $subjectRow['subject_name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No subjects found</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class = "feild">
                    <label>Marks : </label>
                    <input type = "number" name="marks" />
                    <input type="hidden" name="student_id" value="<?php echo $student_id; ?>"/>
                </div>
                <div class="field">
                    <input type="submit" value="Submit"/>
                </div>
            </form>
        </div>
    </div>

    <?php
} ?>
<?php include('footer.php'); ?>