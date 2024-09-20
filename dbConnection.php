<?php 
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="miniprojet";

//create connection

$conn=new mysqli($db_host, $db_user,$db_password,$db_name);

//ckek connection

if($conn ->connect_error){
    die("connection failed");
}
//else{
//    echo"connected";
// }
?>