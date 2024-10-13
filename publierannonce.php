<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/globals.css" />
        <link rel="stylesheet" href="css/styleguide.css" />
        <link rel="stylesheet" href="css/style.css" />
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
            <div class="rectangle-div1">
            <nav>
                    <ul>
                        <li><a href="profil_annonceur_membre.php">Dashboard</a></li>
                        <li><a href="modifier_profil_annonceur_membre.php">Modifier mon profil</a></li>
                        <li><a href="publierannonce.php">Publier une annonce</a></li>
                    </ul>
                </nav>
            </div>


            <div class="box_annonce">
                <h2>Creer une annonce</h2>

                <input type="text" id="nom" name="nom" required placeholder="Titre de l'annonce"> <br>
               <textarea name="description_annonce" id="" placeholder="Descrire l'annonce"></textarea>
                <!-- <select name="" id="">
                    <option value="">logo</option>
                    <option value="">affiche</option>
                    <option value="">animation</option>
                    <option value="">Programmation</option>
                    <option value="">Programmation</option>
                </select> -->
                <!-- <input type="text" id="prix" name="nom" required placeholder="Somme propose pour la mission"> -->

                <!-- <h3>Type de contrat</h3>
                <select name="" id="">
                    <option value="" selected>aucun</option>
                    <option value="">CDI</option>
                    <option value="">CDD</option>
                    <option value="">Stage</option>
                    <option value="">Benevolat</option>
                    <option value="">Volontariat</option>
                </select>


                <h3>mode de travail</h3>
                <select name="" id="">
                    <option value="" selected>aucun</option>
                    <option value="">CDI</option>
                    <option value="">CDD</option>
                    <option value="">Stage</option>
                    <option value="">Benevolat</option>
                    <option value="">Volontariat</option>
                </select> <br> -->


                <input type="submit" value="Publier">
            </div>

        </main>
        <script src="script_hovers.js"></script>
    </body>
    </html>