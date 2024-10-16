<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réalisations</title>
    <style>
        /* Styles généraux */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f9f9f9;
} */

/* Conteneur principal */
.container_realisation {
    width: 90%;
    text-align: center;
}

/* Header */
.header_realisation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    font-size: 16px;
    font-weight: bold;
}

.add-link {
    font-size: 14px;
    color: #007BFF;
    text-decoration: none;
}

.add-link:hover {
    text-decoration: underline;
}

/* Grille des projets */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 20px;
}

/* Boîtes des projets */
.project-box {
    width: 100%;
    height: 100px;
    border: 2px solid #cccccc;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #cccccc;
    font-size: 14px;
}

/* Première boîte avec texte noir */
.project-box:first-child {
    color: #000;
}

/* Lien de suppression du profil */
.delete-profile {
    font-size: 12px;
    color: #999999;
    text-decoration: none;
}

.delete-profile:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container_realisation">
        <div class="header_realisation">
            <h2>Mes réalisations</h2>
            <a href="#" class="add-link">Ajouter</a>
        </div>

        <!-- <div class="projects-grid">
            <div class="project-box center-text">modifier</div>
            <div class="project-box center-text"></div>
            <div class="project-box center-text"></div>
            <div class="project-box center-text"></div>
        </div> -->

        <!-- <a href="#" class="delete-profile">supprimer mon profil</a> -->
    </div>
</body>
</html>
