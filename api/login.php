<?php

// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_type = htmlspecialchars($_POST['user_type']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Rediriger en fonction du type d'utilisateur
    if ($user_type === 'annonceur') {
        $redirect_url = 'annonceur/dashboard.php';
        // Requête pour récupérer l'utilisateur
        $sql = "SELECT * FROM annonceur WHERE (email_annonceur = :username) OR (username_annonceur = :username) LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['mdp_annonceur'])) {
            // Si les informations d'identification sont valides, démarrer la session
            $_SESSION['user_id'] = $user['id_annonceur'];
            $_SESSION['user_email'] = $user['email_annonceur'];
            $_SESSION['username'] = $user['nom_annonceur'] .' '. $user['prenom_annonceur'];
            $_SESSION['user_type'] = $user_type;

            // Réponse JSON avec succès et redirection
            echo json_encode(['success' => true, 'redirect_url' => $redirect_url]);
        } else {
            // Réponse JSON avec message d'erreur
            echo json_encode(['success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    } else if ($user_type === 'infographe') {
        $redirect_url = 'infographe/dashboard.php';
        // Requête pour récupérer l'utilisateur
        $sql = "SELECT * FROM infographe WHERE (username_infographe = :username OR email_infographe = :username)  LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username,]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['mdp_infographe'])) {
            // Si les informations d'identification sont valides, démarrer la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email_infographe'];
            $_SESSION['nom'] = $user['nom_infographe'];
            $_SESSION['prenom'] = $user['prenom_infographe'];
            $_SESSION['username'] = $user['username_infographe'];
            $_SESSION['user_type'] = $user_type;


            // Réponse JSON avec succès et redirection
            echo json_encode(['success' => true, 'redirect_url' => $redirect_url]);
        } else {
            // Réponse JSON avec message d'erreur
            echo json_encode(['success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    }

  
} else {
    echo json_encode(['success' => false, 'message' => 'la requête non valide.']);
}
