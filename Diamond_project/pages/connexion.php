
    <?php
// Démarrage de la session et gestion des erreurs
session_start();

$error_message = ""; // Initialiser le message d'erreur vide

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("127.0.0.1", "root", "", "diamond");
    
    if ($conn) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
        
        // Vérifier les données d'utilisateur
        $query = "SELECT * FROM utilisateur WHERE e_mail = '$email' AND mdp = '$mdp'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
          $_SESSION['utilisateur_id'] = $user['id'];
          $_SESSION['nom_utilisateur'] = $user['nom'];
            // Si l'utilisateur est trouvé, rediriger vers la page d'accueil
            header("Location: index.php");
            exit();
        } else {
            // Si les informations sont incorrectes
            $message = "L'utilisateur n'existe pas ou les informations sont incorrectes.";
        }
        
        mysqli_close($conn);
    } else {
        $message = "Erreur de connexion à la base de données.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
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
  background-image: url("assets/img/image.jpg");
  background-repeat: no-repeat;
  background-size: 145%;

  background-position: center;
}

  {
  font-family: "Times New Roman", Times, serif;
}

fieldset#coordonnees {

  width: 20em;
  height: 5em;
  margin-top: 10em;
  background-image: url("assets/img/image.jpg");
  border-radius: 1em;
  text-align: center;
  font-size: 1.2em;
  border: 1px outset gray;
}

#coordonnees label {
  color: hsl(0, 0%, 10%);
  margin-top: 50m;
  font-size: 1em;
  color: white;
  font-family: "Times New Roman", serif;
  right: middle;
  text-shadow: 3px 3px 10px grey;
}

input.button {
  margin-top: 2em;
  background-image: url("assets/img/im.jpg");
  color: white;
  size: 10em;
  font-family: "Times New Roman", serif;
  text-align: center;
  font-size: 1em;
  border-radius: 2em;
  width: 8em;
  height: 2em;
  font-size: 1em;
}

input.button:hover {
  opacity: 85%;
}

a.inscrit {
  color: white;

}

p {
  color: white;
  font-weight: :bold;
  size: 10em;
}

.input-field {
  position: relative;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 8px;
}

button {
  position: absolute;
  right: 13px;
  top: 27px;
  background: transparent;
  border: none;
  cursor: pointer;
}

.button {
  width: 100%;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.button:hover {
  background-color: #218838;
}



a:hover {
  opacity: 0.8;
}

h1 {
  color: red;
  text-align: center;
}
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
<div id="alert-container"></div>
<center>
    <div class="wrapper bg-white">
       <div id="alert-container"></div>
        <div class="h2 text-center">Lina Diamand</div>
        <div class="h4 text-muted text-center pt-2">Entrez vos informations de connexion</div>

        <!-- Affichage du message d'erreur s'il y en a -->
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-error">
                <h1><?= $error_message ?></h1>
                <a href="pages/inscrit.php">Cliquez ici pour l'inscription</a>
            </div>
        <?php endif; ?>
        <!-- Formulaire de connexion -->
        <form method="POST" action="">
            <div class="form-group py-2">
                <div class="input-field">
                    <span class="far fa-user p-2"></span>
                    <input type="text" name="email" placeholder="Nom d'utilisateur ou Email" required>
                </div>
            </div>
            <div class="form-group py-1 pb-2">
                <div class="input-field">
                    <span class="fas fa-lock p-2"></span>
                    <input type="password" name="mdp" id="password" placeholder="Entrez votre mot de passe" required>
                    <button type="button" class="btn bg-white text-muted" onclick="togglePassword()">
                        <span class="far fa-eye-slash" id="eye-icon"></span>
                    </button>
                </div>
            </div>
            <input type="submit" value="Se connecter" class="button">
        </form>

        <div class="text-center pt-3 text-muted">
            Vous n'êtes pas inscrit ? <a href="inscrit.php">Inscription</a>
        </div>
    </div>
</center>

<script>
    // Fonction pour basculer la visibilité du mot de passe
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
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
