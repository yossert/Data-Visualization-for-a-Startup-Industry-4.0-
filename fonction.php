<?php
function Connect(){
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

}
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
function getAllContacts()
{
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = "select * from contact";
    $resultat = $conn->query($req);
    $contacts = $resultat->fetchAll();
    return $contacts;
}

function getAllAdmins()
{
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = "select * from admin";
    $resultat = $conn->query($req);
    $admins = $resultat->fetchAll();
    return $admins;
}

function countAdmins()
{
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $DBuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT COUNT(admin_id) as adminCount FROM admin");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['adminCount'];
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données ici
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        return false; // Ou une autre valeur pour indiquer une erreur
    }
}
function countUsers()
{
    $servername = "localhost";
    $DBuser = "root";
    $password = "";
    $DBname = "miniprojet";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $DBuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT COUNT(stu_id) as userCount FROM student");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['userCount'];
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données ici
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        return false; // Ou une autre valeur pour indiquer une erreur
    }
}
$total = countUsers() + countAdmins();
function calculatePercentage($count, $total)
{
    if ($total == 0) {
        return 0; // Éviter la division par zéro
    }

    return round(($count / $total) * 100, 1);
}


function search($keywords){
    $conn = Connect();
    //requette 
    $req = "SELECT * FROM student WHERE stu_name LIKE '%$keywords%'";
    $resultat = $conn->query($req);
    $resultatSearch = $resultat->fetchAll();
    return $resultatSearch;
}
function searcha($keyword){
    $conn = Connect();
    //requette 
    $req = "SELECT * FROM admin WHERE admin_name LIKE '%$keyword%'";
    $resultat = $conn->query($req);
    $resultatSearcha = $resultat->fetchAll();
    return $resultatSearcha;
}

?>
