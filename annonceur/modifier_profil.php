<?php
include '../database/connexion.php';
include('../database/annonceur/annonceur_request.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
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
                            <a href="../index.php">

                                <li class="">Accueil</li>
                            </a>
                        </ul>
                    </nav>
                     <div class="rectangle-div1">
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="modifier_profil.php">Modifier mon profil</a></li>
                    <li><a href="publier.php">Publier une annonce</a></li>
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
       
        <form action="">
            <!-- <div class="">
                    <select name="metier" id="">
                        <option value="">Developpeur web</option>
                        <option value="">infographiste PAO</option>
                        <option value="">Animateur 2D</option>
                        <option value="">Photographe</option>
                        <option value="">Illustrateur</option>
                    </select>
                </div><div class=""> -->

            <!-- juste un design -->

            <div class="">
                <div class="">
                    <div class="">
                        <input type="file" name="" id="">
                        <!-- <img class="phto-say2-icon" alt="" src="phto say2.png"> -->
                    </div>
                </div>
            </div>

            <input type="text" id="nom" name="nom" value="<?= $annonceur['nom_annonceur'] ?>" required placeholder="nom"> <br>
            <input type="text" id="prenom" name="prenom" value="<?= $annonceur['prenom_annonceur'] ?>" required placeholder="prenom">
            <!-- faire select option  -->
            <input type="text" id="pays" name="nom" required placeholder="Côte d’ivoire">
            <input type="text" id="commune" name="nom" required placeholder="Songon">
            <input type="text" id="commune" name="nom" required placeholder="nom entreprise" value="<?= $annonceur['domaine_activite_annonceur'] ?>">



            <!-- <h3>Liens social</h3>
                     <div class="social_link">
                         <ul>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                            </ul>
                        </div> -->

            <h3>Contact <span></span></h3>
            <input type="text" id="contact" name="nom" value="<?= $annonceur['telephone_annonceur'] ?>" required placeholder="00 00 00 00 00">

            <div class="box_btn">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
        </div>
    </main>


    <script src="script_hovers.js"></script>
</body>

</html>