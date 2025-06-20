<?php include('header.php'); ?>
<?php include('database.php'); ?>
<div class= "maincontainer">
    <div class= "heading1">
        <h1>Student Data</h1>     
    </div>
    <div class="all-course">
        <?php
        if( isset($_GET["id"]) ){
            $id = $_GET["id"];
        $sql = "SELECT * FROM studentsinfo WHERE id = $id";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Name</th>";
            echo "<th>fname</th>";
            echo "<th>mname</th>";            
            echo "<th>mobile_number</th>";
            echo "<th>dob</th>";            
            echo "<th>email</th>";
            echo "<th>address</th>";            
            echo "<th>course_id</th>";
            echo "<th>joining_year</th>";
            echo "<th>profile_image</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['mname'] . "</td>";
                echo "<td>" . $row['mobile_number'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['joining_year'] . "</td>";
                echo "<td><img src='" . $row['profile_image'] . "' alt='Profile Image' width='200' height='150'></td>";

                echo "</tr>";
            }
            echo "</table>";
            } else {
                echo "No student data is available at this moment.";
            }
        }
        ?>
        
    </div>
</div>


<?php include('footer.php'); ?>