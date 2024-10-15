<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse vh-100 border-end border-1">
    <div class="position-sticky pt-3 d-flex flex-column h-100">
        <div class="text-center mb-4">
            <img src="../media/icon/logo_green.svg" alt="Jemo Logo" class="img-fluid mb-2">
            <h4 class="color_txt1">Center</h4>
        </div>
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link active" href="admin/index.php">Dashboard</a>
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseArticles" aria-expanded="false"
                                aria-controls="collapseArticles">
                                Articles
                            </button>
                        </h2>
                        <div id="collapseArticles" class="accordion-collapse collapse" aria-labelledby="headingArticles"
                            data-bs-parent="#accordionArticles">
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