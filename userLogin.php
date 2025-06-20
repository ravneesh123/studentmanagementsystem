<?php 
session_start();
include('database.php');

if(isset($_POST['username'])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $stmt = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

         header('Location: index.php?success=1');
    } else {
        header('Location: login.php?Not exists');
    }
}
?>