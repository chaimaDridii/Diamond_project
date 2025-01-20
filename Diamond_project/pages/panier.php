<?php
session_start();
if (!isset($_SESSION['utilisateur_id'])) {
    echo "Non connecté";
} else {
    echo "Utilisateur connecté : ID = " . $_SESSION['utilisateur_id'];
}
// Vérifiez si le panier existe, sinon créez-le
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajouter le produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_prod = $_POST['id_prod'];
    $categorie = $_POST['categorie'];
    $prix = $_POST['prix'];

    // Vérifier si le produit est déjà dans le panier
    if (isset($_SESSION['panier'][$id_prod])) {
        $_SESSION['panier'][$id_prod]['quantite']++;
    } else {
        $_SESSION['panier'][$id_prod] = [
            'categorie' => $categorie,
            'prix' => $prix,
            'quantite' => 1,
        ];
    }
}

// Redirigez l'utilisateur vers une page, par exemple, la liste des produits ou le panier
header("Location: afficher_panier.php");
exit();
?>
