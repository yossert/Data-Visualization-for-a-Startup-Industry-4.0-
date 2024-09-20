<?php
function getAllUsers()
{
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = "select * from student";
    $resultat = $conn->query($req);
    $users = $resultat->fetchAll();
    return $users;
}
?>