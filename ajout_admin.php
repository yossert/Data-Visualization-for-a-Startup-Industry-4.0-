<?php
// Récupération de l'ID de l'utilisateur à déplacer
$servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function gettAllAdmin(){
    $id = $_GET['ida'];
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = "select * from student WHERE stu_id = '$id'";
    $resultat = $conn->query($req);
    $usera = $resultat->fetchAll();
    return $usera;
}
$usera = gettAllAdmin();
$id = $_GET['ida'];
foreach ($usera as $usr) {
    // Accéder aux champs de chaque utilisateur
    
    $stu_name = $usr['stu_name'];
    $stu_email = $usr['stu_email'];
    $stu_pass = $usr['stu_pass'];
    $stu_occ = $usr['stu_occ'];
    
}
    $stmtInsertAdmin ="INSERT INTO admin (admin_name, admin_email, admin_pass, admin_occ) VALUES ('$stu_name ', '$stu_email', '$stu_pass','$stu_occ')";
    $res1 = $conn->query($stmtInsertAdmin);

        // Suppression de l'étudiant
        $stmtDeleteStudent = "DELETE FROM student WHERE stu_id = '$id'";
        $res2 = $conn->query($stmtDeleteStudent);

        header('location: manage_team.php');
        exit();


// Chaîne de connexion

?>

