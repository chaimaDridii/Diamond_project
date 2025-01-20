<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$_SESSION['panier'] = $_SESSION['panier'] ?? [];

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "diamond");


/* Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    echo "Non connecté";
} else {
    echo "Utilisateur connecté : ID = " . $_SESSION['utilisateur_id'];
}*/



// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}
?>
<! DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond</title>
    
    <!-- Lien vers le favicon -->
    <link rel="icon" href="assets/img/diamant.png" type="image/x-icon">
    

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .masthead {
                font-size: 100%;
                color: white;
                background-image: url('assets/img/heade.JPG');
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
            }

            header.masthead .masthead-heading {
                font-size: 3.25rem;
                font-weight: 700;
                line-height: 3.25rem;
                margin-bottom: 2rem;
                font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }

            @media(min-width: 768px) {
                header.masthead {
                    padding-top: 25rem;
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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">M&C Diamond</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                        <form class="d-flex" method="GET" action="">
                            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher..." aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Rechercher</button>
                        </form>
                    </li>  
                    <li class="nav-item"><a class="nav-link" href="#articles">Articles</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/connexion.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/panier.php">Panier
                            (<?= count($_SESSION['panier']) ?>)</a></li>
                    
                    <!-- Formulaire de recherche dans la navbar -->
                    <li>
                        <form action="logout.php" method="POST">
                            <a>dridi</a>
                            <button type="submit" class="btn btn-secondary"> Se déconnecter</button>
                        </form>
                    </li>
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

    <!-- Articles -->
    <section id="articles">
        <div class="container">
            <div class="text">
                <h1>
                    <center>Choisissez quelques bijoux</center>
                </h1>
            </div>
            <div class="row">
                <?php
                // Connexion à la base de données
                $mysqli = new mysqli("localhost", "root", "", "diamond");

                // Vérification de la connexion
                if ($mysqli->connect_error) {
                    die("La connexion échouée: " . $mysqli->connect_error);
                }

                // Rechercher les articles
                $search = isset($_GET['search']) ? $_GET['search'] : '';

                $query = "SELECT id_prod, categorie, prix, image_path FROM produit WHERE categorie LIKE ?";

                // Préparer la requête
                if ($stmt = $mysqli->prepare($query)) {
                    $searchTerm = '%' . $search . '%';
                    $stmt->bind_param("s", $searchTerm);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Afficher les résultats
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="' . htmlspecialchars($row["image_path"]) . '" alt="Bijou">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($row["categorie"]) . '</h5>
                                        <p class="card-text">Prix : ' . htmlspecialchars($row["prix"]) . ' €</p>
                                        <!-- Formulaire pour ajouter au panier -->
                                        <form action="panier.php" method="POST">
                                            <input type="hidden" name="id_prod" value="' . htmlspecialchars($row["id_prod"]) . '">
                                            <input type="hidden" name="categorie" value="' . htmlspecialchars($row["categorie"]) . '">
                                            <input type="hidden" name="prix" value="' . htmlspecialchars($row["prix"]) . '">
                                            <button type="submit" class="btn btn-primary">Acheter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<p>Aucun bijou trouvé.</p>';
                    }

                    // Fermer la requête
                    $stmt->close();
                } else {
                    echo '<p>Aucun bijou disponible pour le moment.</p>';
                }

                // Fermer la connexion
                $mysqli->close();
                ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


    <footer
        class="text-white text-center text-lg-start" style="background-color: #23242a;">
        <!-- Grid container -->
        <div
            class="container p-4">
            <!--Grid row-->
            <div
                class="row mt-4">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">About company</h5>

                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                                voluptatum deleniti atque corrupti.
                    </p>

                    <p>
                        Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                                molestias.
                    </p>

                    <div
                        class="mt-4">
                        <!-- Facebook -->
                        <a type="button" class="btn btn-floating btn-warning btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Dribbble -->
                        <a type="button" class="btn btn-floating btn-warning btn-lg">
                            <i class="fab fa-dribbble"></i>
                        </a>
                        <!-- Twitter -->
                        <a type="button" class="btn btn-floating btn-warning btn-lg">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <!-- Google + -->
                        <a type="button" class="btn btn-floating btn-warning btn-lg">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <!-- Linkedin -->
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 pb-1">Search something</h5>

                    <div class="form-outline form-white mb-4">
                        <input type="text" id="formControlLg" class="form-control form-control-lg">
                        <label class="form-label" for="formControlLg" style="margin-left: 0px;">Search</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 48.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>

                    <ul class="fa-ul" style="margin-left: 1.65em;">
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="ms-2">New York, NY 10012,
                                                                US</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="ms-2">info@example.com</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fas fa-phone"></i>
                            </span>
                            <span class="ms-2">+ 01 234 567
                                                                88</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="ms-2">+ 01 234 567
                                                                89</span>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Opening hours</h5>

                    <table class="table text-center text-white">
                        <tbody class="font-weight-normal">
                            <tr>
                                <td>Mon - Thu:</td>
                                <td>8am - 9pm</td>
                            </tr>
                            <tr>
                                <td>Fri - Sat:</td>
                                <td>8am - 1am</td>
                            </tr>
                            <tr>
                                <td>Sunday:</td>
                                <td>9am - 10pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

</html>
