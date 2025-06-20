<!-- subjectDB.php -->
<?php include('database.php');?> 
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $course = $_POST['coursename'];
    $subject = $_POST['coursesubjects'];


    $stmt = "INSERT INTO subjects (course , subject_name) VALUES ('$course', '$subject')";
        if ($conn->query($stmt) === TRUE) {
            header('Location: create-subject.php?success=1');
        } else {
            echo "Error: " . $conn->error;
        }
}
?>