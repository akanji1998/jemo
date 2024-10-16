<?php


include '../database/connexion.php';

?>

<!-- Head et doctype -->
<?php //include '../composants/header.php'; ?>

<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8" />
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="../css/globals.css" />
        <link rel="stylesheet" href="../css/styleguide.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <title>Jemo.ci</title>
        <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
        <!-- Custom CSS -->
        <link href="../css/blog-home.css" rel="stylesheet">
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
                <input type="text" id="entreprise" name="entreprise" required
                    placeholder="Nom entreprise ou  secteur d’activite">


                <!-- <label for="telephone"></label> -->
                <input type="tel" id="telephone" maxlength="10" name="telephone" required
                    placeholder="Numéro de téléphone">

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
                <input type="password" id="confirm_password" name="confirm_password" required
                    placeholder="Confirmation mot de passe">

                <div class="box_btn">
                    <button type="button" class="btn-prev">Retour</button>
                    <button type="submit">S'inscrire</button>
                </div>
            </div>
        </form>
    </div>

    <!-- <script src="../js/script.js"></script> -->
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
                // if (stepIndex === 1) {
                //     // Sélectionner toutes les cases à cocher dans le groupe
                //     var checkboxes = document.querySelectorAll('.checkbox-container input[type="checkbox"]');

                //     // Vérifier si au moins une case à cocher est cochée
                //     var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                //     if (!isChecked) {
                //         // Empêcher la soumission du formulaire
                //         event.preventDefault();
                //         isValid = false;
                //         // Afficher un message d'erreur
                //         // document.getElementById('error-message').style.display = 'block';
                //     } else {
                //         // Cacher le message d'erreur si au moins une case est cochée
                //         // document.getElementById('error-message').style.display = 'none';
                //     }
                // }
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
                    url: 'http://jemo.test/api/register_annonceur.php', // L'URL du fichier PHP de traitement
                    type: 'POST',
                    data: formData,
                    contentType: false, // Important pour le transfert de fichiers
                    processData: false, // Empêche la transformation des données en chaîne de requête
                    success: function (response) {
                        // Traiter la réponse
                        console.log(response);
                        $('#signupForm')[0].reset();
                        alert("Inscription réussie !");
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
</body>

</html>








