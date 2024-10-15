// document.addEventListener("DOMContentLoaded", function () {
//     const steps = document.querySelectorAll(".form-step");
//     const nextButtons = document.querySelectorAll(".btn-next");
//     const prevButtons = document.querySelectorAll(".btn-prev");
//     const form = document.getElementById("signupForm");
  
//     let currentStep = 0;
  
//     function showStep(step) {
//       steps.forEach((stepElement, index) => {
//         stepElement.classList.toggle("form-step-active", index === step);
//       });
//     }
  
//     function validateFields(step) {
//       const inputs = steps[step].querySelectorAll("input[required]");
//       let isValid = true;
//       let errorMessage = steps[step].querySelector(".error-message");
  
//       if (!errorMessage) {
//         errorMessage = document.createElement("h5");
//         errorMessage.classList.add("error-message");
//         errorMessage.style.color = "red";
//         steps[step].appendChild(errorMessage);
//       }
  
//       errorMessage.textContent = "";
  
//       inputs.forEach((input) => {
//         if (!input.value.trim()) {
//           isValid = false;
//           input.style.borderColor = "red";
//         } else {
//           input.style.borderColor = "#ccc";
//         }
//       });
  
//       if (!isValid) {
//         errorMessage.textContent = "Tous les champs doivent être renseignés";
//       }
  
//       return isValid;
//     }
  
//     nextButtons.forEach((button) => {
//       button.addEventListener("click", function () {
//         if (validateFields(currentStep)) {
//           currentStep++;
//           showStep(currentStep);
//         }
//       });
//     });
  
//     prevButtons.forEach((button) => {
//       button.addEventListener("click", function () {
//         currentStep--;
//         showStep(currentStep);
//       });
//     });
  
//     form.addEventListener("submit", function (event) {
//       if (!validateFields(currentStep)) {
//         event.preventDefault();
//       }
//     });
  
//     // Drag and drop area interaction
//     const dragDropArea = document.getElementById("dragDropArea");
//     const fileInput = document.getElementById("photo");
  
//     dragDropArea.addEventListener("click", () => {
//       fileInput.click();
//     });
  
//     dragDropArea.addEventListener("dragover", (event) => {
//       event.preventDefault();
//       dragDropArea.classList.add("drag-over");
//     });
  
//     dragDropArea.addEventListener("dragleave", () => {
//       dragDropArea.classList.remove("drag-over");
//     });
  
//     dragDropArea.addEventListener("drop", (event) => {
//       event.preventDefault();
//       dragDropArea.classList.remove("drag-over");
//       fileInput.files = event.dataTransfer.files;
//     });
  
//     fileInput.addEventListener("change", () => {
//       if (fileInput.files.length > 0) {
//         dragDropArea.querySelector("p").textContent = fileInput.files[0].name;
//       }
//     });
//   });