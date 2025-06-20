<?php include('header.php'); ?>
<div class= "maincontainer">
    <div class="heading1">
        <h2>Create Your Course</h2>
    </div>
    <div class="course-create-form">
        <form method="POST" action="createCourseDB.php">
            <div class="field-set">
                <label>Course Name</label>
                <input type="text" name="courseName" required/>
            </div>
            <div class="field-set">
                <label>Course Years</label>
                <input type="number" name="courseYears" required/>
            </div>
            <div class="field-set">
                <label>Course Fee</label>
                <input type="number" name="courseFee" required/>
            </div>
            
            <div class="field-set">
                <input type="submit" value="Create Course"/>
            </div>
        </form>
    </div>
</div
<?php include('footer.php'); ?>

