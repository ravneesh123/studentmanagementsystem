<?php include('database.php');?> 
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $course = $_POST['courseName'];
    $years = $_POST['courseYears'];
    $Fee = $_POST['courseFee'];

    $stmt = "INSERT INTO courses (course , year , fees) VALUES ('$course', '$years', '$Fee')";
        if ($conn->query($stmt) === TRUE) {
            header('Location: create-course.php?success=1');
        } else {
            echo "Error: " . $conn->error;
        }
}
?>