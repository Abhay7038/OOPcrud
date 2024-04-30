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
if(isset($_GET['del'])){
    // Validate and sanitize input
    $id = $_GET['del'];
    // Construct WHERE clause for deletion
    $where_clause = "ID=$id";
    // Call the delete method
    query::delete('User', $where_clause);
}
?>