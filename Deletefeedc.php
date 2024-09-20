<?php
$f_id = $_GET['f_id'];
include "fonction.php";
$conn = Connect();
$req = "DELETE FROM feedback  WHERE f_id='$f_id'";
$res = $conn->query($req);
if ($res){
    header('location:contacts.php');
}
?>