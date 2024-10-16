<?php
include '../database/connexion.php';
include '../database/site_global_request.php';
include '../database/search_request.php';

?>

<!-- Head et doctype -->
<?php include '../composants/header.php'; ?>
<!-- navigation + connexion a la bdd-->
<?php
include '../composants/navigation_resultatRecherche.php';

?>
<!-- BARRE DE RECHERCHE -->

<body>
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
            <div class="sur-6000-trouvs"><?= count($searchResult) ?> trouvés</div>
        </div>
        <div class="box_countResult__x__cardInfographiste" id="results">

            <!-- Card infographistes -->
            <?php

            if (!empty($searchResult)) {



                foreach ($searchResult as $afficher) {
                    # code...
            
                    ?>
                    <div class="cardInfographiste">
                        <a href="profil_consultation.php">
                            <div class="rectangle-div_radius">
                                <div class="profil_picture"><img class="profil-picture-icon" alt=""
                                        src="media/public/images/photos membres/phto say.png"></div>
                                <div class="description_illustration">
                                    <div class="name_infographiste">Moussa <span>Samuel</span></div>
                                    <i class="job">développeur web</i>
                                    <p class="leaders-are-made">Leaders are made rather than born. And while a real desire to
                                        lead
                                        is a prerequisite for be </p>

                                    <div class="box_stars">
                                        <img class="star-solid-icon" alt="dsfg" src="star-solid.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <div class="container_resultat_mission my-5">
                    <div class="row">
                        <!-- Left Side: Search Results -->
                        <div class="col-md-12">

                            <p> Aucun resultat trouver pour cette recherche</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
             <div class="cardInfographiste">
                        <a href="profil_consultation.php">
                            <div class="rectangle-div_radius">
                                <div class="profil_picture"><img class="profil-picture-icon" alt=""
                                        src="media/public/images/photos membres/phto say.png"></div>
                                <div class="description_illustration">
                                    <div class="name_infographiste">Moussa <span>Samuel</span></div>
                                    <i class="job">développeur web</i>
                                    <p class="leaders-are-made">Leaders are made rather than born. And while a real desire to
                                        lead
                                        is a prerequisite for be </p>

                                    <div class="box_stars">
                                        <img class="star-solid-icon" alt="dsfg" src="star-solid.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">
                                        <img class="star-solid-icon" alt="" src="star-solid_gray.svg">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
        </div>

        <!-- pagination -->

        <ul class="pagination_profil_infogr">
            <li><a href="#" class="prev">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" class="next">&raquo;</a></li>
        </ul>



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
                success: function (data) {

                    
                    // Traiter les données en cas de succès
                    if (!data || !data.data || !data.data.infographe || data.data.infographe.length === 0) {
                        $('#results').html("Une erreur s'est produite lors de la récupération des données.");
                    } else {
                        displayResults(data);
                    }

                },
                error: function (xhr, status, error) {
                    // Gérer les erreurs
                    console.error("Erreur:", error);
                    $('#results').html("Une erreur s'est produite lors de la récupération des données.");
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
                    <a href="profil_consultation.php">
                        <div class="rectangle-div_radius">
                            <div class="profil_picture">
                                <img class="profil-picture-icon" alt="" src="media/public/images/photos membres/phto say.png">
                            </div>
                            <div class="description_illustration">
                                <div class="name_infographiste">${item.firstName} <span>${item.lastName}</span></div>
                                <i class="job">${item.job}</i>
                                <p class="leaders-are-made">${item.description}</p>
    
                                <div class="box_stars">
                                    <img class="star-solid-icon" alt="star" src="star-solid.svg">
                                    <img class="star-solid-icon" alt="star" src="star-solid_gray.svg">
                                    <img class="star-solid-icon" alt="star" src="star-solid_gray.svg">
                                    <img class="star-solid-icon" alt="star" src="star-solid_gray.svg">
                                    <img class="star-solid-icon" alt="star" src="star-solid_gray.svg">
                                </div>
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