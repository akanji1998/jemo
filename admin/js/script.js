 // Traffic Chart
 const ctx = document.getElementById('trafficChart').getContext('2d');
 const trafficChart = new Chart(ctx, {
     type: 'bar',
     data: {
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
         datasets: [{
             label: 'Traffic Mensuel',
             data: [5000, 10000, 20000, 15000, 17000, 12000, 20000, 15000, 7000],
             backgroundColor: 'rgba(75, 192, 192, 0.2)',
             borderColor: 'rgba(75, 192, 192, 1)',
             borderWidth: 1
         }]
     },
     options: {
         responsive: true,
         maintainAspectRatio: false, // Ensures the chart is responsive on all devices
         scales: {
             y: {
                 beginAtZero: true
             }
         }
     }
 });


//  date

function updateDateTime() {
    const dateTimeElement = document.getElementById('date-time');
    const now = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    };
    const formattedDateTime = now.toLocaleDateString(undefined, options);
    dateTimeElement.textContent = formattedDateTime;
}

// Update the date and time every second
setInterval(updateDateTime, 1000);

// Initialize on page load
updateDateTime();
        

function validateForm() {
    const firstName = document.getElementById("prenom").value;
    const lastName = document.getElementById("nom").value;
    const password = document.getElementById("password").value;
    const email = document.getElementById("email").value;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (firstName === "") {
        alert("Veuillez entrer un prénom.");
        return false;
    }

    if (lastName === "") {
        alert("Veuillez entrer un nom.");
        return false;
    }

    if (password === "") {
        alert("Veuillez entrer un mot de passe.");
        return false;
    }

    if (!emailPattern.test(email)) {
        alert("Veuillez entrer une adresse email valide.");
        return false;
    }

    alert("Formulaire validé avec succès !");
    return true;
}
