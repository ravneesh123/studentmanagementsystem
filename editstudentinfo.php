<?php include('header.php'); ?>

<?php include('database.php'); ?>
<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $sql = "SELECT * FROM studentsinfo WHERE id = '".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $id = "";
        $name = "";
        $fname = "";
        $mname = "";
        $number = "";
        $dob = "";
        $email = "";
        $address = "";
        $courseid = "";
        $joining_year = "";
        $profile_image = "";
        
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];
            $fname = $row["fname"];
            $mname  = $row["mname"];
            $number = $row["mobile_number"];
            $dob = $row["dob"];
            $email = $row["email"];
            $address  = $row["address"];
            $courseid = $row["course_id"];
            $joining_year = $row["joining_year"];
            $profile_image  = $row["profile_image"];
            ?>
            <div class= "maincontainer">
                <div class= "heading1">
                    <h2>Student Information</h2>
                </div>
                <div class="studentform">
                    <form method="POST" action="updatestudentinfo.php" enctype="multipart/form-data">
                        <div class="field-set">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <div class="field-set">
                            <label>Name : </label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="field-set">
                            <label>Father Name :</label>
                            <input type="text" name="fname" value="<?php echo $fname; ?>">
                        </div>
                        <div class="field-set">
                            <label>Mother Name :</label>
                            <input type="text" name="mname"value="<?php echo $mname; ?>">
                        </div>
                        <div class="field-set">
                            <label>Mobile Number :</label>
                            <input type="number" name="number" value="<?php echo $number; ?>">
                        </div>
                        <div class="field-set">
                            <label>Date Of Birth :</label>
                            <input type="date" name="dob"value="<?php echo $dob; ?>">
                        </div>
                        <div class="field-set">
                            <label>Email :</label>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="field-set">
                            <label>Address :</label>
                            <input type="text" name="address" value="<?php echo $address; ?>">
                        </div>
                        <div class="field-set">
                            <label>Course :</label>
                        <select name="course" class="courses">
                                <option value="">--Select your course--</option>
                                <?php
                                $sql1 = "SELECT * FROM courses ORDER BY course ASC";
                                $result1 = $conn->query($sql1);
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if($row1["id"] == $courseid){
                                        echo "<option value='".$row1['id']."' selected>".$row1['course']."</option>";
                                    }else{
                                        echo "<option value='".$row1['id']."'>".$row1['course']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="field-set">
                            <label>Joining Year :</label>
                            <input type="text" name="year"value="<?php echo $joining_year; ?>">
                        </div>
                        <div class="field-set">
                            <label>Profile Image :</label>
                            <input type="file" name="profileImage" accept=".jpg,.jpeg,.png" value="<?php echo $profile_image; ?>">
                        </div>
                        <div class="field-set">
                            <input type="submit" value="Submit"/>
                        </div>

                    </form>
                </div>
             <?php
                }
                
            } else {
                echo "No record found.";
            }
            $conn->close();
            }

            ?>
        </div>

<?php include('footer.php'); ?>