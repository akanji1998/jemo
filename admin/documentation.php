<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation - Jemo Dashboard</title>
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
                        <h1 class="h2">Documentation</h1>
                    </div>

                    <!-- Documentation Sections -->
                    <div class="card mb-4 flex-grow-1">
                        <div class="card-body">
                            <h3>Introduction</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim. Vivamus pulvinar imperdiet tortor, a auctor lectus volutpat non.</p>
                            
                            <h3>Using the Dashboard</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis elit neque. Cras at massa a velit venenatis bibendum.
                                Phasellus gravida velit ac felis ullamcorper, at tincidunt justo dapibus. Fusce id libero in turpis convallis malesuada ut nec lacus.
                            </p>
                            <ul>
                                <li><strong>Dashboard Overview</strong>: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dictum dolor eu lorem fermentum scelerisque.</li>
                                <li><strong>Accessing User Information</strong>: Proin finibus, erat et ullamcorper pharetra, libero lorem gravida lectus, vitae lacinia justo mauris ut eros.</li>
                                <li><strong>Working with Data</strong>: Aenean varius feugiat risus, vel tincidunt arcu. Integer tincidunt interdum tellus a pretium.</li>
                            </ul>

                            <h3>Managing Infographistes</h3>
                            <p>
                                Nulla facilisi. In hac habitasse platea dictumst. Curabitur sollicitudin auctor purus, sed bibendum orci vestibulum in. Vivamus consequat pharetra turpis.
                            </p>

                            <h3>Managing Annonceurs</h3>
                            <p>
                                Fusce quis massa tortor. Cras euismod mauris ut eros placerat, sit amet malesuada sapien convallis. Quisque nec efficitur felis.
                            </p>

                            <h3>Managing Administrators</h3>
                            <p>
                                Phasellus scelerisque ex lorem, at ultrices sem dapibus sit amet. Vestibulum vestibulum ligula euismod diam vulputate, sit amet vulputate velit vehicula.
                            </p>
                            
                            <h3>Technical Support</h3>
                            <p>
                                Vivamus vehicula magna sit amet dui hendrerit, ac viverra elit tristique. Quisque volutpat erat id nulla molestie, ut vehicula arcu vehicula. 
                                Donec a elit ligula. Nam eget lobortis mi, nec sodales nisl.
                            </p>

                            <h3>FAQs</h3>
                            <p>
                                <strong>Q: How do I reset my password?</strong><br>
                                A: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mollis accumsan vehicula.
                            </p>
                            <p>
                                <strong>Q: How can I contact support?</strong><br>
                                A: Suspendisse potenti. Curabitur sed dignissim lectus. Cras ut mi nec ante suscipit malesuada.
                            </p>
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
