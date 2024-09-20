<?php
$idu = $_GET['idu'];
include "fonction.php";
$conn = Connect();
$req = "DELETE FROM student  WHERE stu_id='$idu'";
$res = $conn->query($req);
if ($res){
    header('location:manage_team.php');
}
?>