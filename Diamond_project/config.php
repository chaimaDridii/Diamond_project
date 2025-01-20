<?php
$host = 'localhost'; // Adresse de votre serveur MySQL
$dbname = 'diamond'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe (laissez vide pour XAMPP)

$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérifiez la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}
?>
