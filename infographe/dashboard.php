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

        <header class="bg-primary text-white py-3 bgcolor_header_mission">
            <div class="container_mission_bar">
                <!-- <h1 class="text-center">Jemo</h1>
            <div class="search-bar mt-4">
                <input type="text" class="form-control" placeholder="logo">
                <div class="btn-group mt-2" role="group">
                    <button class="btn btn-light">Photographe</button>
                    <button class="btn btn-light">Infographiste PAO</button>
                    <button class="btn btn-light">Intégrateur Web</button>
                    <button class="btn btn-light">Monteur vidéo</button>
                </div>
                <button class="btn btn-success mt-3">Rechercher</button>
            </div> -->

                <!-- BARRE DE RECHERCHE -->

                <div class="box_searchform">

                    <input type="search" id="searchInput" placeholder="logo, montage, web, motion, affiche...">
                    <input type="submit" value="Trouver" id="searchButton">

                </div>

                <!-- lien metier -->
                <!-- <nav>
                    <ul>
                        <li class="job_item trigger-modal"><a href="photographe.php">Photographe</a></li>
                        <li class="job_item trigger-modal"><a href="pao.php">infographiste PAO</a></li>
                        <li class="job_item trigger-modal"><a href="integrateur.php"> Intégrateur web </a></li>
                        <li class="job_item trigger-modal"><a href="integrateur.php"> Monteur vidéo </a></li>
                    </ul>
                </nav> -->
        </header>

        <div class="container_resultat_mission my-5">
            <h5>Résultats de recherche</h5>
            <p class="text-muted"><span id="trouver"><?= count($allAnnonces); ?></span> trouvés</p>
            <div class="row">
                <!-- Left Side: Search Results -->
                <div class="col-md-7" id="results">
                    <?php
                    foreach ($allAnnonces as $afficher) {
                        # code...
                    
                        ?>
                        <div class="list-group m-2">
                            <a href="javascript:fetchAnnonceDetail(<?= $afficher['id_annonce'] ?>)"
                                class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?= $afficher['titre_annonce'] ?></h5>
                                    <small><?= $afficher['date_annonce'] ?></small>
                                </div>
                                <p class="mb-1"><?= $afficher['description_annonce'] ?></p>
                            </a>
                            <!-- Repeat this block for more search results -->
                        </div>
                    <?php } ?>

                </div>

                <!-- Right Side: Job Description -->
                <div class="col-md-5" id="resultAnnonceDetail">
                    <!-- <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Conception de logo</h4>
                            <p class="card-text"><strong>Entreprise:</strong> 2K Group</p>
                            <p><strong>Description de la mission:</strong></p>
                            <p>
                                Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit...
                            </p>
                            <button class="btn btn-success btn-block"><a href="https://wa.me/2250545475763"> what's app
                                    : 05
                                    XX XX XX XX</a></button>
                        </div>
                    </div> -->
                </div>
            </div>


            <!-- pagination -->
            <!-- <ul class="pagination_mission">
                <li><a href="#" class="prev">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#" class="next">&raquo;</a></li>
            </ul> -->
        </div>


    </main>


    <script src="script_hovers.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        // Fonction pour faire une requête AJAX avec jQuery
        function fetchAnnonceDetail(id) {
            console.log(id);
            // URL de l'API (à remplacer par l'API réelle)
            const apiUrl = `http://jemo.test/api/search_annonce_by_id.php?id=${id}`;

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

                        displayAnnonceDetail(res.data);
                    } else {
                        // Gestion des erreurs

                        $('#resultAnnonceDetail').html("Une erreur s'est produite lors de la récupération des données.");
                    }


                },
                error: function (xhr, status, error) {
                    // Gérer les erreurs
                    console.error("Erreur:", error);
                    $('#resultAnnonceDetail').html("Une erreur s'est produite lors de la récupération des données.");
                }
            });
        }
        function searchAPI(query) {
            console.log(query);
            // URL de l'API (à remplacer par l'API réelle)
            const apiUrl = `http://jemo.test/api/search_annonces.php?q=${query}`;

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
                        if (res.data.annonces.length === 0) {
                            $('#results').html("Aucune annonce trouvé  pour votre recherche.");
                        } else {
                            displayResults(res.data.annonces);

                        }
                    } else {
                        // Gestion des erreurs

                        $('#results').html("Une erreur s'est produite lors de la récupération des données.");
                    }

                    // Traiter les données en cas de succès


                },
                error: function (xhr, status, error) {
                    // Gérer les erreurs
                    console.error("Erreur:", error);
                    $('#results').html("Une erreur s'est produite lors de la récupération des données.");
                }
            });
        }

        // Fonction pour afficher les résultats
        function displayAnnonceDetail(data) {
            console.log("displayAnnonceDetail")
            const resultsDiv = $('#resultAnnonceDetail');
            resultsDiv.empty(); // Nettoyer les anciens résultats
            console.log(data);
            //  const annonce = JSON.parse(data);
            $('#resultAnnonceDetail').html(`
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">${data.titre_annonce}</h4>
                        <p class="card-text"><strong>Entreprise:</strong> ${data.titre_annonce}</p>
                        <p><strong>Description de la mission:</strong></p>
                        <p>${data.description_annonce}</p>
                        <button class="btn btn-success btn-block">
                            <a href="https://wa.me/${data.annonceur.telephone_annonceur.replace(/ /g, '')}"> WhatsApp : ${data.annonceur.telephone_annonceur}</a>
                        </button>
                    </div>
                </div>
            `);

        }

        function displayResults(data) {

            const resultsDiv = $('#results');
            resultsDiv.empty(); // Nettoyer les anciens résultats
            console.log(data);
            if (data && data.length > 0) {
                data.forEach(item => {
                    const itemDiv = $(`
                 <div class="list-group m-2">
                        <a href="javascript:fetchAnnonceDetail(${item.id_annonce})" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">${item.titre_annonce}</h5>
                                <small>${item.date_annonce}</small>
                            </div>
                            <p class="mb-1">${item.description_annonce}</p>
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


            searchAPI(query); // Appeler la fonction de recherche avec la valeur de l'entrée

        });
    </script>
</body>

</html>