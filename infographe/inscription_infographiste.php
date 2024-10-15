<?php


include '../database/connexion.php';

?>

<!-- Head et doctype -->
<?php include '../composants/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/globals.css" />
    <link rel="stylesheet" href="../css/styleguide.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header class="section header">
        <div class="box_header1">
            <div class="logo1"></div><br>
            <h4><a href="../index.php">retour</a></h4>

            <div class="user-menu-container">
                <div class="user-icon" id="userIcon">
                    <!-- <div class="circle-user"></div> -->
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <form id="signupForm">
            <!-- Étape 1 -->
            <div class="form-step form-step-active">
                <h2 class="title_inter">Inscription infographiste</h2>
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
                <select id="specialite" name="specialite">
                    <option value="aucun" selected>aucun</option>
                    <option value="Photographe">Photographe</option>
                    <option value="Infographiste PAO">Infographiste PAO</option>
                    <option value="Intégrateur web">Intégrateur web</option>
                    <option value="Monteur vidéo">Monteur vidéo</option>
                </select>

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
                <h2 class="title_inter">Inscription infographiste</h2>
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


                <h4>Vous êtes intéressé par (vous pouvez sélectionner 3 choix maximum)</h4>
                <div class="checkbox-container">
                <input type="checkbox" id="cdi" name="interest" value="CDI" onclick="limitSelection()">
                <label class="checkbox-label" for="cdi">CDI</label>

                <input type="checkbox" id="cdd" name="interest" value="CDD" onclick="limitSelection()">
                <label class="checkbox-label" for="cdd">CDD</label>

                <input type="checkbox" id="stage" name="interest" value="Stage" onclick="limitSelection()">
                <label class="checkbox-label" for="stage">STAGE</label>

                <input type="checkbox" id="freelance" name="interest" value="Freelance" onclick="limitSelection()">
                <label class="checkbox-label" for="freelance">FREELANCE</label>
                </div>
                
                <div class="box_btn">
                <button type="button" class="btn-prev">Retour</button>
                <button type="button" class="btn-next">Suivant</button>
            </div>
            </div>

            <!-- Étape 3 -->
            <div class="form-step">
                <h2 class="title_inter">Inscription infographiste</h2>
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

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <!-- <script>
        $(document).ready(function() {
    let currentStep = 0;
    const formSteps = $(".form-step");
    
    // Afficher la première étape
    formSteps.eq(currentStep).addClass("form-step-active");

    // Navigation entre les étapes
    $(".btn-next").on("click", function() {
        if (validateStep(currentStep)) {
            formSteps.eq(currentStep).removeClass("form-step-active");
            currentStep++;
            formSteps.eq(currentStep).addClass("form-step-active");
        }
    });

    $(".btn-prev").on("click", function() {
        formSteps.eq(currentStep).removeClass("form-step-active");
        currentStep--;
        formSteps.eq(currentStep).addClass("form-step-active");
    });

    // Validation des champs pour chaque étape
    function validateStep(step) {
        let isValid = true;
        const inputs = formSteps.eq(step).find("input, select");
        inputs.each(function() {
            if (!this.checkValidity()) {
                $(this).addClass("is-invalid");
                isValid = false;
            } else {
                $(this).removeClass("is-invalid");
            }
        });
        return isValid;
    }

    // Limitation des choix de la case à cocher à 3 maximum
    $('input[type="checkbox"]').on('click', limitSelection);
    
    function limitSelection() {
        const checkedCount = $('input[name="interest"]:checked').length;
        if (checkedCount >= 3) {
            $('input[name="interest"]:not(:checked)').prop('disabled', true);
        } else {
            $('input[name="interest"]').prop('disabled', false);
        }
    }

    // Gestion du drag and drop pour la photo
    $('#dragDropArea').on('click', function() {
        $('#photo').click();
    });

    $('#photo').on('change', function(event) {
        const fileName = event.target.files[0].name;
        $('#dragDropArea p').text(fileName);
    });

    // Envoi du formulaire via AJAX
    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        if (!validateStep(currentStep)) {
            return;
        }

        const formData = new FormData(this); // Crée un objet FormData pour l'envoi avec fichier
        
        $.ajax({
            url: 'https://votre-api-endpoint.com/register', // Remplacez par votre URL
            method: 'POST',
            data: formData,
            processData: false, // Nécessaire pour les données de type FormData
            contentType: false, // Nécessaire pour les données de type FormData
            success: function(response) {
                alert('Inscription réussie !');
                console.log(response);
            },
            error: function(xhr, status, error) {
                alert('Une erreur s\'est produite lors de l\'inscription.');
                console.log(error);
            }
        });
    });
});

    </script> -->

    <!-- <div class="box_form_inscription_infographiste">
        <h2>Inscription infographiste</h2>
        <div class="box_radio_btn_step">
            <div class="radio_btn_step"></div>
            <div class="radio_btn_step"></div>
            <div class="radio_btn_step"></div>
        </div>
    </div> -->
</body>
</html>