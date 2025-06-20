<?php
session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <h2>Collage Name</h2>
                </div>
                <div class="user">
                    <?php if(isset($_SESSION['username'])): 
                      echo $_SESSION['username']; ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="#">Course</a>
                            <ul>
                                <li><a href="create-course.php">Create Course</a></li>
                                <li><a href="course.php">Course</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Subjects</a>
                            <ul>
                                <li><a href="create-subject.php">Create Subjects</a></li>
                                <li><a href="subject.php">Subjects</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Student Information</a>
                            <ul>
                                <li><a href="create_studentinfo.php">Create Student Info</a></li>
                                <li><a href="studentinfo.php">Student Info</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Textarea</a>
                            <ul>
                                <li><a href="textarea.php">Textarea Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href = 'register.php'>Register</a>
                            <ul>
                                <li><a href="login.php">Login</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>