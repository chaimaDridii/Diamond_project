<?php
session_start();

// Vérifiez si l'ID du produit est fourni
if (isset($_GET['id_prod']) && isset($_SESSION['panier'][$_GET['id_prod']])) {
    unset($_SESSION['panier'][$_GET['id_prod']]);
}

// Redirigez vers le panier
header("Location: afficher_panier.php");
exit();
?>
