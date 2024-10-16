<?php
include '../database/connexion.php';
include('../database/annonceur/fetch_annonce_by_id.php'); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="box">
        <!-- rectangle vert -->
        <div class="rectangle03">
            <header class="header">
                <div class="box_header">
                    <div class="logo"></div>
                    <nav>
                        <!-- retour a l'accueil -->
                        <ul>
                            <a href="../index.php">

                                <li class="">Accueil</li>
                            </a>
                        </ul>
                    </nav>
                    <div class="rectangle-div1">
                        <nav>
                            <ul>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="modifier_profil.php">Modifier mon profil</a></li>
                                <li><a href="publier.php">Publier une annonce</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="user-menu-container">
                        <div class="user-icon" id="userIcon">
                            <div class="circle-user"></div>
                        </div>
                        <div class="menu" id="menu">
                            <ul>
                                <li><a href="connexion.html">Se connecter</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </header>
        </div>
        <!-- end rectangle vert -->
    </div>

    <main>



        <form id="annonceForm">
            <div class="box_annonce">
                <h2>Modification</h2>

                <input type="text" id="titre" name="titre" value="<?= $annonce['titre_annonce'] ?>" required
                    placeholder="Titre de l'annonce"><br>
                <input type="hidden" id="id_annonce" name="id_annonce" required value=" <?= $annonce['id_annonce'] ?>">
                <br>
                <textarea name="description_annonce" id="description_annonce" placeholder="Décrire l'annonce"
                    required><?= $annonce['description_annonce']; ?></textarea><br>

                <input type="submit" value="Modifier">
            </div>
        </form>

        <!-- Message de feedback -->
        <div id="message" style="display:none;"></div>


    </main>
    <!-- <script src="script_hovers.js"></script> -->
    <script src="../js/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            console.log("DOCument ready");
            $('#annonceForm').on('submit', function (e) {
                e.preventDefault(); // Empêche le rechargement de la page

                // Récupérer les données du formulaire
                const titre = $('#titre').val();
                const description_annonce = $('#description_annonce').val();
                const id = $('#id_annonce').val();


                console.log(nom, description_annonce, id);


                // Envoyer les données via AJAX
                $.ajax({
                    url: 'http://jemo.test/api/modifier_anonce.php', // Le script PHP côté serveur qui va traiter la requête
                    method: 'POST',
                    data: {
                        "titre": titre,
                        "description_annonce": description_annonce,
                        "id": id
                    },
                    success: function (response) {
                        try {
                            console.log(response);
                            const res = JSON.parse(response);
                            $('#annonceForm')[0].reset();

                            if (res.success) {
                                $('#message').html('<p style="color: green;">Annonce créée avec succès.</p>').show();
                            } else {
                                $('#message').html('<p style="color: red;">' + res.message + '</p>').show();
                            }
                        } catch (e) {
                            console.log(e);
                            $('#message').html('<p style="color: red;">Erreur lors du traitement des données.</p>').show();
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#message').html('<p style="color: red;">Erreur lors de l\'envoi de la requête.</p>').show();
                    }
                });
            });
        });

    </script>
</body>

</html>