document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".form-step");
    const nextButtons = document.querySelectorAll(".btn-next");
    const prevButtons = document.querySelectorAll(".btn-prev");
    const form = document.getElementById("signupForm");
    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const fileInput = document.getElementById("photo");
    const dragDropArea = document.getElementById("dragDropArea");
  
    let currentStep = 0;
  
    function showStep(step) {
      steps.forEach((stepElement, index) => {
        stepElement.classList.toggle("form-step-active", index === step);
      });
    }
  
    function validateFields(step) {
      const inputs = steps[step].querySelectorAll("input[required]");
      let isValid = true;
      let errorMessages = [];
      let errorMessage = steps[step].querySelector(".error-message");
  
      if (!errorMessage) {
        errorMessage = document.createElement("h5");
        errorMessage.classList.add("error-message");
        errorMessage.style.color = "red";
        steps[step].appendChild(errorMessage);
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
  
    function validateFileStep() {
      let isValid = true;
      let fileErrorMessage = document.querySelector(".file-error-message");
  
      if (!fileErrorMessage) {
        fileErrorMessage = document.createElement("h5");
        fileErrorMessage.classList.add("file-error-message");
        fileErrorMessage.style.color = "red";
        dragDropArea.parentElement.appendChild(fileErrorMessage);
      }
  
      if (!fileInput.files.length) {
        fileErrorMessage.textContent = "Le téléchargement de l'image est obligatoire.";
        fileInput.style.borderColor = "red";
        isValid = false;
      } else {
        fileErrorMessage.textContent = "";
        fileInput.style.borderColor = "#ccc";
      }
  
      fileInput.addEventListener("change", () => {
        if (fileInput.files.length) {
          fileErrorMessage.textContent = "";
          fileInput.style.borderColor = "#ccc";
        }
      });
  
      return isValid;
    }
  
    nextButtons.forEach((button) => {
      button.addEventListener("click", function () {
        console.log("Vérification des champs pour passer à l'étape suivante...");
        let isValid = validateFields(currentStep);
        if (currentStep === 1) {
          isValid = isValid && validateFileStep();
        }
        if (isValid) {
          currentStep++;
          showStep(currentStep);
        } else {
          console.log("Validation échouée, ne peut pas passer à l'étape suivante");
        }
      });
    });
  
    prevButtons.forEach((button) => {
      button.addEventListener("click", function () {
        currentStep--;
        showStep(currentStep);
      });
    });
  
    form.addEventListener("submit", function (event) {
      let isValid = validateFields(currentStep) && validateFileStep();
      if (!isValid) {
        event.preventDefault();
      } else {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;
        const errorMessage = document.querySelector(".password-error-message") || document.createElement("h5");
  
        if (!errorMessage.classList.contains("password-error-message")) {
          errorMessage.classList.add("password-error-message");
          errorMessage.style.color = "red";
          form.appendChild(errorMessage);
        }
  
        if (password !== confirmPassword) {
          event.preventDefault();
          errorMessage.textContent = "Les mots de passe ne correspondent pas.";
          document.getElementById("password").style.borderColor = "red";
          document.getElementById("confirm_password").style.borderColor = "red";
        } else if (password.length < 8) {
          event.preventDefault();
          errorMessage.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
          document.getElementById("password").style.borderColor = "red";
        } else {
          errorMessage.textContent = "";
          document.getElementById("password").style.borderColor = "#ccc";
          document.getElementById("confirm_password").style.borderColor = "#ccc";
          alert("Inscription réussie");
          form.submit();
        }
      }
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
  
    // AJAX simulation for email validation
    let emailErrorMessage = document.querySelector(".email-error-message");
  
    if (!emailErrorMessage) {
      emailErrorMessage = document.createElement("h5");
      emailErrorMessage.classList.add("email-error-message");
      emailErrorMessage.style.color = "red";
      emailInput.parentElement.appendChild(emailErrorMessage);
    }
  
    emailInput.addEventListener("blur", function () {
      const email = emailInput.value;
      if (email) {
        if (!emailInput.checkValidity()) {
          emailErrorMessage.textContent = "Veuillez entrer une adresse email valide.";
          emailInput.style.borderColor = "red";
          return;
        }
        // Simuler une requête AJAX avec un fichier JSON local
        fetch("mock_data/validation.json")
          .then(response => {
            if (!response.ok) {
              throw new Error('Erreur lors de la récupération des données.');
            }
            return response.json();
          })
          .then(data => {
            if (data.usedEmails.includes(email)) {
              emailErrorMessage.textContent = "Cet email est déjà utilisé, veuillez en choisir un autre.";
              emailInput.setCustomValidity("Cet email est déjà utilisé, veuillez en choisir un autre.");
              emailInput.style.borderColor = "red";
            } else {
              emailErrorMessage.textContent = "";
              emailInput.setCustomValidity("");
              emailInput.style.borderColor = "#ccc";
            }
          })
          .catch(error => {
            console.error("Erreur lors de la validation de l'email", error);
            emailErrorMessage.textContent = "Une erreur est survenue lors de la validation de l'email.";
            emailInput.style.borderColor = "red";
          });
      }
    });
  
    emailInput.addEventListener("input", () => {
      if (emailInput.checkValidity()) {
        emailErrorMessage.textContent = "";
        emailInput.style.borderColor = "#ccc";
      }
    });
  
    // AJAX simulation for username validation
    let usernameErrorMessage = document.querySelector(".username-error-message");
  
    if (!usernameErrorMessage) {
      usernameErrorMessage = document.createElement("h5");
      usernameErrorMessage.classList.add("username-error-message");
      usernameErrorMessage.style.color = "red";
      usernameInput.parentElement.appendChild(usernameErrorMessage);
    }
  
    usernameInput.addEventListener("blur", function () {
      const username = usernameInput.value;
      if (username) {
        // Simuler une requête AJAX avec un fichier JSON local
        fetch("mock_data/validation.json")
          .then(response => {
            if (!response.ok) {
              throw new Error('Erreur lors de la récupération des données.');
            }
            return response.json();
          })
          .then(data => {
            if (data.usedUsernames.includes(username)) {
              usernameErrorMessage.textContent = "Ce nom d'utilisateur est déjà pris, veuillez en choisir un autre.";
              usernameInput.setCustomValidity("Ce nom d'utilisateur est déjà pris, veuillez en choisir un autre.");
              usernameInput.style.borderColor = "red";
            } else {
              usernameErrorMessage.textContent = "";
              usernameInput.setCustomValidity("");
              usernameInput.style.borderColor = "#ccc";
            }
          })
          .catch(error => {
            console.error("Erreur lors de la validation du nom d'utilisateur", error);
            usernameErrorMessage.textContent = "Une erreur est survenue lors de la validation du nom d'utilisateur.";
            usernameInput.style.borderColor = "red";
          });
      }
    });
  
    usernameInput.addEventListener("input", () => {
      if (usernameInput.checkValidity()) {
        usernameErrorMessage.textContent = "";
        usernameInput.style.borderColor = "#ccc";
      }
    });
  });


//   <!-- JavaScript to Trigger and Close Modal -->
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("customModal");
    const closeModalBtn = document.querySelector(".close-btn");
    const triggerElements = document.querySelectorAll(".trigger-modal");

    triggerElements.forEach(element => {
      element.addEventListener("click", () => {
        modal.style.display = "flex";
        setTimeout(() => {
          modal.classList.add("modal-active");
        }, 10);
        document.body.classList.add("modal-open");
      });
    });

    closeModalBtn.addEventListener("click", () => {
      modal.classList.remove("modal-active");
      modal.style.animation = "fadeOut 0.5s ease";
      setTimeout(() => {
        modal.style.display = "none";
        modal.style.animation = "";
        document.body.classList.remove("modal-open");
      }, 500);
    });

    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("modal-active");
        modal.style.animation = "fadeOut 0.5s ease";
        setTimeout(() => {
          modal.style.display = "none";
          modal.style.animation = "";
          document.body.classList.remove("modal-open");
        }, 500);
      }
    });
  });