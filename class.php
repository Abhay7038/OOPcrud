<?php
class query{
    private static $conn; // Define $conn as a class property

    public function __construct(){
        self::$conn = new mysqli('localhost','root','','OOPcrud');
        if(self::$conn->connect_error){
            die(''. self::$conn->connect_error);
        }else{
            // echo "Connected";
        }
    }

    public static function selectAll($table, $data) {
        $sql = "SELECT * FROM $table WHERE $data"; // Remove unnecessary quotes around $table
        $result = self::$conn->query($sql); // Use self::$conn to access the class property
        //echo $sql;  
        if ($result === FALSE) {
            die('Query execution error: ' . self::$conn->error);
        }
        
        return $result;
    }
    

    public static function insert($table, $data){
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO ".$table." ($columns) VALUES ($values)";
        $result = self::$conn->query($sql);
        if ($result === FALSE) {
            die('Insertion error: ' . self::$conn->error);
        }
        return $result;
    }

    public static function update($table, $data, $condition){
        $updates = [];
        foreach ($data as $column => $value) {
            $updates[] = "$column = '$value'";
        }
        $updateString = implode(", ", $updates);
        $sql = "UPDATE ".$table." SET ".$updateString." WHERE ".$condition;
        $result = self::$conn->query($sql);
        if ($result === FALSE) {
            die('Update error: ' . self::$conn->error);
        }
        return $result;
    }

    public static function delete($table, $condition){
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
        // echo $sql;
        $result = self::$conn->query($sql);
        if ($result === FALSE) {
            die('Delete error: ' . self::$conn->error);
        }
        return $result;
    }
}

$db = new query();

class validation extends query{

    public static function imageupload($table, $data, $headerfile) {
        // Define the target directory
        $targetdir = 'uploads/';
    
        // Check if the file has been uploaded
        if ($_FILES['file']['size'] > 0) {
            // Check if the target directory exists, create it if not
            if (!file_exists($targetdir)) {
                mkdir($targetdir, 0777, true); // Recursive directory creation
            }
    
            $targetfile = $targetdir . $_FILES['file']['name'];
    
            // Handle filename collision
            if (file_exists($targetfile)) {
                echo "File already exists.";
            } else {
                // Attempt to move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
                    // Insert data into the database
                    query::insert($table, $data);
                    // Redirect to the specified header file
                    header('Location: ' . $headerfile);
                    exit;
                } else {
                    echo "Image not uploaded.";
                }
            }
        } else {
            echo "Not a file.";
        }
    }
    
}
?>
