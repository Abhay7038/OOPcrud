<?php
include("class.php");

// Validate and sanitize user input
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$file_name = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if all required fields are provided
if (!empty($name) && !empty($email) && !empty($file_name) && !empty($password)) {
    // File upload handling
    $file_tmp = $_FILES['file']['tmp_name'];
    $upload_dir = 'uploads/'; // Define your upload directory
    $target_file = $upload_dir . basename($file_name);
    
    if (move_uploaded_file($file_tmp, $target_file)) {
        // File uploaded successfully, proceed with database insertion
        $data = array(
            'Name' => $name,
            'Email' => $email,
            'File' => $file_name,
            'Password' => $password
        );

        // Insert data into the database
        query::DBconnect();
        query::insert('User', $data);

        // Redirect to login page after successful insertion
        header('Location: login.php');
        exit;
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "All fields are required.";
}
?>
