<?php
// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_annonceur = htmlspecialchars($_POST['id_annonceur']); // Assurez-vous que l'ID est fourni pour identifier l'enregistrement
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $entreprise = htmlspecialchars($_POST['entreprise']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $username = htmlspecialchars($_POST['username']);
    $interests = !empty($_POST['interest']) ? json_encode($_POST['interest']) : null; // Convertir les centres d'intérêt en JSON
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe



    // Vérification et gestion de l'image
    if (isset($_FILES['photo'])) {
        $image = $_FILES['photo'];
        $imageName = time() . '_' . $image['name']; // Générer un nom unique pour le fichier
        $uploadDirectory = 'uploads/';

        // Vérifier si le dossier d'upload existe sinon le créer
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $imagePath = $uploadDirectory . $imageName;
        // Déplacer le fichier uploadé dans le répertoire 'uploads/'
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo json_encode(['success' => false, 'message' => 'image not saved !!']);
        }
    } else {
        // Si aucune nouvelle image n'est uploadée, garder l'ancienne image
        $imagePath = $_POST['existing_photo']; // Le chemin de l'ancienne photo passée depuis le formulaire
    }


    // Requête de mise à jour dans la base de données


    $sql = "UPDATE annonceur 
        SET nom_annonceur = :nom, 
            prenom_annonceur = :prenom, 
            domaine_activite_annonceur = :entreprise, 
            telephone_annonceur = :telephone, 
            email_annonceur = :email, 
            date_naissance_annonceur = :date_naissance, 
            username_annonceur = :username, 
            photo_annonceur = :photo
        WHERE id_annonceur = :id_annonceur";

    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec les données
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':entreprise' => $entreprise,
        ':telephone' => $telephone,
        ':email' => $email,
        ':date_naissance' => $date_naissance,
        ':username' => $username,
        ':photo' => $imagePath,
        ':id_annonceur' => $id_annonceur // ID de l'annonceur à mettre à jour
    ]);

    // Réponse de succès
    echo json_encode(['success' => true, 'message' => 'Mise à jour réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
