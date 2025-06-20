<?php include('database.php');?> 
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $target_dir = "uploads/";
    $filename = pathinfo($_FILES["profileImage"]["name"], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES["profileImage"]["name"], PATHINFO_EXTENSION);
    $counter = 0;
    $new_name = $filename . '.' . $extension;
    $target_file = $target_dir . $new_name;

    while (file_exists($target_file)) {
        $counter++;
        $new_name = $filename . '_' . $counter . '.' . $extension; 
        $target_file = $target_dir . $new_name;
    }

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["profileImage"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $courseid = $_POST['course'];
    $joining_year = $_POST['year'];
    $profile_image = $target_file;


    $stmt = "INSERT INTO studentsinfo (name, fname, mname, mobile_number, dob, email, address, course_id, joining_year, profile_image)
        VALUES ('$name', '$fname', '$mname', '$number', '$dob', '$email', '$address', '$courseid', '$joining_year', '$profile_image')";
        if ($conn->query($stmt) === TRUE) {
            header('Location: create_studentinfo.php?success=1');
        } else {
            echo "Error: " . $conn->error;
        }
}
?>