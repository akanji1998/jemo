   
  <!-- Head et doctype -->
  <?php require_once 'includes/header.php'; ?>
   <!-- navigation + connexion a la bdd-->
   <?php 
    require_once 'includes/navigation_resultatRecherche.php';
    require_once 'includes/bdd.php';
   ?>
                <!-- BARRE DE RECHERCHE -->
                <div class="box_search02">
                    <div class="search02">
                        <div class="box_searchform02">
                            <form class="searchform" action="">
                                <input type="search" placeholder="ville, métier infographiste, commune"><input type="submit" value="Trouver">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End BARRE DE RECHERCHE -->
            </div>   
            <!-- end rectangle vert -->
        </div>

        <main class="main_result">
                <div class="box_countResult__x__cardInfographiste">
                    <div class="countResult">
                        <b class="resultats-de-recherche">Résultats de recherche</b>
                        <div class="sur-6000-trouvs">23 sur 6000 trouvés</div>
                    </div>
                    
                    <!-- Card infographistes -->
                    <div class="cardInfographiste">
                        <a href="profil_consultation.php">
                            <div class="rectangle-div_radius">
                                <div class="profil_picture"><img class="profil-picture-icon" alt="" src="media/public/images/photos membres/phto say.png" ></div>
                                <div class="description_illustration">
                                    <div class="name_infographiste">Moussa <span>Samuel</span></div>
                                    <i class="job">développeur web</i>
                                    <p class="leaders-are-made">Leaders are made rather than born. And while a real desire to lead is a prerequisite for be </p>
                                    
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
        </main>

        <!-- FOOTER -->
          <!-- footer + liens script-->
   <?php 
    require_once 'includes/footer.php';
   ?>
    </body>
</html>
