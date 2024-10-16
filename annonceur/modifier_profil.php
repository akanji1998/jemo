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

        <form action="" id="signupForm">
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
                        <!-- <input type="file" name="" id=""> -->
                        <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">

                        <!-- <img class="phto-say2-icon" alt="" src="phto say2.png"> -->
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_annonceur" value="<?= $annonceur['id_annonceur'] ?>">
            <input type="hidden" name="existing_photo" value="<?= $annonceur['photo_annonceur'] ?>">

            <input type="text" id="nom" name="nom" value="<?= $annonceur['nom_annonceur'] ?>" required
                placeholder="nom"> <br>
            <input type="text" id="prenom" name="prenom" value="<?= $annonceur['prenom_annonceur'] ?>" required
                placeholder="prenom">
            <!-- faire select option  -->

            <input type="text" id="entreprise" name="entreprise" required placeholder="Domaine d'activite">
            <input type="text" id="email" name="email" value="<?= $annonceur['email_annonceur'] ?>" required placeholder="email">
            <input type="text" id="pays" name="pays" required placeholder="Côte d’ivoire">
            <input type="text" id="commune" name="commune" required placeholder="Songon">
            <input type="text" id="username" name="username" required placeholder="nom entreprise"
                value="<?= $annonceur['domaine_activite_annonceur'] ?>">
            <label for="date_naissance"></label>
            <input type="date" id="date_naissance" name="date_naissance" required placeholder="Date de naissance">



            <!-- <h3>Liens social</h3>
                                             <div class="social_link">
                                                 <ul>
                                                     <li><input type="text" id="" name="" placeholder="social link"></li>
                                                     <li><input type="text" id="" name="" placeholder="social link"></li>
                                                     <li><input type="text" id="" name="" placeholder="social link"></li>
                                                    </ul>
                                                </div> -->

            <h3>Contact <span></span></h3>
            <input type="text" id="telephone" name="telephone" value="<?= $annonceur['telephone_annonceur'] ?>" required
                placeholder="00 00 00 00 00">

            <div class="box_btn">
                <button type="button" class="btn-next">Enregistrer</button>
            </div>
        </form>
        </div>
    </main>


    <script src="script_hovers.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Vérifier que tous les champs requis sont remplis
            function validateForm() {
                let isValid = true;
                $('#signupForm input[required]').each(function () {
                    if ($(this).val() === '') {
                        $(this).css("border", "1px solid red");  // Ajouter un style si un champ est vide
                        isValid = false;
                    } else {
                        $(this).css("border", "1px solid grey"); // Retirer le style si le champ est rempli
                    }
                });
                return isValid;
            }

            // Quand on clique sur "Enregistrer"
            $('.btn-next').on('click', function () {
                if (validateForm()) {
                    // Créer un objet FormData pour les données du formulaire
                    let formData = new FormData($('#signupForm')[0]);

                    $.ajax({
                        url: 'http://jemo.test/api/update_annonceur.php', // L'URL du backend PHP
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Traiter la réponse du serveur
                            alert('Données enregistrées avec succès.');
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Une erreur est survenue.');
                            console.log(textStatus, errorThrown);
                        }
                    });
                } else {
                    alert('Veuillez remplir tous les champs obligatoires.');
                }
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function () {
            var currentStep = 0;
            // const steps = $(".form-step");
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
            // $(".btn-prev").click(function () {
            //     steps.eq(currentStep).removeClass("form-step-active");
            //     currentStep--;
            //     steps.eq(currentStep).addClass("form-step-active");
            // });

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

    </script> -->
</body>

</html>