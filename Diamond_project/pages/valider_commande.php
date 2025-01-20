<?php
session_start();
if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    echo '<p>Votre panier est vide.</p>';
    exit;
}

// Calcul du total
$total = 0;
foreach ($_SESSION['panier'] as $id_prod => $article) {
    $total += $article['prix'] * $article['quantite'];
}

// Page de validation de la commande
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valider la commande</title>
</head>
<body>
    <h1>Valider votre commande</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Article</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['panier'] as $id_prod => $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article['categorie']) ?></td>
                    <td><?= htmlspecialchars($article['prix']) ?> €</td>
                    <td><?= htmlspecialchars($article['quantite']) ?></td>
                    <td><?= htmlspecialchars($article['prix'] * $article['quantite']) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total : <?= $total ?> €</h2>
    <form action="confirmer_commande.php" method="POST">
        <button type="submit">Confirmer la commande</button>
    </form>
</body>
</html>
