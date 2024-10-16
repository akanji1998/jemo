<?php

// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);


        $redirect_url = 'index.php';
        // Requête pour récupérer l'utilisateur
        $sql = "SELECT * FROM administrateur WHERE (email_administrateur = :username) OR (username_administrateur = :username) LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if ($user && $password== $user['mdp_administrateur']) {
            // Si les informations d'identification sont valides, démarrer la session
            $_SESSION['admin_id'] = $user['id_administrateur'];
            $_SESSION['user_type'] = "admin";

            // Réponse JSON avec succès et redirection
            echo json_encode(['success' => true, 'redirect_url' => $redirect_url]);
        } else {
            // Réponse JSON avec message d'erreur
            echo json_encode(['success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
  

} else {
    echo json_encode(['success' => false, 'message' => 'la requête non valide.']);
}
