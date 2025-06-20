<?php include('database.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] ===  'POST') {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject'];
    $marks = $_POST['marks'];

    $qry = "UPDATE student_marks SET student_id = '$student_id', subject_id = '$subject_id' , marks = '$marks' WHERE id = '$id'";
        // echo $qry;
        if ($conn->query($qry) === TRUE) {
            header('Location: studentMarks.php?success=1&id='.$student_id);
        } else {
            echo "Error updating record: " . $conn->error;
        }
    $conn->close();

}