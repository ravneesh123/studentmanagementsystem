<?php include('database.php');?> 
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    

    $stmt = "INSERT INTO user (username, password , email) VALUE('$username' , '$password' , '$email')";
    if ($conn->query($stmt) === TRUE) {
            header('Location: register.php?success=1');
        } else {
            echo "Error: " . $conn->error;
        }
}
    


