<?php
include '../database/connexion.php';
include '../database/site_global_request.php';
include '../database/search_request.php';

?>

<!-- Head et doctype -->
<?php //include '../composants/header.php'; ?>
<!-- navigation + connexion a la bdd-->
<?php
//include '../composants/navigation_resultatRecherche.php';

?>
<!-- BARRE DE RECHERCHE -->
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
        <div class="rectangle02">
            <header class="header">
                <div class="box_header">
                    <div class="logo"></div>
                    <nav>
                        <!-- retour a l'accueil -->
                        <ul>
                            <li class="back_users_home_page"><a href="../index.php">Accueil</a></li>
                        </ul>
                        <!-- lien metier -->
                        <ul>
                            <?php
                            foreach ($categories as $afficher) {
                                # code...
                            
                                ?>
                                <li class="job_item trigger-modal"><a class=" primary_style"
                                        href="?cat=<?= $afficher['nom_domaine'] ?>"><?= $afficher['nom_domaine'] ?></a></li>
                            <?php } ?>
                            <!-- <li class="job_item trigger-modal"><a href="?cat=FRGA">Photographe</a></li>
                            <li class="job_item trigger-modal"><a href="pao.php">infographiste PAO</a></li>
                            <li class="job_item trigger-modal"><a href="integrateur.php"> Intégrateur web </a></li>
                            <li class="job_item trigger-modal"><a href="monteur.php"> Monteur vidéo </a></li> -->
                        </ul>
                        <!-- Lien pour etre -->
                        <ul>
                            <li class="to_be"><a href="../infographe/inscription_infographiste.php">Devenir
                                    infographiste </a></li>
                            <li class="to_be"><a href="../annonceur/inscription_anonceur.php">Publier une annonce </a>
                            </li>
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
                            <a href="../connexion.php">
                                <div class="user-icon" id="userIcon">
                                    <div class="circle-user"></div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <div class="box_search02">
                <div class="search02">
                    <div class="box_searchform02">
                        <!-- <form class="searchform" method="POST"> -->
                        <input type="search" value="<?php echo $recherche; ?>" id="searchInput"
                            placeholder="ville, métier infographiste, commune">
                        <input type="submit" value="Trouver" id="searchButton">
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <!-- End BARRE DE RECHERCHE -->
        </div>
        <!-- end rectangle vert -->
    </div>
    <main class="main_result">
        <div class="countResult">
            <b class="resultats-de-recherche">Résultats de recherche</b>
            <div class="sur-6000-trouvs"><span id="trouver"><?= count($searchResult) ?></span> trouvés</div>
        </div>
        <div class="box_countResult__x__cardInfographiste" id="results">

            <!-- Card infographistes -->
            <?php

            if (!empty($searchResult)) {



                foreach ($searchResult as $afficher) {
                    # code...
            
                    ?>
                    <div class="cardInfographiste">
                        <a href="profil_consultation.php?id=<?= $afficher['id_infographe'] ?>" class="second_style">
                            <div class="rectangle-div_radius">
                                <div class="profil_picture"><img class="profil-picture-icon" alt=""
                                        src="http://jemo.test/api/<?= $afficher['photo_infographe'] ?>" style="width:250px">
                                </div>
                                <div class="description_illustration">
                                    <div class="name_infographiste"><?= $afficher['nom_infographe'] ?>
                                        <span><?= $afficher['prenom_infographe'] ?></span>
                                    </div>
                                    <i class="job"><?= $afficher['specialite_infographe'] ?></i>
                                    <p class="leaders-are-made">
                                        <?= $afficher['description_infographe'] ?>
                                    </p>

                                    <!-- <div class="box_stars">
                                        <img class="star-solid-icon" alt="dsfg" src="star-solid.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">

                                    </div> -->
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <img src="../media/icon/face-grin-beam-sweat.png" alt="">
                <p style="text-align: center;">Aucun résultat trouvé pour cette recherche</p>
            <?php } ?>

        </div>


    </main>

    <!-- FOOTER -->
    <!-- footer + liens script-->
    <?php
    include '../composants/footer.php';
    ?>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        // Fonction pour faire une requête AJAX avec jQuery
        function searchAPI(query) {
            console.log(query);
            // URL de l'API (à remplacer par l'API réelle)
            const apiUrl = `http://jemo.test/api/search_profil.php?q=${query}`;

            // Requête AJAX avec jQuery
            $.ajax({
                url: apiUrl, // URL de l'API
                method: 'GET', // Méthode GET
                success: function (response) {
                    console.log(response);
                    const res = JSON.parse(response);

                    if (res.success) {
                        // Traitement des données
                        console.log(res.data);
                        console.log(res.data.qty);

                        $('#trouver').html(res.data.qty);
                        if (res.data.profiles.length === 0) {

                            $('#results').html(`
                        <div class="SMS_error"
                            style="display: flex;
                            flex-direction: column;
                            align-items: center; /* Centrer verticalement */
                            justify-content: center; /* Centrer horizontalement */
                            padding: 20px;"
                            gap: 10px; /* Espace entre l'image et le texte */
                        >
                            <img src="../media/icon/face-grin-beam-sweat.png" alt="Erreur" />
                            <p>Aucun résultat trouvé pour cette recherche</p>
                        </div>`);
                        } else {
                            displayResults(res.data.profiles);

                        }
                    } else {
                        // Gestion des erreurs

                        $('#results').html(`
                        <div class="SMS_error"
                            style="display: flex;
                            flex-direction: column;
                            align-items: center; /* Centrer verticalement */
                            justify-content: center; /* Centrer horizontalement */
                            padding: 20px;"
                            gap: 10px; /* Espace entre l'image et le texte */
                        >
                            <img src="../media/icon/face-grin-beam-sweat.png" alt="Erreur" />
                            <p>Aucun résultat trouvé pour cette recherche</p>
                        </div>`);
                    }

                },
                error: function (xhr, status, error) {
                    // Gérer les erreurs
                    console.error("Erreur:", error);
                    $('#results').html(`
                        <div class="SMS_error"
                            style="display: flex;
                            flex-direction: column;
                            align-items: center; /* Centrer verticalement */
                            justify-content: center; /* Centrer horizontalement */
                            padding: 20px;"
                            gap: 10px; /* Espace entre l'image et le texte */
                        >
                            <img src="../media/icon/face-grin-beam-sweat.png" alt="Erreur" />
                            <p>Aucun résultat trouvé pour cette recherche</p>
                        </div>`);
                }
            });
        }

        // Fonction pour afficher les résultats
        function displayResults(data) {
            const resultsDiv = $('#results');
            resultsDiv.empty(); // Nettoyer les anciens résultats
            console.log(data);
            if (data && data.length > 0) {
                data.forEach(item => {
                    const itemDiv = $(`
                <div class="cardInfographiste">
                    <a href="profil_consultation.php?id=${item.id_infographe} " class="second_style">
                        <div class="rectangle-div_radius">
                            <div class="profil_picture">
                                <img class="profil-picture-icon" alt="" src="http://jemo.test/api/${item.photo_infographe}">
                            </div>
                            <div class="description_illustration">
                                <div class="name_infographiste">${item.nom_infographe} <span>${item.prenom_infographe}</span></div>
                                <i class="job">${item.specialite_infographe}</i>
                                <p class="leaders-are-made">${item.description_infographe}</p>
                            </div>
                        </div>
                    </a>
                </div>
            `); // Utilisation des backticks pour inclure le HTML dans la chaîne de texte
                    $('#results').append(itemDiv);
                });
            } else {
                $('#results').text("Aucun résultat trouvé.");
            }
        }

        // Ajoutez un écouteur d'événements au bouton de recherche
        $('#searchButton').on('click', function () {
            const query = $('#searchInput').val();
            if (query) {

                searchAPI(query); // Appeler la fonction de recherche avec la valeur de l'entrée
            } else {
                alert("Veuillez entrer une recherche.");
            }
        });
    </script>
</body>

</html>