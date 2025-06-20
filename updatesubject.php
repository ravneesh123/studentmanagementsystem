<?php include('database.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] ===  'POST') {
    $id = $_POST['id'];
    $course = $_POST['courseName'];
    $subject_name = $_POST['coursesubjects'];

    $qry = "UPDATE subjects SET course = '$course', subject_name = '$subject_name' WHERE id = '$id'";
        // echo $qry;
        if ($conn->query($qry) === TRUE) {
            header('Location: subject.php?success=1');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    $conn->close();

}
