<?php include('database.php');?> 
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject'];
    $marks = $_POST['marks'];

    $stmt = "INSERT INTO student_marks (student_id , subject_id , marks ) VALUES ('$student_id', '$subject_id', '$marks')";
        if ($conn->query($stmt) === TRUE) {
            header('Location: create-marks.php?success=1&id='.$student_id);
        } else {
            echo "Error: " . $conn->error;
        }
}
?>