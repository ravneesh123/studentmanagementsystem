<?php include('header.php'); ?>

<?php include('database.php'); ?>
<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $sql = "SELECT * FROM courses WHERE id = '".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $id = "";
        $course = "";
        $years = "";
        $Fee = "";
        
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $course = $row["course"];
            $years = $row["year"];
            $Fee = $row["Fees"];
            ?>
            <div class= "maincontainer">
                <div class="heading1">
                    <h2>Edit Your Course</h2>
                </div>

                <div class="course-create-form">
                    <form method="POST" action="updatecourse.php">
                        <div class="field-set">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <div class="field-set">
                            <label>Course Name</label>
                            <input type="text" name="courseName" value="<?php echo $course; ?>" required/>
                        </div>
                        <div class="field-set">
                            <label>Course Years</label>
                            <input type="number" name="courseYears" value="<?php echo $years; ?>" required/>
                        </div>
                        <div class="field-set">
                            <label>Course Fee</label>
                            <input type="number" name="courseFee" value="<?php echo $Fee; ?>" required/>
                        </div>
                        
                        <div class="field-set">
                            <input type="submit" value="Update Course"/>
                        </div>
                    </form>
                </div>
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
