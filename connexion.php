<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header class="header section">
        <div class="box_header1">
            <div class="logo1"></div><br>
            <h4><a href="index.php">retour</a></h4>

            <div class="user-menu-container">
                <div class="user-icon" id="userIcon">
                    <!-- <div class="circle-user"></div> -->
                </div>
            </div>
        </div>
    </header>

    <!-- Modal d'erreur -->
    <!-- <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Message d'erreur --
        <p id="errorMessage">Une erreur s'est produite.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div> -->


    <form action="" class="connexion_form">
        <div class="box_connexion">
            <h2 class="title_inter">Connexion</h2>
            <div class="radio-container">
                <input type="radio" id="annonceur" name="user_type" value="annonceur" checked>
                <label class="radio-label" for="annonceur">annonceur</label>

                <input type="radio" id="infographe" name="user_type" value="infographe">
                <label class="radio-label" for="infographe">infographe</label>
            </div>
            <input type="text" id="username" name="username" required placeholder="username ou email"> <br>

            <input type="password" id="password" name="password" required placeholder="Mot de passe">
            <div class="forget_password">
                <a href="reinitialiser.php">Mot de passe oublié ?</a>
            </div>

            <div class="box_btn_creer_compte">
                <p>
                    Vous n’avez pas de compte ? <br> créez un compte <a
                        href="annonceur/inscription_anonceur.php">anonceur</a> ou <a
                        href="infographe/inscription_infographiste.php">infographiste</a>
                </p>
                <button type="submit">Se connecter</button>
            </div>

        </div>
    </form>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log("PAGE READY")
            $('.connexion_form').on('submit', function (e) {
                e.preventDefault(); // Empêche le formulaire de soumettre normalement

                // Récupérer les valeurs des champs
                const userType = $('input[name="user_type"]:checked').val();
                const username = $('#username').val();
                const password = $('#password').val();

                console.log(userType, username, password);

                // Envoyer les données en AJAX
                $.ajax({
                    url: 'http://jemo.test/api/login.php', // L'URL de votre script PHP
                    method: 'POST',
                    data: {
                        "user_type": userType,
                        "username": username,
                        "password": password
                    },
                    success: function (response) {
                        const res = JSON.parse(response);
                        console.log(res);
                                  $('.connexion_form')[0].reset();

                        if (res.success) {
                            console.log(res.redirect_url);
                            // Si la connexion est réussie, rediriger l'utilisateur
                            window.location.href = res.redirect_url; // Redirige vers le tableau de bord
                        } else {
                            alert(res.message); // Affiche un message d'erreur
                            res.redirect_url; // Redirige vers le tableau de bord
                            //          $('#errorMessage').text('Erreur de format de réponse JSON.');
                            // $('#errorModal').modal('show');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("Une erreur s'est produite lors de la connexion.");
                        console.log(error);
                        //      $('#errorMessage').text('Erreur de format de réponse JSON.');
                        // $('#errorModal').modal('show');
                    }
                });
            });
        });

    </script>
    <!-- <script src="js/script.js"></script> -->
</body>

</html>