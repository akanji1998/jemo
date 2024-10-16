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
                        <ul>
                            <li class="back_users_home_page">Accueil</li>
                        </ul>
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
       


        <div class="">
            <form action="">
                <div class="">
                    <select name="metier" id="">
                        <?php
                            foreach ($categories as $afficher) {
                                # code...
                            
                        ?>
                        <option value="<?= $afficher['nom_domaine'] ?>" <?= $afficher['nom_domaine'] == $infographe['specialite_infographe'] ? "selected": "" ?>><?= $afficher['nom_domaine'] ?></option>
                        <?php } ?>
                      
                    </select>
                </div>
                <!-- juste un design -->

                <div class="">
                    <div class="">
                        <div class="">
                            <input type="file" name="" id="">
                            <!-- <img class="phto-say2-icon" alt="" src="phto say2.png"> -->
                        </div>
                    </div>
                </div>
                <div class="">
                    <h4 class="">Présentation</h4><br>
                    <textarea class=""><?= $infographe['description_infographe'] ?>
                         </textarea>
                </div>

                <input type="text" id="nom" name="nom" value="<?= $infographe['nom_infographe'] ?>" required placeholder="nom"> <br>
                <input type="text" id="prenom" name="prenom" value="<?= $infographe['prenom_infographe'] ?>" required placeholder="prenom">
                <input type="text" id="pays" name="pays" required placeholder="Côte d’ivoire">
                <input type="text" id="commune" name="commune" required placeholder="Songon">


                <!-- <h3>Mode de travail</h3>
                     <input type="radio" name="Distance" id=""> Distance <br>
                     <input type="radio" name="presentiel" id=""> Présentiel -->
                <h3>Contrat accepte </h3>

                <input type="checkbox" name="cdd" id="" ?nom_infographe?> CDD <br>

                <input type="checkbox" name="stage" value="satge" id="" <?= $infographe['contrat_infographe'] == '"Stage"' ? "checked" :"" ?>> Stage <br>
                <input type="checkbox" name="cdi" value="cdd" id="" <?= $infographe['contrat_infographe'] == '"cdd"' ? "checked" : "" ?>> CDD <br>
                <input type="checkbox" name="cdi" value="freelance" id="" <?= $infographe['contrat_infographe'] == '"freelance"' ? "checked" : "" ?>> Freelance <br>

                <h3>Diplome <span>(votre diplôme le plus recent)</span></h3>
                <input type="text" id="commune" name="nom" required placeholder="Songon">

                <!-- <h3>Liens social</h3>
                     <div class="social_link">
                         <ul>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                            </ul>
                        </div> -->

                <h3>Contact <span></span></h3>
                <input type="text" id="contact" name="nom" value="<?= $infographe['telephone_infographe']  ?>" required placeholder="00 00 00 00 00">


                <!-- <h3>Déposer son cv <span></span></h3>
                        <div class="box_drapAnddrop">
                            <div class="drag-drop-area" id="dragDropArea">
                                <p>Glissez et déposez votre cv ici ou <span>Cliquez pour ajouter</span></p>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                        </div> -->

                <!-- <h3>Ajouter projet</h3>
                        <h4>Projet 1</h4>
                        <input type="text" id="title_project" name="nom" required placeholder="">
                        <div class="box_drapAnddrop">
                            <div class="drag-drop-area" id="dragDropArea">
                                <p>Glissez et déposez votre illustration ici ou <span>Cliquez pour ajouter</span></p>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                        </div>

                        <h3>Projet 2</h3>
                        <input type="text" id="title_project" name="nom" required placeholder="">
                        <div class="box_drapAnddrop">
                            <div class="drag-drop-area" id="dragDropArea">
                                <p>Glissez et déposez votre illustration ici ou <span>Cliquez pour ajouter</span></p>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                        </div>


                        
                        <h3>Projet 3</h3>
                        <input type="text" id="title_project" name="nom" required placeholder="">
                        <div class="box_drapAnddrop">
                            <div class="drag-drop-area" id="dragDropArea">
                                <p>Glissez et déposez votre illustration ici ou <span>Cliquez pour ajouter</span></p>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                        </div>


                        <h3>Projet 3</h3>
                        <input type="text" id="title_project" name="nom" required placeholder="">
                        <div class="box_drapAnddrop">
                            <div class="drag-drop-area" id="dragDropArea">
                                <p>Glissez et déposez votre illustration ici ou <span>Cliquez pour ajouter</span></p>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                        </div> -->

                <div class="box_btn">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </main>


    <script src="script_hovers.js"></script>
</body>

</html>