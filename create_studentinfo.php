<?php include('header.php'); ?>
<?php include('database.php'); 

$sql = "SELECT * FROM courses ORDER BY course ASC";
$result = $conn->query($sql);
?>
<div class= "maincontainer">
    <div class= "heading1">
        <h2>Student Information</h2>
    </div>
    <div class="studentform">
        <form method="POST" action="studentDB.php" enctype="multipart/form-data">
            <div class="field-set">
                <label>Name : </label>
                <input type="text" name="name" required/>
            </div>
            <div class="field-set">
                <label>Father Name :</label>
                <input type="text" name="fname" required/>
            </div>
            <div class="field-set">
                <label>Mother Name :</label>
                <input type="text" name="mname" required/>
            </div>
            <div class="field-set">
                <label>Mobile Number :</label>
                <input type="number" name="number" required/>
            </div>
            <div class="field-set">
                <label>Date Of Birth :</label>
                <input type="date" name="dob" />
            </div>
            <div class="field-set">
                <label>Email :</label>
                <input type="email" name="email" required/>
            </div>
            <div class="field-set">
                <label>Address :</label>
                <input type="text" name="address" required/>
            </div>
            <div class="field-set">
                <label>Course :</label>
            <select name="course" class="courses">
                    <option value="">--Select your course--</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id']."'>".$row['course']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="field-set">
                <label>Joining Year :</label>
                <input type="text" name="year" required/>
            </div>
            <div class="field-set">
                <label>Profile Image :</label>
                <input type="file" name="profileImage" accept=".jpg,.jpeg,.png" />
            </div>
            <div class="field-set">
                <input type="submit" value="Submit"/>
            </div>

        </form>
    </div>
</div>


<?php include('footer.php'); ?>