<?php
$idu = $_GET['idcontact'];
include "fonction.php";
$conn = Connect();
$req = "DELETE FROM contact  WHERE contact_id='$idu'";
$res = $conn->query($req);
if ($res){
    header('location:contacts.php');
}
?>