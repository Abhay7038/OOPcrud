<?php 
include("class.php");
query::DBconnect();
$result=query::selectAll('User','1');
if($result->num_rows>0){
    while($data[] = $result->fetch_assoc()) {
         $data; // Append each row to the $userdata array
        
    }
}
?>