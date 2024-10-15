$(document).ready(function() {
    let currentStep = 0;
  const formSteps = $(".form-step");
  
  console.log(formSteps);
    
    // Afficher la première étape
    formSteps.eq(currentStep).addClass("form-step-active");

    // Navigation entre les étapes
  $(".btn-next").on("click", function () {
       console.log("NEXT BUTTON CLICL");
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
        // let isValid = true;
        // const inputs = formSteps.eq(step).find("input[required]");
        // inputs.each(function() {
        //     if (!this.checkValidity()) {
        //         $(this).addClass("is-invalid");
        //         isValid = false;
        //     } else {
        //         $(this).removeClass("is-invalid");
        //     }
        // });
      // return isValid;
         const inputs = formSteps[step].querySelectorAll("input[required]");
      let isValid = true;
      let errorMessages = [];
      let errorMessage = formSteps[step].querySelector(".error-message");
  
      if (!errorMessage) {
        errorMessage = document.createElement("h5");
        errorMessage.classList.add("error-message");
        errorMessage.style.color = "red";
        formSteps[step].appendChild(errorMessage);
      }
  
      errorMessage.textContent = "";
  
      inputs.forEach((input) => {
        if (!input.value.trim() || !input.checkValidity()) {
          isValid = false;
          input.style.borderColor = "red";
          errorMessages.push(`${input.name} est requis ou invalide`);
          input.setCustomValidity("Ce champ est requis ou invalide");
        } else {
          input.style.borderColor = "#ccc";
          input.setCustomValidity("");
        }
  
        input.addEventListener("input", () => {
          if (input.checkValidity()) {
            input.style.borderColor = "#ccc";
            errorMessage.textContent = "";
          }
        });
      });
  
      if (!isValid) {
        errorMessage.textContent = errorMessages.join(". ");
      }
  
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
    // $('#dragDropArea').on('click', function() {
    //     $('#photo').click();
    // });

    // $('#photo').on('change', function(event) {
    //     const fileName = event.target.files[0].name;
    //     $('#dragDropArea p').text(fileName);
    // });

    // Envoi du formulaire via AJAX
    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        if (!validateStep(currentStep)) {
            return;
        }

      const formData = new FormData(this); // Crée un objet FormData pour l'envoi avec fichier
      
       // Crée un nouvel objet FormData
    // const formData = new FormData();

    // Utilise serializeArray pour capturer tous les champs texte/valeurs
    const formFields = $(this).serializeArray();
    $.each(formFields, function(i, field) {
        formData.append(field.name, field.value);
    });

    // Ajouter manuellement le fichier photo s'il y en a un
    // const fileInput = $('#photo')[0].files[0]; // Sélectionner le premier fichier
    // if (fileInput) {
    //     formData.append('photo', fileInput);
    // }

    // Afficher les données pour vérifier leur contenu
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]); 
    }
      console.log(formData);
        $.ajax({
            url: 'https://votre-api-endpoint.com/register', // Remplacez par votre URL
            method: 'POST',
            data: formData,
            processData: false, // Nécessaire pour les données de type FormData
            contentType: false, // Nécessaire pour les données de type FormData
            success: function(response) {
                console.log('Inscription réussie !');
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log('Une erreur s\'est produite lors de l\'inscription.');
                console.log(error);
            }
        });
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     const steps = document.querySelectorAll(".form-step");
//     const nextButtons = document.querySelectorAll(".btn-next");
//     const prevButtons = document.querySelectorAll(".btn-prev");
//     const form = document.getElementById("signupForm");
//     const emailInput = document.getElementById("email");
//     const usernameInput = document.getElementById("username");
    const fileInput = document.getElementById("photo");
//     const dragDropArea = document.getElementById("dragDropArea");
  
//     let currentStep = 0;
  
//     function showStep(step) {
//       steps.forEach((stepElement, index) => {
//         stepElement.classList.toggle("form-step-active", index === step);
//       });
//     }
  
//     function validateFields(step) {
//       const inputs = steps[step].querySelectorAll("input[required]");
//       let isValid = true;
//       let errorMessages = [];
//       let errorMessage = steps[step].querySelector(".error-message");
  
//       if (!errorMessage) {
//         errorMessage = document.createElement("h5");
//         errorMessage.classList.add("error-message");
//         errorMessage.style.color = "red";
//         steps[step].appendChild(errorMessage);
//       }
  
//       errorMessage.textContent = "";
  
//       inputs.forEach((input) => {
//         if (!input.value.trim() || !input.checkValidity()) {
//           isValid = false;
//           input.style.borderColor = "red";
//           errorMessages.push(`${input.name} est requis ou invalide`);
//           input.setCustomValidity("Ce champ est requis ou invalide");
//         } else {
//           input.style.borderColor = "#ccc";
//           input.setCustomValidity("");
//         }
  
//         input.addEventListener("input", () => {
//           if (input.checkValidity()) {
//             input.style.borderColor = "#ccc";
//             errorMessage.textContent = "";
//           }
//         });
//       });
  
//       if (!isValid) {
//         errorMessage.textContent = errorMessages.join(". ");
//       }
  
//       return isValid;
//     }
  
//     function validateFileStep() {
//       let isValid = true;
//       let fileErrorMessage = document.querySelector(".file-error-message");
  
//       if (!fileErrorMessage) {
//         fileErrorMessage = document.createElement("h5");
//         fileErrorMessage.classList.add("file-error-message");
//         fileErrorMessage.style.color = "red";
//         dragDropArea.parentElement.appendChild(fileErrorMessage);
//       }
  
//       if (!fileInput.files.length) {
//         fileErrorMessage.textContent = "Le téléchargement de l'image est obligatoire.";
//         fileInput.style.borderColor = "red";
//         isValid = false;
//       } else {
//         fileErrorMessage.textContent = "";
//         fileInput.style.borderColor = "#ccc";
//       }
  
//       fileInput.addEventListener("change", () => {
//         if (fileInput.files.length) {
//           fileErrorMessage.textContent = "";
//           fileInput.style.borderColor = "#ccc";
//         }
//       });
  
//       return isValid;
//     }
  
//     nextButtons.forEach((button) => {
//       button.addEventListener("click", function () {
//         console.log("Vérification des champs pour passer à l'étape suivante...");
//         let isValid = validateFields(currentStep);
//         if (currentStep === 1) {
//           isValid = isValid && validateFileStep();
//         }
//         if (isValid) {
//           currentStep++;
//           showStep(currentStep);
//         } else {
//           console.log("Validation échouée, ne peut pas passer à l'étape suivante");
//         }
//       });
//     });
  
//     prevButtons.forEach((button) => {
//       button.addEventListener("click", function () {
//         currentStep--;
//         showStep(currentStep);
//       });
//     });
  
//   form.addEventListener("submit", function (event) {
//       console.log("Forma validation");
      // let isValid = validateFields(currentStep) && validateFileStep();
      // if (!isValid) {
      //   event.preventDefault();
      // } else {
      //   const password = document.getElementById("password").value;
      //   const confirmPassword = document.getElementById("confirm_password").value;
      //   const errorMessage = document.querySelector(".password-error-message") || document.createElement("h5");
  
      //   if (!errorMessage.classList.contains("password-error-message")) {
      //     errorMessage.classList.add("password-error-message");
      //     errorMessage.style.color = "red";
      //     form.appendChild(errorMessage);
      //   }
  
      //   if (password !== confirmPassword) {
      //     event.preventDefault();
      //     errorMessage.textContent = "Les mots de passe ne correspondent pas.";
      //     document.getElementById("password").style.borderColor = "red";
      //     document.getElementById("confirm_password").style.borderColor = "red";
      //   } else if (password.length < 8) {
      //     event.preventDefault();
      //     errorMessage.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
      //     document.getElementById("password").style.borderColor = "red";
      //   } else {
      //     errorMessage.textContent = "";
      //     document.getElementById("password").style.borderColor = "#ccc";
      //     document.getElementById("confirm_password").style.borderColor = "#ccc";
      //      e.preventDefault();
      //      const formData = new FormData(this); 
      //     console.log(formData);  
      //       $.ajax({
      //             url: 'https://votre-api-endpoint.com/register', // Remplacez par votre URL
      //             method: 'POST',
      //             data: formData,
      //             processData: false, // Nécessaire pour les données de type FormData
      //             contentType: false, // Nécessaire pour les données de type FormData
      //             success: function(response) {
      //                 alert('Inscription réussie !');
      //                 console.log(response);
      //             },
      //             error: function(xhr, status, error) {
      //                 alert('Une erreur s\'est produite lors de l\'inscription.');
      //                 console.log(error);
      //             }
      //         });
      //     console.log("Inscription réussie");

      //     // form.submit().on('submit', function(e) {
      //     //     e.preventDefault();
      //     //     if (!validateStep(currentStep)) {
      //     //         return;
      //     //     }

      //     //     const formData = new FormData(this); // Crée un objet FormData pour l'envoi avec fichier
              
            
      //     // });
      //   }
      // }
//     });
  
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
  
//     // AJAX simulation for email validation
//     let emailErrorMessage = document.querySelector(".email-error-message");
  
//     if (!emailErrorMessage) {
//       emailErrorMessage = document.createElement("h5");
//       emailErrorMessage.classList.add("email-error-message");
//       emailErrorMessage.style.color = "red";
//       emailInput.parentElement.appendChild(emailErrorMessage);
//     }
  
//     emailInput.addEventListener("blur", function () {
//       const email = emailInput.value;
//       if (email) {
//         if (!emailInput.checkValidity()) {
//           emailErrorMessage.textContent = "Veuillez entrer une adresse email valide.";
//           emailInput.style.borderColor = "red";
//           return;
//         }
//         // Simuler une requête AJAX avec un fichier JSON local
//         fetch("mock_data/validation.json")
//           .then(response => {
//             if (!response.ok) {
//               throw new Error('Erreur lors de la récupération des données.');
//             }
//             return response.json();
//           })
//           .then(data => {
//             if (data.usedEmails.includes(email)) {
//               emailErrorMessage.textContent = "Cet email est déjà utilisé, veuillez en choisir un autre.";
//               emailInput.setCustomValidity("Cet email est déjà utilisé, veuillez en choisir un autre.");
//               emailInput.style.borderColor = "red";
//             } else {
//               emailErrorMessage.textContent = "";
//               emailInput.setCustomValidity("");
//               emailInput.style.borderColor = "#ccc";
//             }
//           })
//           .catch(error => {
//             console.error("Erreur lors de la validation de l'email", error);
//             emailErrorMessage.textContent = "Une erreur est survenue lors de la validation de l'email.";
//             emailInput.style.borderColor = "red";
//           });
//       }
//     });
  
//     emailInput.addEventListener("input", () => {
//       if (emailInput.checkValidity()) {
//         emailErrorMessage.textContent = "";
//         emailInput.style.borderColor = "#ccc";
//       }
//     });
  
//     // AJAX simulation for username validation
//     let usernameErrorMessage = document.querySelector(".username-error-message");
  
//     if (!usernameErrorMessage) {
//       usernameErrorMessage = document.createElement("h5");
//       usernameErrorMessage.classList.add("username-error-message");
//       usernameErrorMessage.style.color = "red";
//       usernameInput.parentElement.appendChild(usernameErrorMessage);
//     }
  
//     usernameInput.addEventListener("blur", function () {
//       const username = usernameInput.value;
//       if (username) {
//         // Simuler une requête AJAX avec un fichier JSON local
//         fetch("mock_data/validation.json")
//           .then(response => {
//             if (!response.ok) {
//               throw new Error('Erreur lors de la récupération des données.');
//             }
//             return response.json();
//           })
//           .then(data => {
//             if (data.usedUsernames.includes(username)) {
//               usernameErrorMessage.textContent = "Ce nom d'utilisateur est déjà pris, veuillez en choisir un autre.";
//               usernameInput.setCustomValidity("Ce nom d'utilisateur est déjà pris, veuillez en choisir un autre.");
//               usernameInput.style.borderColor = "red";
//             } else {
//               usernameErrorMessage.textContent = "";
//               usernameInput.setCustomValidity("");
//               usernameInput.style.borderColor = "#ccc";
//             }
//           })
//           .catch(error => {
//             console.error("Erreur lors de la validation du nom d'utilisateur", error);
//             usernameErrorMessage.textContent = "Une erreur est survenue lors de la validation du nom d'utilisateur.";
//             usernameInput.style.borderColor = "red";
//           });
//       }
//     });
  
//     usernameInput.addEventListener("input", () => {
//       if (usernameInput.checkValidity()) {
//         usernameErrorMessage.textContent = "";
//         usernameInput.style.borderColor = "#ccc";
//       }
//     });
//   });


// //   <!-- JavaScript to Trigger and Close Modal -->
// document.addEventListener("DOMContentLoaded", function () {
//     const modal = document.getElementById("customModal");
//     const closeModalBtn = document.querySelector(".close-btn");
//     const triggerElements = document.querySelectorAll(".trigger-modal");

//     triggerElements.forEach(element => {
//       element.addEventListener("click", () => {
//         modal.style.display = "flex";
//         setTimeout(() => {
//           modal.classList.add("modal-active");
//         }, 10);
//         document.body.classList.add("modal-open");
//       });
//     });

//     closeModalBtn.addEventListener("click", () => {
//       modal.classList.remove("modal-active");
//       modal.style.animation = "fadeOut 0.5s ease";
//       setTimeout(() => {
//         modal.style.display = "none";
//         modal.style.animation = "";
//         document.body.classList.remove("modal-open");
//       }, 500);
//     });

//     window.addEventListener("click", (event) => {
//       if (event.target === modal) {
//         modal.classList.remove("modal-active");
//         modal.style.animation = "fadeOut 0.5s ease";
//         setTimeout(() => {
//           modal.style.display = "none";
//           modal.style.animation = "";
//           document.body.classList.remove("modal-open");
//         }, 500);
//       }
//     });
//   });



//   // MISSION  PAGINATION

//   document.addEventListener('DOMContentLoaded', function() {
//     const pagination_missionLinks = document.querySelectorAll('.pagination_mission a');
//     pagination_missionLinks.forEach(link => {
//         link.addEventListener('click', function(e) {
//             e.preventDefault();
//             const activeLink = document.querySelector('.pagination_mission .active');
//             if (activeLink) {
//                 activeLink.classList.remove('active');
//             }
//             if (!this.classList.contains('prev') && !this.classList.contains('next')) {
//                 this.parentElement.classList.add('active');
//             }
//         });
//     });


//     const pagination_profil_infogrLinks = document.querySelectorAll('.pagination_profil_infogr a');
//     pagination_profil_infogrLinks.forEach(link => {
//         link.addEventListener('click', function(e) {
//             e.preventDefault();
//             const activeLink = document.querySelector('.pagination_profil_infogr .active');
//             if (activeLink) {
//                 activeLink.classList.remove('active');
//             }
//             if (!this.classList.contains('prev') && !this.classList.contains('next')) {
//                 this.parentElement.classList.add('active');
//             }
//         });
//     });
// });



// // fonction limite de selection

// function limitSelection() {
//   // Sélectionner toutes les cases à cocher
//   const checkboxes = document.querySelectorAll('input[type="checkbox"]');
//   // Filtrer les cases cochées
//   const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
  
//   // Désactiver les autres cases si 3 sont déjà cochées
//   if (checkedCheckboxes.length >= 3) {
//     checkboxes.forEach(checkbox => {
//       if (!checkbox.checked) {
//         checkbox.disabled = true;
//       }
//     });
//   } else {
//     // Réactiver toutes les cases si moins de 3 sont cochées
//     checkboxes.forEach(checkbox => {
//       checkbox.disabled = false;
//     });
//   }
// }



// // // Script JavaScript pour vérifier si le champ est vide
// // function validateSearchInput(event) {
// //   const inputField = document.getElementById('searchInput');
// //   if (inputField.value.trim() === "") {
// //       // Empêcher l'envoi du formulaire si le champ est vide
// //       event.preventDefault();
// //       // Ajouter la classe qui provoque l'animation si le champ est vide
// //       inputField.classList.add('input-error');
      
// //       // Supprimer la classe après l'animation pour permettre de la réappliquer plus tard
// //       setTimeout(() => {
// //           inputField.classList.remove('input-error');
// //       }, 300);
// //   } else {
// //       // Autoriser l'envoi du formulaire si le champ n'est pas vide
// //       event.target.form.submit();
// //   }
// // }





