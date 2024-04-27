<?php 
include ("class.php");

//Db connection 
query::DBconnect();

//Insert query
$data=array(
    'Name'=>$_POST['name'],
    'Email'=>$_POST['email'],
    'File'=>$_FILES['file']['name'],
    'Password'=>$_POST['password']
);
query::insert('User',$data);