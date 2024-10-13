<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header class="header">
    <div class="box_header1">
            <div class="logo1"></div><br>
            <h4><a href="index.php">retour</a></h4>

            <div class="user-menu-container">
                <div class="user-icon" id="userIcon">
                    <!-- <div class="circle-user"></div> -->
                </div>
            </div>
        </div>
    </header>

    <form action="" class="connexion_form">
        <div class="box_connexion">
        <h2 class="title_inter">Connexion</h2>             
        <input type="text" id="username" name="username" required placeholder="username ou email">  <br>
        
        <input type="password" id="password" name="password" required placeholder="Mot de passe"> 
        <input type="radio" id="option3" name="choix" value="option3"> infographiste
        <input type="radio" id="option4" name="choix" value="option4"> annonce
        <div class="forget_password">
            <a href="reinitialiser.php">Mot de passe oublié ?</a>
        </div>

        <div class="box_btn_creer_compte">
                 <p>
                    Vous n’avez pas de compte ? <br> créez un compte <a href="inscription_anonceur.php">anonceur</a> ou <a href="inscription_infographiste.php">infographiste</a> 
               </p>
                 <button type="submit">Se connecter</button>
        </div>

        </div>
    </form>  
    <script src="js/script.js"></script>
</body>
</html>