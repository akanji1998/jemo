<?php


include '../database/connexion.php';
include '../database/fetch_domaine.php';

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
    <style>
        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        .is-invalid {
            border-color: red;
        }
    </style>
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

                <label for="specialite">Choisir votre spécialité</label>
                <select id="specialite" name="specialite">
                    <option value="aucun" selected>aucun</option>
                    <?php
                        foreach ($categories as $afficher ) {
                            # code...
                        
                    ?>
                    <option value="<?= $afficher['nom_domaine'] ?>"><?= $afficher['nom_domaine'] ?></option>
                    <?php }?>
                  
                </select>

                <!-- <label for="telephone"></label> -->
                <input type="tel" id="telephone" name="telephone" maxlength="10" required placeholder="Numéro de téléphone">

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
                <input type="password" id="confirm_password" name="confirm_password" required
                    placeholder="Confirmation mot de passe">

                <div class="box_btn">
                    <button type="button" class="btn-prev">Retour</button>
                    <button type="submit">S'inscrire</button>
                </div>
            </div>
        </form>
        <?php /*
<form id="signupForm" enctype="multipart/form-data">
<!-- Étape 1 -->
<div class="form-step form-step-active">
 <h2 class="title_inter">Inscription infographiste</h2>
 <!-- Les champs de l'étape 1 -->
 <input type="text" id="nom" name="nom" required placeholder="Nom" class="is-invalid">
 <input type="text" id="prenom" name="prenom" required placeholder="Prénom">
 <label for="specialite">choisir une spécilité</label>
 <select id="specialite" name="specialite" required placeholder="">

     <option value="Photographe">Photographe</option>
     <option value="Infographiste PAO">Infographiste PAO</option>
     <option value="Intégrateur web">Intégrateur web</option>
     <option value="Monteur vidéo">Monteur vidéo</option>
 </select>
 <input type="tel" id="telephone" name="telephone" required placeholder="Numéro de téléphone">
 <input type="email" id="email" name="email" required placeholder="Email">
 <input type="date" id="date_naissance" name="date_naissance" required placeholder="Date de naissance">
 <button type="button" class="btn-next">Suivant</button>
</div>

<!-- Étape 2 -->
<div class="form-step">
 <h2 class="title_inter">Inscription infographiste</h2>
 <!-- Les champs de l'étape 2 -->
 <input type="text" id="username" name="username" required placeholder="Username">
 <div class="drag-drop-area" id="dragDropArea">
     <p>Glissez et déposez une photo ici ou <span>Cliquez pour ajouter</span></p>
     <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
 </div>
 <h4>Vous êtes intéressé par (3 choix maximum)</h4>
 <div class="checkbox-container">
     <input type="checkbox" id="cdi" name="interest[]" value="CDI">
     <label for="cdi">CDI</label>
     <input type="checkbox" id="cdd" name="interest[]" value="CDD">
     <label for="cdd">CDD</label>
     <input type="checkbox" id="stage" name="interest[]" value="Stage">
     <label for="stage">STAGE</label>
     <input type="checkbox" id="freelance" name="interest[]" value="Freelance">
     <label for="freelance">FREELANCE</label>
 </div>
 <button type="button" class="btn-prev">Retour</button>
 <button type="button" class="btn-next">Suivant</button>
</div>

<!-- Étape 3 -->
<div class="form-step">
 <h2 class="title_inter">Inscription infographiste</h2>
 <!-- Les champs de l'étape 3 -->
 <input type="password" id="password" name="password" required placeholder="Mot de passe">
 <input type="password" id="confirm_password" name="confirm_password" required
     placeholder="Confirmation mot de passe">
 <button type="button" class="btn-prev">Retour</button>
 <button type="submit">S'inscrire</button>
</div>
</form>*/ ?>
    </div>


    <script src="../js/jquery-3.6.0.min.js"></script>
    <!-- <script src="../js/script.js"></script> -->
    <script>
        $(document).ready(function () {
            var currentStep = 0;
            const steps = $(".form-step");
            const fileInput = document.getElementById("photo");


            // Fonction de validation des champs de l'étape
            function validateStep(stepIndex) {
                console.log("validate step " + stepIndex);
                let isValid = true;
                steps.eq(stepIndex).find("input[required], select[required]").each(function () {
                    console.log("each input step " + stepIndex);
                    console.log("each input step " + this);

                    $(this).each(function () {
                        // Vérifie si la valeur de l'input est vide ou n'est pas valide pour son type
                        if ($(this).val() === "" || !this.checkValidity()) {
                            $(this).css("border", "1px solid red");  // Affiche la bordure rouge pour l'erreur
                            isValid = false;
                        } else {
                            $(this).css("border", "1px solid grey");  // Affiche la bordure grise si valide
                        }
                    });

                });
                if (stepIndex === 1) {
                    // Sélectionner toutes les cases à cocher dans le groupe
                    var checkboxes = document.querySelectorAll('.checkbox-container input[type="checkbox"]');

                    // Vérifier si au moins une case à cocher est cochée
                    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                    if (!isChecked) {
                        // Empêcher la soumission du formulaire
                        event.preventDefault();
                        isValid = false;
                        // Afficher un message d'erreur
                        // document.getElementById('error-message').style.display = 'block';
                    } else {
                        // Cacher le message d'erreur si au moins une case est cochée
                        // document.getElementById('error-message').style.display = 'none';
                    }
                }
                return isValid;
            }

            // Passer à l'étape suivante
            $(".btn-next").click(function () {
                if (validateStep(currentStep)) {
                    steps.eq(currentStep).removeClass("form-step-active");
                    currentStep++;
                    steps.eq(currentStep).addClass("form-step-active");
                }
            });

            // Retour à l'étape précédente
            $(".btn-prev").click(function () {
                steps.eq(currentStep).removeClass("form-step-active");
                currentStep--;
                steps.eq(currentStep).addClass("form-step-active");
            });

            // Envoi des données via AJAX
            $("#signupForm").on("submit", function (event) {
                event.preventDefault(); // Empêcher la soumission par défaut

                // Valider la dernière étape
                if (!validateStep(currentStep)) {
                    return;
                }

                // Créer un objet FormData pour envoyer des fichiers
                let formData = new FormData(this);

                formData.append('photo', fileInput.files[0]);
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                $.ajax({
                    url: 'http://jemo.test/api/register_infographe.php', // L'URL du fichier PHP de traitement
                    type: 'POST',
                    data: formData,
                    contentType: false, // Important pour le transfert de fichiers
                    processData: false, // Empêche la transformation des données en chaîne de requête
                    success: function (response) {
                        // Traiter la réponse
                        alert("Inscription réussie !");
                        console.log(response);
                          $('#signupForm')[0].reset();
                        window.location.href = '../connexion.php'
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Gérer les erreurs
                        alert("Une erreur est survenue.");
                        console.log(textStatus, errorThrown);
                    }
                });
            });

            // Drag and drop area interaction
            dragDropArea.addEventListener("click", () => {
                fileInput.click();
            });

            dragDropArea.addEventListener("dragover", (event) => {
                event.preventDefault();
                dragDropArea.classList.add("drag-over");
            });

            dragDropArea.addEventListener("dragleave", () => {
                dragDropArea.classList.remove("drag-over");
            });

            dragDropArea.addEventListener("drop", (event) => {
                event.preventDefault();
                dragDropArea.classList.remove("drag-over");

                // Récupérer le fichier déposé
                const file = event.dataTransfer.files[0];
                handleFile(file);
            });

            fileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];
                handleFile(file);
            });

            function handleFile(file) {
                let fileErrorMessage = document.querySelector(".file-error-message");

                if (!fileErrorMessage) {
                    fileErrorMessage = document.createElement("h5");
                    fileErrorMessage.classList.add("file-error-message");
                    fileErrorMessage.style.color = "red";
                    dragDropArea.parentElement.appendChild(fileErrorMessage);
                }

                if (file && file.type.startsWith("image/")) {
                    if (file.size > 2 * 1024 * 1024) { // Limite de taille de 2 Mo
                        fileErrorMessage.textContent = "La taille de l'image ne doit pas dépasser 2 Mo.";
                        fileInput.style.borderColor = "red";
                        fileInput.setCustomValidity("La taille de l'image ne doit pas dépasser 2 Mo.");
                        return;
                    }
                    fileErrorMessage.textContent = "";
                    fileInput.style.borderColor = "#ccc";
                    fileInput.setCustomValidity("");
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        dragDropArea.innerHTML = `<img src="${e.target.result}" alt="Photo de profil" width="150">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    fileErrorMessage.textContent = "Veuillez uploader une image valide.";
                    fileInput.style.borderColor = "red";
                    fileInput.setCustomValidity("Veuillez uploader une image valide.");
                }
            }

            // Drag and Drop pour l'upload de la photo
            // $("#dragDropArea").on("click", function () {
            //     $("#photo").click();
            // });

            // // Limiter l'utilisateur à une seule image
            // $("#photo").on("change", function () {
            //     if (this.files.length > 1) {
            //         alert("Vous ne pouvez télécharger qu'une seule image.");
            //         this.value = "";  // Réinitialise le champ de fichier
            //     }
            // });

            // // Limitation à 3 checkbox sélectionnées
            // function limitSelection() {
            //     let checkedBoxes = $("input[name='interest[]']:checked").length;
            //     if (checkedBoxes > 3) {
            //         alert("Vous ne pouvez sélectionner que 3 options.");
            //         return false;
            //     }
            // }
            // $("input[name='interest[]']").on("change", limitSelection);
        });

    </script>

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