<?php include('database.php'); ?>  
<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $sql = "DELETE from subjects WHERE id = '".$id."'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: subject.php?success=1');
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

?>