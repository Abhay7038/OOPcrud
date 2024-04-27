<?php
class query{
    private static $conn; // Define $conn as a class property

    public static function DBconnect(){
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
        $result = self::$conn->query($sql);
        if ($result === FALSE) {
            die('Delete error: ' . self::$conn->error);
        }
        return $result;
    }
}
?>
