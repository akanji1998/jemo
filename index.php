<?php
include 'database/connexion.php';
include 'database/site_global_request.php';

?>

<!-- Head et doctype -->
<?php include 'composants/header.php'; ?>
<!-- navigation + connexion a la bdd-->
<?php
include 'composants/navigation.php';
?>

<!-- BARRE DE RECHERCHE -->
<div class="box_search_x_illustrations">
    <div class="search">
        <div class="bigidea">
            <h2>Trouvez l’ <span>infographiste</span><br>
                dont vous avez besoin</h2>
        </div>
        <div class="box_searchform">
            <form class="searchform" action="site/recherche.php" method="GET">
                <input type="search" name="rech" placeholder="ville, métier infographiste, commune" required>
                <input type="submit"
                    value="Trouver">
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
                            <img src="http://jemo.test/admin/api/uploads/<?= $afficher['image_domaine'] ?>" alt="img_works"
                                height="370" width="300">
                        </div>
                    </div>
                </a>
                <?php

            }
            ?>
            <a href="">
                <div class="cards_categories_works">
                    <h3 class="title">Monteur video</h3>
                    <div>
                        <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works"
                            height="370">
                    </div>
                </div>
            </a>
            <a href="">
                <div class="cards_categories_works">
                    <h3 class="title">infographe PAO</h3>
                    <div>
                        <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works"
                            height="370">
                    </div>
                </div>
            </a>
            <a href="">
                <div class="cards_categories_works">
                    <h3 class="title">Modélisation 3D</h3>
                    <div>
                        <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works"
                            height="370">
                    </div>
                </div>
            </a>
        </div>
        <!-- lien metier -->
        <ul>
            <?php
            foreach ($categories as $afficher) {
                # code...
            
                ?>
                <li class="job_item"><a href="photographe.php"><?= $afficher['nom_domaine'] ?></a></li>
            <?php } ?>
            <li class="job_item"><a href="infographiste.php">infographiste PAO </a></li>
            <li class="job_item"><a href="integrateur.php">Intégrateur web </a></li>
            <li class="job_item"><a href="monteur.php">Monteur vidéo </a></li>
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
            <a href="">
                <div class="card">
                    <img src="media/public/phto say.png" alt="Profil">
                    <div class="card-content">
                        <div class="initials">SC</div>
                        <div class="card-title">Motion Designer</div>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="card">
                    <img src="media/public/phto say.png" alt="Profil">
                    <div class="card-content">
                        <div class="initials">DJ</div>
                        <div class="card-title">Infographiste PAO</div>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="card">
                    <img src="media/public/phto say.png" alt="Profil">
                    <div class="card-content">
                        <div class="initials">AM</div>
                        <div class="card-title">Intégrateur web</div>
                    </div>
                </div>
            </a>
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
                Sur Jemo, la publication d’une annonce vous permet de trouver facilement des professionnels qualifiés.
                Grâce à notre plateforme intuitive, vous pouvez rédiger
                une description claire de vos besoins, fixer un budget et attirer des talents qui correspondent à vos
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
<?php
require_once 'composants/footer.php';
?>