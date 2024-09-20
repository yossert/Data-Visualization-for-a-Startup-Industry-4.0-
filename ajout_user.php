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
    $req = "select * from admin WHERE admin_id = '$id'";
    $resultat = $conn->query($req);
    $admin = $resultat->fetchAll();
    return $admin;
}
$admin = gettAllAdmin();
$id = $_GET['ida'];
foreach ($admin as $adm) {
    // Accéder aux champs de chaque utilisateur
    
    $admin_name = $adm['admin_name'];
    $admin_email = $adm['admin_email'];
    $admin_pass = $adm['admin_pass'];
    $admin_occ = $adm['admin_occ'];
    
}
    $stmtInsertAdmin ="INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) VALUES ('$admin_name ', '$admin_email', '$admin_pass','$admin_occ')";
    $res1 = $conn->query($stmtInsertAdmin);

        // Suppression de l'étudiant
        $stmtDeleteAdmin = "DELETE FROM admin WHERE admin_id = '$id'";
        $res2 = $conn->query($stmtDeleteAdmin);

        header('location: add_admin.php');
        exit();


// Chaîne de connexion

?>
