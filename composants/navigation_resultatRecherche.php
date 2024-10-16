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
            <div class="rectangle02">
                <header class="header">
                    <div class="box_header">
                        <div class="logo"></div>
                        <nav>
                            <!-- retour a l'accueil -->
                            <ul>
                                <li class="back_users_home_page"><a class="primary_style active" href="../index.php">Accueil</a></li>
                            </ul>
                            <!-- lien metier -->
                            <ul>
                                  <?php
                            foreach ($categories as $afficher) {
                                # code...
                            
                                ?>
                                <li class="job_item trigger-modal"><a class="primary_style" href="?cat=<?= $afficher['nom_domaine'] ?>"><?= $afficher['nom_domaine'] ?></a></li>
                            <?php } ?>
                                <li class="job_item trigger-modal"><a class="primary_style" href="?cat=FRGA">Photographe</a></li>
                                <li class="job_item trigger-modal"><a class="primary_style" href="pao.php">infographiste PAO</a></li>
                                <li class="job_item trigger-modal"><a class="primary_style" href="integrateur.php"> Intégrateur web </a></li>
                            </ul>
                            <!-- Lien pour etre -->
                            <ul>
                                <li class="to_be"><a class="primary_style" href="../infographe/inscription_infographiste.php">Devenir infographiste </a></li>
                                <li class="to_be"><a class="primary_style" href="../annonceur/inscription_anonceur.php">Publier une annonce </a></li>
                            </ul>
                        </nav>

                        <div class="user-menu-container">
                            <div class="user-icon" id="userIcon">
                                <div class="circle-user"></div>
                            </div>
                            <div class="menu" id="menu">
                                <ul>
                                    <li><a href="connexion.php">Se connecter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>