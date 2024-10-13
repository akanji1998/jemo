<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="globals.css" />
        <link rel="stylesheet" href="styleguide.css" />
        <link rel="stylesheet" href="style.css" />
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
                        <li>Dashboard</li>
                        <li><a href="modifier_profil_infographiste_membre.html">Modifier mon profil</a></li>
                        <li>Notification</li>
                        <li>Publier un projet</li>
                    </ul>
                </nav>
            </div>


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
                     
                     <input type="text" id="nom" name="nom" required placeholder="nom"> <br>
                     <input type="text" id="prenom" name="nom" required placeholder="prenom">
                     <input type="text" id="pays" name="nom" required placeholder="Côte d’ivoire">
                     <input type="text" id="commune" name="nom" required placeholder="Songon">
                     <input type="text" id="commune" name="nom" required placeholder="nom entreprise">
                     
                    
                     
                     <h3>Liens social</h3>
                     <div class="social_link">
                         <ul>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                             <li><input type="text" id="" name="" placeholder="social link"></li>
                            </ul>
                        </div>
                        
                        <h3>Contact <span></span></h3>
                        <input type="text" id="contact" name="nom" required placeholder="00 00 00 00 00">

                        <div class="box_btn">
                            <button type="submit">Enregistrer</button>
                        </div>
                 </form>
            </div>
        </main>


        <script src="script_hovers.js"></script>
    </body>
    </html>