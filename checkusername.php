<?php include('database.php');
if (isset($_POST['query'])) {
    $username = $_POST['query'];

    $stmt= "SELECT username FROM user WHERE username = '$username'";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0){
        echo 'exists';
    }else{
        echo 'NOT exists';
    }
}
?>