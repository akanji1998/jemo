<?php
include '../database/connexion.php';
include('../database/annonceur/annonceur_request.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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

        <div class="rectangle-div">
            <div class="title_infographiste">
                <?= $annonceur['username_annonceur'] ?>
            </div>
            <!-- juste un design -->
            <div class="infographiste_summ">
                <div class="rectangle-div01">
                    <div class="profil_picture01">
                        <img class="phto-say2-icon" alt=""
                            src="http://jemo.test/api/<?= $annonceur['photo_annonceur'] ?>" height="200" width="200">
                    </div>

                    <div class="box_summ">
                        <div class="origin_x_name">
                            <div class="name"><?= $annonceur['nom_annonceur'] ?> <?= $annonceur['prenom_annonceur'] ?>
                            </div>
                            <div class="origin">Côte d'ivoire, Songon</div>
                        </div>


                        <!-- <div class="title_social_links">Liens social</div> -->
                        <!-- <div class="social_link">
                                <ul>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                </ul>
                            </div> -->

                        <p class="delete_profil"><a href="">supprimer mon profil</a></p>

                    </div>
                </div>

            </div>

            <div class="boxmindset_infographiste">
                <h4 class="portfolio">Liste des annonces</h4>
                <div class="table_annonce">

                    <div class="col-md-12">
                        <div class="card mb-4">

                            <div class="card-body">
                                <table class="table table-borderless">
                                    <thead>

                                        <th>Titres</th>
                                        <th>Descriptions</th>
                                        <th>Actions</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($listDesAnnonces as $afficher) {
                                                # code...
                                            
                                        ?>
                                        <tr class="border-bottom">
                                            <td><?= $afficher['titre_annonce']?></td>
                                            <td><?= $afficher['description_annonce'] ?></td>
                                            <td><a href="#" class="text-danger"><i
                                                        class="fas fa-trash"></i>supprimer</a> <a href="edit_annonce.php?edit=<?= $afficher['id_annonce']?>"
                                                    class="text-primary"><i class="fas fa-edit"></i>modifier</a></td>
                                            <td></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <!-- Pagination -->
                                <!-- <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">&raquo;</a>
                                        </li>
                                    </ul>
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="script_hovers.js"></script>
</body>

</html>