<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - Jemo Dashboard</title>
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
                        <h1 class="h2">Paramètres</h1>
                    </div>

                    <!-- Settings Sections -->
                    <div class="card mb-4 flex-grow-1">
                        <div class="card-body">
                            <!-- Section for Color Settings -->
                            <h3>Modifier les Couleurs de l'Interface</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="bgColor" class="form-label">Couleur de fond</label>
                                    <input type="color" class="form-control form-control-color" id="bgColor" name="bgColor" value="#ffffff">
                                </div>
                                <div class="mb-3">
                                    <label for="textColor" class="form-label">Couleur du texte</label>
                                    <input type="color" class="form-control form-control-color" id="textColor" name="textColor" value="#000000">
                                </div>
                                <div class="mb-3">
                                    <label for="primaryColor" class="form-label">Couleur primaire</label>
                                    <input type="color" class="form-control form-control-color" id="primaryColor" name="primaryColor" value="#007bff">
                                </div>
                                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                            </form>

                            <hr>

                            <!-- Section for Header Settings -->
                            <h3>Modifier l'En-tête</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="headerTitle" class="form-label">Titre de l'en-tête</label>
                                    <input type="text" class="form-control" id="headerTitle" placeholder="Titre de l'en-tête" value="Jemo Center">
                                </div>
                                <div class="mb-3">
                                    <label for="headerImage" class="form-label">Image de l'en-tête</label>
                                    <input type="file" class="form-control" id="headerImage">
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier l'en-tête</button>
                            </form>

                            <hr>

                            <!-- Section for Footer Settings -->
                            <h3>Modifier le Pied de page</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="footerText" class="form-label">Texte du pied de page</label>
                                    <textarea class="form-control" id="footerText" rows="3">© 2024 Jemo. Tous droits réservés.</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier le pied de page</button>
                            </form>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
