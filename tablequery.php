<?php
include("class.php");
query::DBconnect();
$result = query::selectAll('User', '1');
$userdata = array(); // Initialize an array to store fetched data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userdata[] = $row; // Append each row to the $userdata array
    }
}
?>