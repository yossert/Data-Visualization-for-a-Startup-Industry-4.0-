<?php
$id = $_POST['ida'];
$email = $_POST['mail'];
$occ = $_POST['occ'];
include "fonction.php";
$conn = Connect();
$req = "UPDATE admin SET admin_email='$email',admin_occ='$occ' WHERE admin_id='$id' ";
$res = $conn->query($req);
if ($res){
    header('location:add_admin.php');
}
?>