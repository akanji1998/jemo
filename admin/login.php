<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <img alt="" src="../media/public/images/logo jemo/logo sans fd  blanc jemo 1.png" class="logoforbg">
    <form class="connexion_form1" id="formul">
        <div class="box_connexion" >
            <!-- <h2>Connexion</h2>            -->
            <div class="box_titleAdmin">
                <div class="faCircleUser"></div>
                <span class="">Admin center</span>
            </div>
            <input type="text" id="username" name="username" required placeholder="username ou email" value="Michel">
            <br>
            <input type="password" id="password" name="password" required placeholder="Mot de passe" value="123456">
            <p id="errorMessage" style="color:red"></p>
            <div class="forget_password">
                <a href="">Mot de passe oublié ?</a>
            </div>

            <div class="box_btn_creer_compte">
                <button type="submit">Se connecter</button>
            </div>

        </div>
    </form>
    <!-- <script src="script.js"></script> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log("PAGE READY")
            $('#formul').on('submit', function (e) {
                e.preventDefault(); // Empêche le formulaire de soumettre normalement

                // Récupérer les valeurs des champs
        
                const username = $('#username').val();
                const password = $('#password').val();

                console.log(username, password);

                // Envoyer les données en AJAX
                $.ajax({
                    url: 'http://jemo.test/admin/api/login.php', // L'URL de votre script PHP
                    method: 'POST',
                    data: {
                      
                        "username": username,
                        "password": password
                    },
                    success: function (response) {
                            console.log(response);
                        const res = JSON.parse(response);
                        console.log(res);
                                  $('.connexion_form1')[0].reset();

                        if (res.success) {
                            console.log(res.redirect_url);
                            // Si la connexion est réussie, rediriger l'utilisateur
                            window.location.href = res.redirect_url; 
                            // Redirige vers le tableau de bord
                        } else {
                               $('#errorMessage').text(res.message);
                            alert(res.message); // Affiche un message d'erreur
                            // res.redirect_url; // Redirige vers le tableau de bord
                            //          $('#errorMessage').text('Erreur de format de réponse JSON.');
                            // $('#errorModal').modal('show');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("Une erreur s'est produite lors de la connexion.");
                        console.log(error);
                             $('#errorMessage').text('Erreur de format de réponse JSON.');
                        // $('#errorModal').modal('show');
                    }
                });
            });
        });

    </script>
</body>

</html>