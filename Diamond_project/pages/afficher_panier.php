<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php
include_once('includes/header.php');?>
<body style="background-color: #fdccbc;">
  <section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <p>
            <span class="h2">Panier  </span>
            <span class="h4">(<?= isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0 ?> articles dans votre panier)</span>
          </p>

          <?php if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0): ?>
            <?php
            $total_general = 0;
            foreach ($_SESSION['panier'] as $id_prod => $produit):
              $total = $produit['prix'] * $produit['quantite'];
              $total_general += $total;
            ?>
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="row align-items-center">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Article</p>
                        <p class="lead fw-normal mb-0"><?= htmlspecialchars($produit['categorie']) ?></p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Prix</p>
                        <p class="lead fw-normal mb-0"><?= htmlspecialchars($produit['prix']) ?> €</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Quantité</p>
                        <p class="lead fw-normal mb-0"><?= htmlspecialchars($produit['quantite']) ?></p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Total</p>
                        <p class="lead fw-normal mb-0"><?= $total ?> €</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <a href="pages/supprimer_du_panier.php?id_prod=<?= $id_prod ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="card mb-5">
              <div class="card-body p-4">
                <div class="float-end">
                  <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="small text-muted me-2">Total général:</span>
                    <span class="lead fw-normal"><?= $total_general ?> €</span>
                  </p>
                </div>
              </div>
            </div>

          <?php else: ?>
            <div class="alert alert-warning">Votre panier est vide.</div>
          <?php endif; ?>

          <div class="d-flex justify-content-end">
            <a href="index.php" class="btn btn-light btn-lg me-2">Continuer vos achats</a>
            <a href="pages/confirmer_commande.php" class="btn btn-primary btn-lg">Passer à la commande</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
