<?php
include 'database/connexion.php';
include 'database/fetch_domaine.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domaine infographiste - Jemo Dashboard</title>
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
                        <h1 class="h2">domaines</h1>
                    </div>

                    <!-- Categories form and table -->
                    <div class="row">
                        <!-- Add new category -->
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>ajouter domaine</h5>
                                </div>
                                <div class="card-body">
                                    <form id="addDomainForm">
                                        <div class="mb-3">
                                            <label for="domainName" class="form-label">Nom de domaine</label>
                                            <input type="text" class="form-control" id="domainName"
                                                placeholder="Nom de domaine" required>

                                            <label for="domainImage" class="form-label">ajouter une image</label>
                                            <input type="file" class="form-control" id="domainImage" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- List of categories -->
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Liste des domaines</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless" id="domainsTable">
                                        <thead>

                                            <tr>
                                                <th>Nom de la catégorie</th>
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php foreach ($categories as $afficher) { ?>
                                                <tr class="border-bottom" data-id="<?= $afficher['id_domaine'] ?>">
                                                    <td><?= $afficher['nom_domaine'] ?></td>
                                                    <td><a href="#" class="text-danger delete-btn"><i
                                                                class="fas fa-trash"></i></a></td>
                                                    <td><a href="#" class="text-primary"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>


                                        <!-- <tbody>

                                            <!-- Les domaines ajoutés dynamiquement ici --
                                                <?php
                                                foreach ($categories as $afficher) {
                                                    # code...
                                                
                                                    ?>
                                             <tr class="border-bottom">
                                                <td><?= $afficher['nom_domaine'] ?></td>
                                                <td><a href="#" class="text-danger"><i class="fas fa-trash"></i></a></td>
                                                <td><a href="#" class="text-primary"><i class="fas fa-edit"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody> -->
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true">&laquo;</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
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
            // Quand le formulaire est soumis
            $('#addDomainForm').on('submit', function (e) {
                e.preventDefault();

                // Récupérer les données du formulaire
                let domainName = $('#domainName').val();
                let domainImage = $('#domainImage')[0].files[0];



                // Vérifier que les champs ne sont pas vides
                if (domainName && domainImage) {
                    // Créer un objet FormData pour envoyer le fichier et les données
                    let formData = new FormData();
                    formData.append('domainName', domainName);
                    formData.append('domainImage', domainImage);

                    // Faire une requête AJAX
                    $.ajax({
                        url: 'http://jemo.test/admin/api/register_domain.php', // Remplace cette URL par celle de ton API
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {

                            let result = JSON.parse(response);  // Tente de parser la réponse JSON
                            let newDomain = result.newDomain;
                            console.log(newDomain.name);
                            // Ajouter la nouvelle ligne à la table
                            let newRow = `
                        <tr class="border-bottom">
                            <td>${newDomain.name}</td>
                            <td><a href="#" class="text-danger"><i class="fas fa-trash"></i></a></td>
                            <td><a href="#" class="text-primary"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    `;
                            $('#domainsTable tbody').append(newRow);

                            // Réinitialiser le formulaire
                            $('#addDomainForm')[0].reset();
                        },
                        error: function (xhr, status, error) {
                            console.error("Une erreur s'est produite :", error);
                        }
                    });
                } else {
                    alert("Veuillez remplir tous les champs.");
                }
            });

            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();

                console.log("deleting");

                // Récupérer l'ID du domaine à partir de l'attribut data-id du parent <tr>
                let row = $(this).closest('tr');
                let domainId = row.data('id');

                // Confirmation de suppression
                if (confirm('Voulez-vous vraiment supprimer ce domaine ?')) {
                    // Envoi de la requête AJAX
                    $.ajax({
                        url: 'http://jemo.test/admin/api/delete_domaine.php', // Le fichier PHP qui gère la suppression
                        type: 'POST',
                        data: { id: domainId },
                        success: function (response) {
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