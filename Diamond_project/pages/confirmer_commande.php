<?php
session_start();
require 'config.php'; // Inclure votre fichier de configuration de base de données

if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    echo '            <div class="alert alert-warning">Votre panier est vide.</div>
';
    exit;
}

// Récupérer l'ID de l'utilisateur connecté (supposons que l'utilisateur est connecté)
$utilisateur_id = $_SESSION['utilisateur_id'] ?? 1; // Remplacez par une gestion réelle de l'utilisateur

// Calcul du total
$total = 0;
foreach ($_SESSION['panier'] as $id_prod => $article) {
    $total += $article['prix'] * $article['quantite'];
}

// Enregistrement de la commande
$date_commande = date('Y-m-d H:i:s');
$stmt = $mysqli->prepare("INSERT INTO commande (date_commande, total, utilisateur_id) VALUES (?, ?, ?)");
$stmt->bind_param('sdi', $date_commande, $total, $utilisateur_id);
$stmt->execute();
$id_commande = $stmt->insert_id;
$stmt->close();

// Enregistrement des produits de la commande
$stmt = $mysqli->prepare("INSERT INTO commande_produit (id_commande, id_prod, quantite, prix) VALUES (?, ?, ?, ?)");
foreach ($_SESSION['panier'] as $id_prod => $article) {
    $quantite = $article['quantite'];
    $prix = $article['prix'];
    $stmt->bind_param('iiid', $id_commande, $id_prod, $quantite, $prix);
    $stmt->execute();
}
$stmt->close();

// Vider le panier
unset($_SESSION['panier']);

// Confirmation
echo '<p>Votre commande a été validée avec succès !</p>';
echo '<a href="index.php">Retour à la page d\'accueil</a>';
?>
