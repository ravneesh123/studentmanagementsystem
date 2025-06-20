<?php
include('database.php');

$sql = $_POST['query'];
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $i = 1;
    while ($i < count($data)) { 
        if ($i == 0 || $data[$i - 1]['joining_year'] <= $data[$i]['joining_year']) {
            $i++;
        } else {
            $temp = $data[$i];
            $data[$i] = $data[$i-1];
            $data[$i - 1] = $temp;
            $i++; 
        }
    }
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
return $data;
?>
