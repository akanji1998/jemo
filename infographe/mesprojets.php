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
    <style>
        /* Styles généraux */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f9f9f9;
} */
        /* Conteneur principal */
        .container_realisation {
            width: 90%;
            text-align: center;
        }

        /* Header */
        .header_realisation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 16px;
            font-weight: bold;
        }

        .add-link {
            font-size: 14px;
            color: #007BFF;
            text-decoration: none;
        }

        .add-link:hover {
            text-decoration: underline;
        }

        /* Grille des projets */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        /* Boîtes des projets */
        .project-box {
            width: 100%;
            height: 100px;
            border: 2px solid #cccccc;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #cccccc;
            font-size: 14px;
        }

        /* Première boîte avec texte noir */
        .project-box:first-child {
            color: #000;
        }

        /* Lien de suppression du profil */
        .delete-profile {
            font-size: 12px;
            color: #999999;
            text-decoration: none;
        }

        .delete-profile:hover {
            text-decoration: underline;
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
            <div class="container_realisation">
                <div class="header_realisation">
                    <h2>Mes réalisations</h2>
                    <a href="#" class="add-link">Ajouter</a>
                </div>
                <!-- <div class="projects-grid">
            <div class="project-box center-text">modifier</div>
            <div class="project-box center-text"></div>
            <div class="project-box center-text"></div>
            <div class="project-box center-text"></div>
        </div> -->
                <!-- <a href="#" class="delete-profile">supprimer mon profil</a> -->
                <div class="boxmindset_infographiste">
                    
                    <p class="text_mindset">
                        <?= $infographe['description_infographe'] ?>
                    </p>

                    <h4 class="portfolio">Portfolio</h4>
                    <div class="box_illustation_created">
                        <?php if (empty($realisations)) {
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


                </div>
            </div>

        </div>


    </main>


    <script src="script_hovers.js"></script>
</body>

</html>