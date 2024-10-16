<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infographistes - Jemo Dashboard</title>
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                                                Articles
                                            </button>
                                        </h2>
                                        <div id="collapseArticles" class="accordion-collapse collapse" aria-labelledby="headingArticles" data-bs-parent="#accordionArticles">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    <li><a class="nav-link" href="ecrire_article.php">Écrire article</a></li>
                                                    <li><a class="nav-link" href="liste_article.php">Tous les articles</a></li>
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
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Infographistes</h1>
                    </div>

                    <!-- Table or List of Infographistes -->
                    <div class="card mb-4 flex-grow-1">
                        <div class="card-header">
                            <h5>Infographistes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Date de création</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- First Infographiste -->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../media/public/images/photos_membres/phto say2.png" alt="say" class="rounded-circle" width="40" height="40" class="me-3">
                                                <div class="ms-2">
                                                    <strong>Jean-jacques</strong><br>
                                                    <span class="text-muted">Infographiste</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>01/05/2023</td>
                                        <td>+33 6 12 34 56 78</td>
                                        <td>
                                            <a href="#" class="me-2"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="me-2"><i class="fas fa-edit"></i></a>
                                            <a href="#"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Second Infographiste -->
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../media/public/images/photos_membres/phto gneba.png" alt="djeni" class="rounded-circle" width="40" height="40" class="me-3">
                                                <div class="ms-2">
                                                    <strong>Isac Mathieu</strong><br>
                                                    <span class="text-muted">Infographiste</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>12/07/2023</td>
                                        <td>+33 7 12 34 56 89</td>
                                        <td>
                                            <a href="#" class="me-2"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="me-2"><i class="fas fa-edit"></i></a>
                                            <a href="#"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
