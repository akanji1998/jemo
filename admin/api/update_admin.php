<?php
// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_admin = htmlspecialchars($_POST['id_admin']); // Assurez-vous que l'ID est fourni pour identifier l'enregistrement
    $nom = htmlspecialchars($_POST['nom']);
    $username = htmlspecialchars($_POST['username']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $password = htmlspecialchars($_POST['password']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);




    // Requête de mise à jour dans la base de données


    $sql = "UPDATE administrateur 
        SET nom_administrateur = :nom, 
            prenom_administrateur = :prenom, 
      
            mdp_administrateur = :passwordd, 
            email_administrateur = :email, 
            date_naissance_administrateur = :date_naissance, 
            username_administrateur = :username, 

        WHERE id_administrateur = :id_admin";

    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec les données
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':passwordd' => $password,
       
        ':date_naissance' => $date_naissance,
        ':username' => $username,
        ':photo' => $imagePath,
        ':id_admin' => $id_admin // ID de l'administrateur à mettre à jour
    ]);

    // Réponse de succès
    echo json_encode(['success' => true, 'message' => 'Mise à jour réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
