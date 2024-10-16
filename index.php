   
  <!-- Head et doctype -->
  <?php require_once 'includes/header.php'; ?>
   <!-- navigation + connexion a la bdd-->
   <?php 
    require_once 'includes/navigation.php';
    require_once 'includes/bdd.php';
   ?>
   
    <!-- BARRE DE RECHERCHE -->
    <div class="box_search_x_illustrations">
        <div class="search">
            <div class="bigidea">
                <h2>Trouvez l’ <span>infographiste</span><br>
                    dont vous avez besoin</h2>
            </div>
            <div class="box_searchform">
                <form class="searchform" action="resultatderecherche.php">
                    <input type="search" placeholder="ville, métier infographiste, commune"><input type="submit" value="Trouver">
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
                <a href="">
                    <div class="cards_categories_works">
                        <h3 class="title">Photographe</h3>
                        <div>
                            <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works" height="370">
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cards_categories_works">
                        <h3 class="title">Monteur video</h3>
                        <div>
                            <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works" height="370">
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cards_categories_works">
                        <h3 class="title">infographe PAO</h3>
                        <div>
                            <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works" height="370">
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cards_categories_works">
                        <h3 class="title">Modélisation 3D</h3>
                        <div>
                            <img src="media/public/front-view-summer-concept-with-copy-space.png" alt="img_works" height="370">
                        </div>
                    </div>
                </a>
            </div>
                <!-- lien metier -->
                <ul >
                <li class="job_item"><a href="photographe.php">Photographe </a></li>
                <li class="job_item"><a href="infographiste.php">infographiste PAO </a></li>
                <li class="job_item"><a href="integrateur.php">Intégrateur web </a></li>
                <li class="job_item"><a href="monteur.php">Monteur vidéo </a></li>
            </ul>
        </section>

        <!-- TOP INFOGRAPHISTE -->
        <section class="section section_top_info">
            <h2 class="title_section">TOP Infographiste</h2>
            <div class="container_cards_top_info">
                <a href="">
                    <div class="card">
                        <img src="media/public/phto say.png" alt="Profil">
                        <div class="card-content">
                            <div class="initials">HO</div>
                            <div class="card-title">Modelisateur 3D</div>
                        </div>
                    </div>
                </a>
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
                    une description claire de vos besoins, fixer un budget et attirer des talents qui correspondent à vos attentes. <br>
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
    require_once 'includes/footer.php';
   ?>
   
    