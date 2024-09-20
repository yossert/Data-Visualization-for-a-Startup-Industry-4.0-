<?php
$id = $_POST['idc'];
$email = $_POST['mail'];
$occ = $_POST['occ'];
include "fonction.php";
$conn = Connect();

$req = "UPDATE student SET stu_email='$email',stu_occ='$occ' WHERE stu_id='$id' ";
$res = $conn->query($req);

    header('location:manage_team.php');
    if ($conn ->query($sql)== TRUE){
        echo json_encode("OK");
    }
    else {
        echo json_encode("Failed");
    }


?>
