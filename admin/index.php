<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jemo Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
                    <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <!-- Nav Item - User Information -->

                        <div id="date-time" class="text-muted m2"></div>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>


                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile" src="../media/public/images/photos_membres/ppp.png" width="35">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Michel Amani</span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                        Paramètres
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Se déconnecter
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>                    

                    <!-- Dashboard stats -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card text-center border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">En ligne</h5>
                                            <p class="card-text fs-3">200</p>
                                        </div>
                                        <div class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">Traffic journalier</h5>
                                            <p class="card-text fs-3">2,699</p>
                                        </div>
                                        <div class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">Clique sur contact</h5>
                                            <p class="card-text fs-3">2,469</p>
                                        </div>
                                        
                                        <!-- <div class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between">
                                            <h5 class="card-title">Revenu publicitaire</h5>
                                            <p class="card-text fs-3">100 XOF</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Traffic Chart -->
                    <div class="card mb-4 flex-grow-1 col-md-8">
                        <div class="card-header">
                            Traffic mensuel
                        </div>
                        <div class="card-body">
                            <canvas id="trafficChart"></canvas>
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

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Voulez-vous vraiment vous déconnecter ?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sélectionnez "Se déconnecter" ci-dessous si vous êtes prêt à terminer votre session actuelle.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                    <a class="btn btn-success" href="login.php">Se déconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
