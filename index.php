<?php
include 'database/connexion.php';
include 'database/site_global_request.php';

?>

<!-- Head et doctype -->
<?php //include 'composants/header.php'; ?>
<!-- navigation + connexion a la bdd-->
<?php
// include 'composants/navigation.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <title>Jemo.ci</title>
    <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
</head>


<body>
    <!-- HTML Structure for Modal -->
    <div id="customModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="modal-body">
                <img src="path/to/icon.png" alt="Icon" class="modal-icon" />
                <h2>Désolé</h2>
                <p>La fonctionnalité est en plein déploiement et sera disponible bientôt</p>
            </div>
        </div>
    </div>
    <div class="box">
        <!-- rectangle vert -->
        <div class="rectangle">
            <header class="header">
                <div class="box_header">
                    <div class="logo"></div>
                    <nav>
                        <!-- retour a l'accueil -->
                        <ul>
                            <li class="back_users_home_page" active><a href="../index.php">Accueil</a></li>
                        </ul>
                        <!-- lien metier -->
                        <ul>
                            <?php
                            foreach ($categories as $afficher) {
                                # code...
                            
                                ?>
                                <li class="job_item trigger-modal"><a class=" primary_style"
                                        href="site/recherche.php?cat=<?= $afficher['nom_domaine'] ?>"><?= $afficher['nom_domaine'] ?></a>
                                </li>
                            <?php } ?>
                            <!-- <li class="job_item trigger-modal"><a class=" primary_style"
                                    href="site/recherche.php?cat=jdsqdfs">infographiste
                                    PAO</a></li>
                            <li class="job_item trigger-modal"><a class=" primary_style" href="integrateur.php">
                                    Intégrateur web </a></li>
                            <li class="job_item trigger-modal"><a class=" primary_style" href="monteur.php"> Monteur
                                    vidéo </a></li> -->
                        </ul>
                        <!-- Lien pour etre -->
                        <ul>
                            <li class="to_be"><a href="infographe/inscription_infographiste.php"
                                    class=" primary_style">Devenir infographiste
                                </a></li>
                            <li class="to_be"><a
                                    href="<?php echo isset($_SESSION['user_type']) == "annonceur" ? "annonceur/dashboard.php" : "connexion.php"; ?>">Publier
                                    une annonce </a></li>
                        </ul>
                    </nav>

                    <div class="user-menu-container">
                        <?php

                        if (isset($_SESSION['user_type'])) {



                            ?>
                            <a
                                href="<?php echo $_SESSION['user_type'] == "annonceur" ? "annonceur/dashboard.php" : "infographe/dashboard.php"; ?>">
                                <div class="user-icon" id="userIcon">
                                    <div class="circle-user"></div>
                                </div>
                            </a>
                        <?php } else {

                            ?>
                            <a href="connexion.php">
                                <div class="user-icon" id="userIcon">
                                    <div class="circle-user"></div>
                                </div>
                            </a>
                        <?php } ?>
                        <!-- <div class="menu" id="menu">
                                <ul>
                                    <li><a href="connexion.php">Se connecter</a></li>
                                </ul>
                            </div> -->
                    </div>
                </div>
            </header>


            <!-- BARRE DE RECHERCHE -->
            <div class="box_search_x_illustrations">
                <div class="search">
                    <div class="bigidea">
                        <h2>Trouvez l’ <span>infographiste</span><br>
                            dont vous avez besoin</h2>
                    </div>
                    <div class="box_searchform">
                        <form class="searchform" action="site/recherche.php" method="GET">
                            <input type="search" name="rech" placeholder="ville, métier infographiste, commune"
                                required>
                            <input type="submit" value="Trouver">
                        </form>
                    </div>
                </div>
                <!-- PROFIL illustration -->
                <div class="illustrations">
                    <div class="profi_illustration">
                        <!-- img in css -->
                        <div class="info_x_img_profil_illustration">
                            <div class="img_icon_profil"></div>
                            <div class="info_profil">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end rectangle vert -->
        </div>

        <!-- CORPS -->
        <main>
            <section class="section container_categories">
                <h2 class="title_section structure_padding">Catégories</h2>

                <div class="container_cards_categories">
                    <?php
                    foreach ($categories as $afficher) {
                        # code...
                    
                        ?>
                        <a href="">
                            <div class="cards_categories_works">
                                <h3 class="title"><?= $afficher['nom_domaine'] ?></h3>
                                <div>
                                    <img src="http://jemo.test/admin/api/uploads/<?= $afficher['image_domaine'] ?>"
                                        alt="img_works" height="370" width="300">
                                </div>
                            </div>
                        </a>
                        <?php

                    }
                    ?>
                  
                </div>
                <!-- lien metier -->
                <ul>
                    <?php
                    foreach ($categories as $afficher) {
                        # code...
                    
                        ?>
                        <li class="job_item"><a href="photographe.php"
                                class="second_style"><?= $afficher['nom_domaine'] ?></a></li>
                    <?php } ?>
                
                </ul>
            </section>

            <!-- TOP INFOGRAPHISTE -->
            <section class="section section_top_info">
                <h2 class="title_section">TOP Infographiste</h2>
                <div class="container_cards_top_info">
                    <?php
                    foreach ($topInfographes as $afficher) {
                        # code...
                    
                        ?>
                        <a href="">
                            <div class="card">
                                <img src="media/public/phto say.png" alt="Profil">
                                <div class="card-content">
                                    <div class="initials">
                                        <?= $afficher['nom_infographe'][0] . $afficher['prenom_infographe'][0]; ?>
                                    </div>
                                    <div class="card-title"><?= $afficher['specialite_infographe']; ?></div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                   
                </div>
            </section>

            <!-- MISSION -->
            <section class="section section_missions">
                <!-- <h2 class="title_section">Notre mission</h2> -->
                <div class="video-container">
                    <video id="video" width="1000" height="508" controls>
                        <source src="media/public/Chez Jemo.mp4" type="video/mp4">
                        <source src="path_to_video.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <div class="play-button" id="playButton"></div>
                </div>
            </section>

            <!-- SESSION PUBIER UNE ANNONCE -->
            <section class="section publish_ads">
                <div class="pair">
                    <h2 class="title_section">Publier une annonce</h2>
                    <p class="para1">Vous avez besoin d’un infographiste pour réaliser vos projets créatifs ?
                        Sur Jemo, la publication d’une annonce vous permet de trouver facilement des professionnels
                        qualifiés.
                        Grâce à notre plateforme intuitive, vous pouvez rédiger
                        une description claire de vos besoins, fixer un budget et attirer des talents qui correspondent
                        à vos
                        attentes. <br>
                        <button class="btn-publish trigger-modal">Publier</button>
                    </p>
                </div>
                <div class="pair">
                    <img src="media/public/aff.png" alt="" width="700">
                </div>
            </section>
        </main>

        <!-- footer + liens script-->
        <!--footer-->
        <footer class="footer">
            <div class="logo_green"></div>
            <div class="box_footer_items">
                <div class="container_items">
                    <ul>

                        <li> <a class="primary_style" href="topfreelancer.php">Top Freelancer</a></li>
                        <li><a class="primary_style" href="photographe.php">Photographe</a></li>
                        <li><a class="primary_style" href="motion.php">motion designer / monteur</a></li>
                        <li> <a class="primary_style" href="illustrateur.php">illustrateur 2D</a></li>
                        <li> <a class="primary_style" href="integrateur.php">intégrateur web</a></li>
                        <li> <a class="primary_style" href="pao.php">PAO</a></li>
                    </ul>
                    <ul>
                        <li> <a class="primary_style" href="blog.php">Blog</a></li>
                        <li> <a class="primary_style" href="formations.php">Formations</a></li>
                        <li> <a class="primary_style" href="recrutement.php">recrutements</a></li>
                        <li> <a class="primary_style" href="support.php">helps_&_Supports-jemo</a></li>
                        <li> <a class="primary_style" href="apropos.php">A propos</a></li>
                    </ul>
                    <ul>
                        <!-- <li>  <a href="#">Politique de confidentialité</a></li> -->
                        <li> <a class="primary_style" href="cookies.php">Gestion des cookies</a></li>
                        <li> <a class="primary_style" href="conditions.php">Termes et conditions</a></li>
                        <li> <a class="primary_style" href="legislationivoire.php">Législation ivoirienne</a></li>
                    </ul>
                    <ul>
                        <li> <a class="primary_style" href="cookies.php">Gestion des cookies</a></li>
                        <li> <a class="primary_style" href="conditions.php">Termes et conditions</a></li>
                        <li> <a class="primary_style" href="legislationivoire.php">Législation ivoirienne</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="copyright">jemo - 2023-2024</h3>
                </div>
            </div>
        </footer>
</body>

<script src="js/script_hovers.js"></script>
<script src="js/script_lecteur_video.js"></script>
<script src="js/script.js"></script>

</html>



<!-- jQuery -->
<!-- <script src="js/jquery.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="js/scripts.js"></script> -->
</body>

</html>