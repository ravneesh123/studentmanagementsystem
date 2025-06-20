<?php
$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWARD = "";

$conn = new mysqli($SERVERNAME,$USERNAME,$PASSWARD,"studentmanagement");
if($conn->connect_error){
    die("connection failed" . $conn->connect_error);
}

// CREATE DATABASE 
// $sql = "CREATE DATABASE studentmanagement";
// if($conn->query($sql)=== TRUE){
//     echo "Database created successfully";
// }else {
//     echo "Error creating database: " . $conn->error;
// }

// CREATE TABLE
// $tableQry = "CREATE TABLE IF NOT EXISTS courses(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     course varchar(50) NOT NULL,
//     year INT(4),
//     Fees varchar(11)
// )";
// if ($conn->query($tableQry) === TRUE) {
//     echo "Table created successfully";
// }

// $tableQry = "ALTER TABLE courses ADD subject_name VARCHAR(255)";
// if ($conn->query($tableQry) === TRUE) {
//     echo "Column added successfully.";
// } else {
//     echo "Error adding column: " . $conn->error;
// }

// create table subjects
// $tableQry = "CREATE TABLE IF NOT EXISTS subjects(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     course varchar(50) NOT NULL,     
//     subject_name varchar(255)
//  )";
// if ($conn->query($tableQry) === TRUE) {
//     echo "Table created successfully";
// }


// create table student info
// $tableQry = "CREATE TABLE IF NOT EXISTS studentsinfo(
//         id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         name VARCHAR(100),
//         fname VARCHAR(100),
//         mname VARCHAR(100),
//         mobile_number VARCHAR(15),
//         dob DATE,
//         email VARCHAR(100),
//         address TEXT,
//         course_id INT,
//         joining_year VARCHAR(10),
//         profile_image VARCHAR(255),
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// if($conn->query($tableQry)===TRUE){
//     echo "Table created successfully";
// }



?>