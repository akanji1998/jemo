<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
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


    <header class="section header">
        <div class="box_header1">
            <div class="logo1"></div><br>
            <h4><a href="index.html">retour</a></h4>

            <div class="user-menu-container">
                <div class="user-icon" id="userIcon">
                    <!-- <div class="circle-user"></div> -->
                </div>
                <div class="menu" id="menu">
                    <ul>
                        <li><a href="connexion.html">Se connecter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <form id="signupForm">
            <!-- Étape 1 -->
            <div class="form-step form-step-active">
                <h2 class="title_inter">Inscription annonceur</h2>
                <div class="box_radio_btn_step">
                    <div class="radio_btn_step step-active"></div>
                    <div class="radio_btn_step"></div>
                    <div class="radio_btn_step"></div>
                </div>
                
                <!-- <label for="nom">Nom</label> -->
                <input type="text" id="nom" name="nom" required placeholder="nom">

                <!-- <label for="prenom">Prénom</label> -->
                <input type="text" id="prenom" name="prenom" required placeholder="prenom">
                
                <!-- <label for="specialite">Choisir votre spécialité</label> -->
                <input type="text" id="prenom" name="prenom" required placeholder="Nom entreprise ou  secteur d’activite">
                

                <!-- <label for="telephone"></label> -->
                <input type="tel" id="telephone" name="telephone" required placeholder="Numéro de téléphone">

                <!-- <label for="email"></label> -->
                <input type="email" id="email" name="email" required placeholder="Email">

                <label for="date_naissance"></label>
                <input type="date" id="date_naissance" name="date_naissance" required placeholder="Date de naissance">

                <button type="button" class="btn-next">Suivant</button>
            </div>

            <!-- Étape 2 -->
            <div class="form-step">
                <h2 class="title_inter">Inscription annonceur</h2>
                <div class="box_radio_btn_step">
                    <div class="radio_btn_step "></div>
                    <div class="radio_btn_step step-active"></div>
                    <div class="radio_btn_step"></div>
                </div>
                
                <!-- <label for="username"></label> -->
                <input type="text" id="username" name="username" required placeholder="Username">

                <!-- <label for="photo">Uploader une photo de profil</label> -->
                 <!-- <div class="box_drapAnddrop">
                     <input type="file" id="photo" name="photo" accept="image/*" placeholder="Uploader une photo de profil">
                 </div> -->

                 <div class="box_drapAnddrop">
                    <div class="drag-drop-area" id="dragDropArea">
                        <p>Glissez et déposez une photo ici ou <span>Cliquez pour ajouter</span></p>
                        <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
                    </div>
                </div>
                
                <div class="box_btn">
                <button type="button" class="btn-prev">Retour</button>
                <button type="button" class="btn-next">Suivant</button>
            </div>
            </div>

            <!-- Étape 3 -->
            <div class="form-step">
                <h2 class="title_inter">Inscription annonceur</h2>
                <div class="box_radio_btn_step">
                    <div class="radio_btn_step"></div>
                    <div class="radio_btn_step"></div>
                    <div class="radio_btn_step step-active"></div>
                </div>                
                <!-- <label for="password">Mot de passe</label> -->
                <input type="password" id="password" name="password" required placeholder="Mot de passe">

                <!-- <label for="confirm_password">Confirmation mot de passe</label> -->
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmation mot de passe">

                <div class="box_btn">
                    <button type="button" class="btn-prev">Retour</button>
                    <button type="submit">S'inscrire</button>
                </div>
            </div>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>