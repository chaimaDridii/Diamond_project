<?php 
session_start();
$_SESSION['email'] = 'email';
$_SESSION['mdp'] = 'mdp';
if (!isset($_SESSION['try'])) {
    $_SESSION['try'] = 0;
}

$message = "";  // Variable pour stocker le message d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_nais = $_POST['date'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $num_tel = $_POST['num_tel'];
    $mdp = $_POST['mdp'];

    $conn = mysqli_connect("127.0.0.1", "root", "", "diamond");

    if (!$conn) { // Contrôler la connexion
        $message = "Erreur : Impossible de se connecter à MySQL.";
    } else {
        if (!empty($email) && !empty($mdp)) {
            $select1 = mysqli_query($conn, "SELECT * FROM utilisateur WHERE e_mail = '$email'");
            $select2 = mysqli_query($conn, "SELECT * FROM utilisateur WHERE mdp = '$mdp'");

            if (mysqli_num_rows($select1) > 0) {
                // Utilisateur déjà existant
                $message = "L'utilisateur existe déjà. Cliquez sur connexion pour vous connecter.";
            } else {
                // Inscription
                $Ajouter = "INSERT INTO utilisateur (nom, prenom, date_nais, adresse, e_mail, num_tell, mdp)
                            VALUES ('$nom', '$prenom', '$date_nais', '$adresse', '$email', '$num_tel', '$mdp')";

                if (!mysqli_query($conn, $Ajouter)) {
                    $message = "Une erreur est survenue lors de l'inscription.";
                } else {
                    header("Location: connexion.php");
                    exit();
                }
            }
        } else {
            $message = "Les champs doivent être remplis.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box
    }

    body {
      background-color: #eee;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat
    }

    .wrapper {
      max-width: 500px;
      border-radius: 10px;
      margin-top: 10em;
      margin: 50px auto;
      padding: 30px 40px;
      box-shadow: 20px 20px 80px rgb(206, 206, 206)
    }

    .h2 {
      font-family: 'Kaushan Script', cursive;
      font-size: 3.5rem;
      font-weight: bold;
      color: #400485;
      font-style: italic
    }

    .h4 {
      font-family: 'Poppins', sans-serif
    }

    .input-field {
      border-radius: 5px;
      padding: 5px;
      display: flex;
      align-items: center;
      cursor: pointer;
      border: 1px solid #400485;
      color: #400485
    }

    .input-field:hover {
      color: #7b4ca0;
      border: 1px solid #7b4ca0
    }

    input {
      border: none;
      outline: none;
      box-shadow: none;
      width: 100%;
      padding: 0px 2px;
      font-family: 'Poppins', sans-serif
    }

    .fa-eye-slash.btn {
      border: none;
      outline: none;
      box-shadow: none
    }

    a {
      text-decoration: none;
      color: #400485;
      font-weight: 700
    }

    a:hover {
      text-decoration: none;
      color: #7b4ca0
    }

    .option {
      position: relative;
      padding-left: 30px;
      cursor: pointer
    }

    .option label.text-muted {
      display: block;
      cursor: pointer
    }

    .option input {
      display: none
    }

    .checkmark {
      position: absolute;
      top: 3px;
      left: 0;
      height: 20px;
      width: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 50%;
      cursor: pointer
    }

    .option input:checked~.checkmark:after {
      display: block
    }

    .option .checkmark:after {
      content: "";
      width: 13px;
      height: 13px;
      display: block;
      background: #400485;
      position: absolute;
      top: 48%;
      left: 53%;
      border-radius: 50%;
      transform: translate(-50%, -50%) scale(0);
      transition: 300ms ease-in-out 0s
    }

    .option input[type="radio"]:checked~.checkmark {
      background: #fff;
      transition: 300ms ease-in-out 0s;
      border: 1px solid #400485
    }

    .option input[type="radio"]:checked~.checkmark:after {
      transform: translate(-50%, -50%) scale(1)
    }

    .btn.btn-block {
      border-radius: 20px;
      background-color: #400485;
      color: #fff
    }

    .btn.btn-block:hover {
      background-color: #55268be0
    }

    @media(max-width: 575px) {
      .wrapper {
        margin: 10px
      }
    }

    @media(max-width:424px) {
      .wrapper {
        padding: 30px 10px;
        margin: 5px
      }

      .option {
        position: relative;
        padding-left: 22px
      }

      .option label.text-muted {
        font-size: 0.95rem
      }

      .checkmark {
        position: absolute;
        top: 2px
      }

      .option .checkmark:after {
        top: 50%
      }

      #forgot {
        font-size: 0.95rem
      }
    }
    body {
      background-image: url("./assets/img/image.jpg");
      background-repeat: no-repeat;
      background-size: 145%;
      background-position: center;
      margin-top: 0em;
    }

    fieldset#coordonnees {

      width: 8.9em;
      height: 15em;
      margin-top: 1em;
      margin-bottom: -0.1em;
      background-image: url("./assets/img/img777.jpg");
      border-radius: 1em;
      text-align: center;
      font-size: 1.2em;
      border: 1px outset gray;
    }

    img#img1 {
      width: 8em;
      height: 8em;
      border-radius: 100em;
      font-size: 1em;
      margin-top: 0em;
      border: 1px outset black;
    }

    #coordonnees label {
      color: white;
      font-size: 0.9em;
      font-family: "Times New Roman", serif;
      right: middle;
      text-shadow: 2px 2px 5px grey;
    }

    input.button {


      background-color: black;
      color: white;

      font-family: "Times New Roman", serif;
      text-align: center;
      font-size: 1em;
      border-radius: 2em;
      width: 8em;
      height: 2em;

    }

    input.button:hover {
      opacity: 85%;
    }

    input.date {
      font: 20px Arial, sans-serif;
      width: 18em;
      height: 2em;
      font-weight: bold;
      font-size: 0.7em;

    }
      /* Style de la modale */
      .modal {
          display: none; /* Masqué par défaut */
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,0.5); /* Fond sombre */
          justify-content: center;
          align-items: center;
      }
      
      .modal-content {
          background-color: white;
          padding: 20px;
          border-radius: 10px;
          text-align: center;
          width: 300px;
      }
  
      .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }
  
      .close:hover,
      .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
      }
  
      #modalBtn {
          background-color: #4CAF50;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }
  
      #modalBtn:hover {
          background-color: #45a049;
      }
        /* Style pour les alertes */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: none; /* Caché par défaut */
            font-size: 16px;
            color: #fff;
        }
        .alert-success {
            background-color: #28a745;
        }
        .alert-error {
            background-color: #dc3545;
        }
        .alert-info {
            background-color: #17a2b8;
        }
        .alert-warning {
            background-color: #ffc107;
        }

        /* Animation d'apparition de l'alerte */
        .show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-btn {
            float: right;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
 <!-- Conteneur pour les alertes -->
    <div id="alert-container"></div>
    <form method="POST" action="">
        <div class="wrapper bg-white">
            <div class="h2 text-center">Lina Diamand</div>
            <div class="h4 text-muted text-center pt-2">Veuillez remplir vos informations</div>

            <!-- Nom -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="text" name="nom" placeholder="Nom" required>
                </div>
            </div>

            <!-- Prénom -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="text" name="prenom" placeholder="Prénom" required>
                </div>
            </div>

            <!-- Date de naissance -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="date" name="date" required>
                </div>
            </div>

            <!-- Adresse -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="text" name="adresse" placeholder="Adresse" required>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
            </div>

            <!-- Numéro de téléphone -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="tel" name="num_tel" placeholder="Numéro de téléphone" required pattern="[0-9]{8,}">
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="form-group py-2">
                <div class="input-field">
                    <input type="password" name="mdp" placeholder="Mot de passe" required>
                </div>
            </div>

            <!-- Bouton d'inscription -->
            <div class="form-group py-2">
                <input type="submit" value="Inscrire" name="bouton" class="btn btn-block">
            </div>

            <div class="text-center pt-3 text-muted">
                Vous avez déjà un compte ? <a href="pages/connexion.php">Connectez-vous</a>
            </div>
        </div>
    </form>

   

    <script>
        <?php if (!empty($message)) { ?>
            // Créer l'élément d'alerte
            let alertMessage = "<?php echo $message; ?>";
            let alertType = "alert-error"; // Défaut = erreur

            if (alertMessage.includes("succès")) {
                alertType = "alert-success";
            } else if (alertMessage.includes("remplis")) {
                alertType = "alert-warning";
            }

            // Créer une nouvelle alerte
            let alertDiv = document.createElement("div");
            alertDiv.classList.add("alert", alertType, "show");

            // Ajouter le message et un bouton de fermeture
            alertDiv.innerHTML = alertMessage + ' <span class="close-btn" onclick="this.parentElement.style.display=\'none\'">×</span>';

            // Ajouter l'alerte au conteneur
            document.getElementById("alert-container").appendChild(alertDiv);
        <?php } ?>
    </script>

</body>
</html>
