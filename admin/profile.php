<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 400px; width: 100%;">
        <div class="text-center">
            <img src="profil-admin.png" alt="Admin Profile Picture" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
            <h3 class="font-weight-bold">Profil admin</h3>
            <h5 class="text-muted">Michel amani</h5>
            <p>Administrateur</p>
            <a href="#" class="btn btn-success mb-3">Aller au tableau de bord</a>
        </div>

        <form id="profile-form">
            <div class="form-group">
                <input type="text" class="form-control" id="prenom" placeholder="Prénom" value="Michel">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="nom" placeholder="Nom" value="AMANI">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" value="midax2024@#">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" value="michelamani485@gmail.com">
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary" onclick="validateForm()">Modifier</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/script.js"></script>

</body>
</html>
