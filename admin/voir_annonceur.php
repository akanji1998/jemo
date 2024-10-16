<?php
include 'database/connexion.php';
include 'database/fetch_annonceur.php';
include 'database/fetch_annonceur_by_id.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonceurs - Jemo Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <div class="container-fluid flex-grow-1">
            <div class="row h-100">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse vh-100 border-end border-1">
                    <div class="position-sticky pt-3 d-flex flex-column h-100">
                        <div class="text-center mb-4">
                            <img src="../media/icon/logo_green.svg" alt="Jemo Logo" class="img-fluid mb-2">
                            <h4 class="color_txt1">Center</h4>
                        </div>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="infographiste.php">Infographistes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="domaine_infographe.php">domaine infographiste</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="annonceur.php">Annonceurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="annonce.php">Annonce</a>
                            </li>

                            <!-- Accordion for Articles -->
                            <li class="nav-item">
                                <div class="accordion" id="accordionArticles">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingArticles">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseArticles"
                                                aria-expanded="false" aria-controls="collapseArticles">
                                                Articles
                                            </button>
                                        </h2>
                                        <div id="collapseArticles" class="accordion-collapse collapse"
                                            aria-labelledby="headingArticles" data-bs-parent="#accordionArticles">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    <li><a class="nav-link" href="ecrire_article.php">Écrire article</a>
                                                    </li>
                                                    <li><a class="nav-link" href="liste_article.php">Tous les
                                                            articles</a></li>
                                                    <!-- <li><a class="nav-link" href="categories_articles.html">Catégories</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="parametre.php">Paramètres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="administrateur.php">Administrateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="documentation.php">Documentation Jemo</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex flex-column">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2"><?= $annonceur['nom_annonceur'] ?> <?= $annonceur['prenom_annonceur'] ?></h1>
                    </div>

                    <?php
                    if (empty(($annonces))) {


                        ?>
                        <h1 style="color:grey">Ce profil n'a pas d'annonces</h1>
                    <?php } ?>

                    <!-- Table or List of Annonceurs -->
                    <?php
                    foreach ($annonces as $afficher) {
                        # code...
                    
                        ?>
                        <div class="card mb-4 ">
                            <div class="card-header">
                                <h5><?= $afficher['titre_annonce'] ?></h5>
                            </div>
                            <div class="card-body">
                                <p><?= $afficher['description_annonce'] ?></p>
                            </div>

                        </div>
                    <?php } ?>

                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-light text-center py-3">
            <p class="mb-0">&copy; 2024 Jemo. Tous droits réservés.</p>
        </footer>
    </div>

    <!-- Bootstrap JS & Font Awesome -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script>
        $(document).ready(function () {



            console.log("page loaded");


            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();

                console.log("deleting");

                // Récupérer l'ID du domaine à partir de l'attribut data-id du parent <tr>
                let row = $(this).closest('tr');
                let id = row.data('id');
                console.log(id);
                // Confirmation de suppression
                if (confirm('Voulez-vous vraiment supprimer ce domaine ?')) {
                    // Envoi de la requête AJAX
                    $.ajax({
                        url: 'http://jemo.test/admin/api/delete_annonceur.php', // Le fichier PHP qui gère la suppression
                        type: 'POST',
                        data: { 'id': id },
                        success: function (response) {
                            console.log(response);
                            let result = JSON.parse(response);  // Tente de parser la réponse JSON

                            if (result.success) {
                                // Si la suppression est un succès, retirer la ligne du tableau
                                row.remove();
                            } else {
                                alert('Erreur : ' + response.error);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(error);
                            console.error('Erreur lors de la suppression du domaine :', error);
                        }
                    });
                }
            });

        });



    </script>
</body>

</html>