<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .masthead {
            padding-bottom: 6rem;
            margin-top: 1em;
            font-size: 100%;
            color: white;
            background-image: url('heade.JPG');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        
   header.masthead .masthead-heading {
  font-size: 3.25rem;
  font-weight: 700;
  line-height: 3.25rem;
  margin-bottom: 2rem;
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";}
@media (min-width: 768px) {
  header.masthead {
    padding-top: 17rem;
        height: 50%;
    padding-bottom: 8rem;
  }


}
        .selectionne {
            background-color: #292929;
            color: white;
            width: 5em;
            height: 1.5em;
            border-radius: 5px;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <link href="style.css">
</head>
<body>
    <?php
    session_start();
    $_SESSION['panier'] = $_SESSION['panier'] ?? [];
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Diamond</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#articles">Articles</a></li>
                    <li class="nav-item"><a class="nav-link" href="connexion1.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="panier.php">Panier (<?= count($_SESSION['panier']) ?>)</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead text-center">
        <div class="container">
            <h1>Bienvenue dans notre Boutique !</h1>
            <p>Voulez-vous acheter quelque chose ?</p>
        </div>
    </header>

    <section id="articles">
    <div class="container">
        <div class="text"><H1>Choisissez quelques articles</H1></div>
    </div>
    <div class="row">
        <?php
        // Récupérer les articles depuis la base de données
        $query = "SELECT id_prod, categorie, prix, image_path FROM produit"; // Assurez-vous que votre table produit a une colonne image_path pour l'image de l'article
        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-sm-6 mb-4">
                        <a class="portfolio-link" data-toggle="modal" href="#img' . $row["id_prod"] . '">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="' . $row["image_path"] . '" alt="" />
                        </a>
                    </div>';
            }
        }
        ?>
    </div>
</section>


    <script>
        function addToCart(id, nom, prix) {
            // Simule l'ajout au panier côté client
            alert(nom + " ajouté au panier !");
            // Envoyez une requête AJAX ou utilisez `fetch` pour mettre à jour le panier côté serveur.
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
