<?php
// header('Content-Type: application/json');

// Connexion à la base de données
require('../database/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['titre'] ?? '';
    $description_annonce = $_POST['description_annonce'] ?? '';
    $id_annonceur = $_POST['id'] ?? '';

    // Validation de base
    if (empty($nom) || empty($description_annonce) || empty($id_annonceur)) {
        echo json_encode(['success' => false, 'message' => 'Tous les champs sont requis.']);
        exit;
    }

    try {


        // Requête SQL pour insérer l'annonce
        $sql = "INSERT INTO annonce(titre_annonce, description_annonce,date_annonce,id_annonceur) VALUES (?, ?,?,?)";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Exécution de la requête avec les paramètres
        $stmt->execute([
            $nom,
            $description_annonce,
            Date('Y-m-d'),
            $id_annonceur
        ]);

        // Si l'insertion réussit
        echo json_encode(['success' => true, 'message' => 'Annonce enregistrée avec succès.']);

    } catch (PDOException $e) {
        // Si une erreur se produit lors de la connexion ou de l'insertion
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement de l\'annonce : ' . $e->getMessage()]);
    }
} else {
    // Si la méthode de requête n'est pas POST
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
