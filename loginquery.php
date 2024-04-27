<?php
include("class.php");
query::DBconnect();

// Validate and sanitize user input
$name = isset($_POST['name']) ? $_POST['name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //echo "ho";
    // Assuming 'selectAll' method returns a result, store it in a variable
    $data = array();
    $data[] = "Name='$name'";
    $data[] .= "Password='$password'";
    $where_clause = implode(' AND ', $data);

    $alldata=query::selectAll('User', $where_clause);
    header("location:table.php");
    // echo "hi";
    while($user = $alldata->fetch_all()){
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }
}

?>