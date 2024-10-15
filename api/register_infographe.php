<?php
// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $specialite = htmlspecialchars($_POST['specialite']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $username = htmlspecialchars($_POST['username']);
    $interests = !empty($_POST['interest']) ? json_encode($_POST['interest']) : null; // Convertir les centres d'intérêt en JSON
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe



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
            echo json_encode(['success' => false, 'message' => 'image not saved !!.']);
        } 
    } else {
        echo json_encode(['success' => false, 'message' => 'image not saved !!.']);
    
    }









    // Gestion du fichier uploadé
    // if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    //     $photoTmpPath = $_FILES['photo']['tmp_name'];
    //     $photoName = basename($_FILES['photo']['name']);
    //     $photoDir = 'uploads/photos/'; // Répertoire où les photos seront stockées
    //     $photoPath = $photoDir . $photoName;

    //     // Déplacer le fichier vers le répertoire de destination
    //     if (!move_uploaded_file($photoTmpPath, $photoPath)) {
    //         die("Erreur lors de l'upload du fichier.");
    //     }
    // } else {
    //     $photoPath = null; // Aucun fichier uploadé
    // }

    // Insertion dans la base de données
    $sql = "INSERT INTO infographe (nom_infographe, prenom_infographe, specialite_infographe, telephone_infographe, email_infographe, date_naissance_infographe, username_infographe, photo_infographe,date_inscription_infographe, mdp_infographe)
            VALUES (:nom, :prenom, :specialite, :telephone, :email, :date_naissance, :username, :photo,date_inscription, :mdp)";

    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec les données
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':specialite' => $specialite,
        ':telephone' => $telephone,
        ':email' => $email,
        ':date_naissance' => $date_naissance,
        ':username' => $username,
        ':photo' => $imagePath,
        ':date_inscription' => date('Y-m-d'),
        ':mdp' => $password
    ]);

    // Réponse de succès
    echo json_encode(['success' => true, 'message' => 'Inscription réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);


}




