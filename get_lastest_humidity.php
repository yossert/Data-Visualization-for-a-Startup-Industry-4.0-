<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniprojet";

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Sélectionnez la dernière valeur d'humidité
$sql = "SELECT valeur FROM humidite ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestHumidity = $row["valeur"];
    
    // Renvoyer la valeur d'humidité au format JSON
    echo json_encode(["humidity" => $latestHumidity]);
} else {
    echo json_encode(["humidity" => "Données non trouvées"]);
}

$conn->close();
?>
