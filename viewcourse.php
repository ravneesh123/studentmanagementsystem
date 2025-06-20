<?php include('header.php'); ?>
<div class= "maincontainer">
    <div class="heading1">
        <h2>View Employee</h2>
    </div>
    <div class="all-course">
        <?php include('database.php'); ?>
        <?php
        if( isset($_GET["id"]) ){
            $id = $_GET["id"];

            $stmt = "SELECT * FROM courses WHERE id = $id";
            $result = $conn->query($stmt);
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>course</th>";
                echo "<th>year</th>";
                echo "<th>Fees</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "<td>" . $row['Fees'] . "</td>";

                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No result";
            }
        }
        ?>
    </div>
</div>

<?php include('footer.php'); ?>