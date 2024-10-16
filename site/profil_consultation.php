<?php
include("../database/connexion.php");
include '../database/site_global_request.php';
include("../database/fetch_infographe_by_id.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <title>Jemo.ci</title>
    <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <style>
        .realisation-card {
    width: 100%;
    height: 400px;
    border: 2px solid #ccc;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;    
    background-color: #fff;
}
.realisation-card p {
    font-size: 18px;
    color: #999;
    text-align: center;
}
    </style>
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
                                <li class="to_be"><a href="../infographe/inscription_infographiste.php" class=" primary_style">Devenir
                                        infographiste
                                    </a></li>
                                <li class="to_be"><a
                                        href="<?php echo isset($_SESSION['user_type']) == "annonceur" ? "../annonceur/dashboard.php" : "../connexion.php"; ?>">Publier
                                        une annonce </a></li>
                            </ul>
                        </nav>
                
                        <div class="user-menu-container">
                            <?php

                            if (isset($_SESSION['user_type'])) {



                                ?>
                                <a
                                    href="<?php echo $_SESSION['user_type'] == "annonceur" ? "../annonceur/dashboard.php" : "../infographe/dashboard.php"; ?>">
                                    <div class="user-icon" id="userIcon">
                                        <div class="circle-user"></div>
                                    </div>
                                </a>
                            <?php } else {

                                ?>
                                <a href="../connexion.php">
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

            </div>   
            <!-- end rectangle vert -->
        </div>

        <main>
            <div class="rectangle-div">
                <div class="title_infographiste">
                    <?= $infographe['specialite_infographe'] ?>
                </div>
                <!-- juste un design -->
                <div class="infographiste_summ">
                    <div class="rectangle-div01">
                        <div class="profil_picture01" style="background-image: url(http://jemo.test/api/<?= $infographe['photo_infographe'] ?>);">
                            <!-- <img class="phto-say2-icon" alt="" src=""> -->
                        </div>

                        <div class="box_summ">
                            <div class="origin_x_name">
                                <div class="name">  <?= $infographe['nom_infographe'] ?> <?= $infographe['prenom_infographe'] ?></div>
                                <div class="origin">Côte d'ivoire, Songon</div>
                            </div>
    
                            <!-- <div class="title_work_mode">Mode de travail</div>
                            <div class="work_mode">Distance</div> -->

                            <div class="title_specia">specialité</div>
                            <div class="specia">
                                <span><?= $infographe['specialite_infographe'] ?></span>
                            </div>

                            <div class="title_contract">Contrat</div>
                            <div class="contract">
                                <span><?= $infographe['contrat_infographe'] ?></span>
                                <!-- <span>STAGE</span>
                                <span>CDI</span> -->
                                
                            </div>
                            
                            <!-- <div class="title_diplome">Diplome</div>
                            <div class="diplome">
                                <ul>
                                    <li>Licence professionnelle Arts et images numérique</li>
                                </ul>
                            </div> -->
                            
                            <!-- <div class="title_social_links">Liens social</div> -->
                            <!-- <div class="social_link">
                                <ul>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                </ul>
                            </div> -->

                        </div>
                    </div>

                </div>   


                <div class="boxmindset_infographiste">
                    <h4 class="mindset">Présentation</h4>
                    <p class="text_mindset"><?= $infographe['description_infographe'] ?>
                    </p>

                    <h4 class="portfolio">Portfolio</h4>

                    <?php
                    if (empty($realisations) ) {
                        # code...
                    
                        ?>
                        <div class="realisation-card">
                             <p>Ce professionnel n'a pas encore ajouté de réalisation</p>
                        </div>
                    <?php } ?>
                    <?php
                    foreach ($realisations as $afficher) {
                        # code...
                    
                        ?>
                        <div class="card_illustration_created illustration_01">
                            <p class="illustration_description">
                                <?= $afficher['libelle_realisation'] ?>
                            </p>
                        </div>
                    <?php } ?>
                    <!-- <div class="box_illustation_created">
                        <div class="card_illustration_created illustration_01">
                            <p class="illustration_description">
                                Spot animatique et motion <br> logo 2d / 3d
                            </p>
                        </div>
                        <div class="card_illustration_created illustration_01">
                            <p class="illustration_description">
                                Conception de storyboard
                            </p>
                        </div>
                        <div class="card_illustration_created illustration_01">
                            <p class="illustration_description">
                                Montage vidéo
                            </p>
                        </div>
                        <div class="card_illustration_created illustration_01">
                            <p class="illustration_description">
                                Charte graphique
                            </p>
                        </div>
                    </div> -->


                    <div class="remark">
                        <p class="text_remark color_text_remark">
                            NB : L'absence d'une gestion des transactions financieres
entre vous et le professionnel. nous oblige a nous désengager de toutes relations entre vous et le professionnel
                        </p>
                    </div>

                    <div class="box__contact_profil_wha">
                        <div class="numero"><a href="tel:+225<?= $infographe['telephone_infographe'] ?>"><i></i>Appeler</a></div>
                        <span>OU</span>
                        <div class="numWha"><a href="https://wa.me/225<?= $infographe['telephone_infographe'] ?>"> what's app : <?= $infographe['telephone_infographe'] ?></a></div> 
                        <!-- <span>OU</span> -->
                        <!-- <div class="numWha"><a href="/pdf/#"> voir CV</a></div>  -->
                    </div>

                </div>
            </div>

        </main>


        <!-- <script src="script_hovers.js"></script> -->
    </body>
    </html>