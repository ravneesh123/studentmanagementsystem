<?php include('database.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] ===  'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $courseid = $_POST['course'];
    $joining_year = $_POST['year'];

    $sql = "SELECT profile_image FROM studentsinfo WHERE id = '$id'";
    $result = $conn->query($sql);
    $oldImage = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldImage = $row['profile_image'];
    }
    $profileImage = $oldImage;
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] === 0) {
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
            $profileImagePath = $target_file;

            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            echo "Error uploading new image.";
            exit;
        }
        $qry = "UPDATE studentsinfo SET name = '$name', fname= '$fname' , mname = '$mname' , mobile_number = '$number' , dob = '$dob' , email = '$email' ,address = '$address'  , course_id = '$courseid' , joining_year = '$joining_year' , profile_image = '$profileImagePath' WHERE id = '$id'";
    }else{
        $qry = "UPDATE studentsinfo SET name = '$name', fname= '$fname' , mname = '$mname' , mobile_number = '$number' , dob = '$dob' , email = '$email' ,address = '$address'  , course_id = '$courseid' , joining_year = '$joining_year'  WHERE id = '$id'";
    }

        // echo $qry;
        if ($conn->query($qry) === TRUE) {
            header('Location: studentinfo.php?success=1');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    $conn->close();

}