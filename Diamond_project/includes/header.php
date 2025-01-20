
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
                    <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="panier.php">Panier
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