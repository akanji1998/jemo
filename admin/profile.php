<?php
include 'database/connexion.php';
include 'database/fetch_domaine.php';
include 'database/fetch_admin_by_id.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 400px; width: 100%;">
            <div class="text-center">
                <img src="profil-admin.png" alt="Admin Profile Picture" class="rounded-circle mb-3"
                    style="width: 100px; height: 100px;">
                <h3 class="font-weight-bold">Profil admin</h3>
                <h5 class="text-muted"><?= $administrateur['nom_administrateur'] ?> <?= $administrateur['prenom_administrateur'] ?></h5>
                <p>Administrateur</p>
                <a href="index.php" class="btn btn-success mb-3">Aller au tableau de bord</a>
            </div>

            <form id="profile-form">
                <div class="form-group">
                    <input type="text" class="form-control"  id="prenom" placeholder="Prénom" value="<?= $administrateur['prenom_administrateur'] ?>">
                    <input type="hidden" class="form-control"  id="id_admin" placeholder="id_admin" value="<?= $administrateur['id_administrateur'] ?>">
                    <input type="hidden" class="form-control"  id="username" placeholder="id_admin" value="<?= $administrateur['username_administrateur'] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" placeholder="Nom" value="<?= $administrateur['nom_administrateur'] ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                        value="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email"
                        value="<?= $administrateur['email_administrateur'] ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" >Modifier</button>
                    <!-- <button type="button" class="btn btn-danger">Supprimer</button> -->
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <!-- <script src="js/script.js"></script> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log("PAGE READY")
            $('.profile-form').on('submit', function (e) {
                e.preventDefault(); // Empêche le formulaire de soumettre normalement
                console.log(userType, username, password);


                const nom = $('#nom').val();
                const prenom = $('#prenom').val();
                const password = $('#password').val();
                const email = $('#email').val();
                const id_admin = $('#id_admin').val();
                const username = $('#username').val();


                // Envoyer les données en AJAX
                $.ajax({
                    url: 'http://jemo.test/admin/api/update_admin.php', // L'URL de votre script PHP
                    method: 'POST',
                    data: {
                        "email": email,
                        "prenom": prenom,
                        "nom": nom,
                        "password": password,
                        "id_admin": id_admin,
                    },
                    success: function (response) {
                            console.log(response);
                        const res = JSON.parse(response);
                        console.log(res);
                                  $('.connexion_form')[0].reset();

                        if (res.success) {
                            console.log(res.redirect_url);
                            // Si la connexion est réussie, rediriger l'utilisateur
                            window.location.href = "administrateur.php"; // Redirige vers le tableau de bord
                        } else {
                            alert(res.message); // Affiche un message d'erreur
                          //Redirige vers le tableau de bord
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

</body>

</html>