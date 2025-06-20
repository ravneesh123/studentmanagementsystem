<?php include('database.php'); ?>  
<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $sql = "DELETE from student_marks WHERE id = '".$id."'";
    
    if ($conn->query($sql) === TRUE) {
            header('Location: studentMarks.php?success=1&id='.$student_id);
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

?>