<?php include('database.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] ===  'POST') {
    $id = $_POST['id'];
    $course = $_POST['courseName'];
    $years = $_POST['courseYears'];
    $Fee = $_POST['courseFee'];

    $qry = "UPDATE courses SET course = '$course', year = '$years' , Fees = '$Fee' WHERE id = '$id'";
        // echo $qry;
        if ($conn->query($qry) === TRUE) {
            header('Location: course.php?success=1');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    $conn->close();

}
