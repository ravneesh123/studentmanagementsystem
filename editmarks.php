<?php include('header.php'); ?>
<?php include('database.php'); ?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch student_marks record
    $sql = "SELECT * FROM student_marks WHERE id = '".$id."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $id = "";
        $student_id = "";
        $Subject_id = "";
        $marks = "";

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $student_id = $row['student_id'];
            $Subject_id = $row['subject_id'];
            $marks = $row['marks'];
        }

        $studentSql = "SELECT course_id FROM studentsinfo WHERE id = '$student_id'";
        $studentResult = $conn->query($studentSql);
        if ($studentResult && $studentResult->num_rows > 0) {
            $studentRow = $studentResult->fetch_assoc();
            $course_id = $studentRow['course_id'];

            $subjectsQuery = "SELECT * FROM subjects WHERE course = $course_id";
            $subjectsResult = $conn->query($subjectsQuery);
        }
?>

<div class="maincontainer">
    <div class="heading1">
        <h1>Edit Marks</h1>
    </div>
    <div class="marks">
        <form method="POST" action="updatemarks.php">
            <div class="field-set">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="feild">
                <label>Subjects :</label>
                <select name="subject">
                    <option value="">--Select--</option>
                    <?php
                    if (isset($subjectsResult) && $subjectsResult->num_rows > 0) {
                        while ($subjectRow = $subjectsResult->fetch_assoc()) {
                            $selected = ($subjectRow['id'] == $Subject_id) ? "selected" : "";
                            echo "<option value='" . $subjectRow['id'] . "' $selected>" . $subjectRow['subject_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No subjects found</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="feild">
                <label>Marks : </label>
                <input type="number" name="marks" value="<?php echo $marks; ?>">
                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>"/>
            </div>
            <div class="field">
                <input type="submit" value="Submit"/>
            </div>
        </form>
    </div>
</div>

<?php
    } else {
        echo "No record found.";
    }
    $conn->close();
}
?>
<?php include('footer.php'); ?>
