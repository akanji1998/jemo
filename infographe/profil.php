<?php
include '../database/connexion.php';
include('../database/infographe/infographe_request.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
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
                        <!-- <ul>
                                <li class="back_users_home_page">Accueil</li>
                            </ul> -->
                    </nav>
                    <div class="rectangle-div1">
                        <nav>
                            <ul>
                                <li><a href="dashboard.php">Mission</a></li>
                                <li><a href="profil.php">Profil</a></li>

                                <li><a href="mesprojets.php">mes projets</a></li>
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
                <?= $infographe['specialite_infographe'] ?>
            </div>
            <!-- juste un design -->
            <div class="infographiste_summ">
                <div class="rectangle-div01">
                    <div class="profil_picture01">
                        <!-- <img class="phto-say2-icon" alt="" src="phto say2.png"> -->
                    </div>

                    <div class="box_summ">
                        <div class="origin_x_name">
                            <div class="name"><?= $infographe['nom_infographe'] ?>
                                <?= $infographe['prenom_infographe'] ?>
                            </div>
                            <div class="origin">Côte d'ivoire, Songon</div>
                        </div>

                        <div class="title_work_mode">Mode de travail</div>
                        <div class="work_mode">Distance</div>

                        <div class="title_contract">Contrat</div>
                        <div class="contract">
                            <span><?= $infographe['contrat_infographe'] ?></span>
                            <!-- <span>STAGE</span>
                            <span>CDI</span> -->
                        </div>

                        <div class="title_diplome">Diplome</div>
                        <div class="diplome">
                            <ul>
                                <li>Licence professionnelle Arts et images numérique</li>
                            </ul>
                        </div>

                        <!-- <div class="title_social_links">Liens social</div> -->
                        <!-- <div class="social_link">
                                <ul>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                    <li><img src="behance.svg" width="18" alt=""> <a href="#">www.behance.com</a></li>
                                </ul>
                            </div> -->

                        <p class="delete_profil"><a href="#">supprimer mon profil</a></p>
                        <p class="delete_profil"><a href="modifier_profil.php">Modifier mon profil</a></p>

                    </div>
                </div>

            </div>


            <div class="boxmindset_infographiste">
                <h4 class="mindset">Presentation</h4>
                <p class="text_mindset">
                    <?= $infographe['description_infographe'] ?>
                </p>

                <h4 class="portfolio">Portfolio</h4>
                <div class="box_illustation_created">
                     <?php if (empty($realisations) ) {
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
                   

                </div>




                <!-- <div class="box__contact_profil_wha">
                        <div class="numero"><a href="tel:[+225]0545475763"><i></i>Appeler</a></div>
                        <span>OU</span>
                        <div class="numWha"><a href="https://wa.me/2250545475763"> what's app : 05 XX XX XX XX</a></div> 
                        <span>OU</span>
                        <div class="numWha"><a href="/pdf/#"> voir CV</a></div> 
                    </div> -->
                <!-- <p class="delete_profil">supprimer mon profil</p> -->

            </div>
        </div>


    </main>


    <script src="script_hovers.js"></script>
</body>

</html>