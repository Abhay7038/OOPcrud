<?php
include("class.php");

// Validate and sanitize user input
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$file_name = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if all required fields are provided
if (!empty($name) && !empty($email) && !empty($file_name) && !empty($password)) {
    
    // File uploaded successfully, proceed with database insertion
    $data = array(
        'Name' => $name,
        'Email' => $email,
        'File' => $file_name,
        'Password' => $password
    );

    // Insert data into the database
    validation::imageupload('User',$data,'login.php');

} else {
    echo "All fields are required.";
}
?>
