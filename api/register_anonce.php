<?php
// header('Content-Type: application/json');

// Connexion à la base de données
require('../database/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['titre'] ?? '';
    $description_annonce = $_POST['description_annonce'] ?? '';
    // $id_annonceur = $_POST['id'] ?? '';
    $id_annonce = $_POST['id_annonce'] ?? ''; // L'ID de l'annonce à mettre à jour

    // Validation de base
    if (empty($nom) || empty($description_annonce)  || empty($id_annonce)) {
        echo json_encode(['success' => false, 'message' => 'Tous les champs sont requis.']);
        exit;
    }

    try {
        // Requête SQL pour mettre à jour l'annonce
        $sql = "UPDATE annonce SET titre_annonce = ?, description_annonce = ? WHERE id_annonce = ?";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Exécution de la requête avec les paramètres
        $stmt->execute([
            $nom,
            $description_annonce,
            Date('Y-m-d'),
            $id_annonce,
            $id_annonceur
        ]);

        // Si la mise à jour réussit
        echo json_encode(['success' => true, 'message' => 'Annonce mise à jour avec succès.']);

    } catch (PDOException $e) {
        // Si une erreur se produit lors de la connexion ou de la mise à jour
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour de l\'annonce : ' . $e->getMessage()]);
    }
} else {
    // Si la méthode de requête n'est pas POST
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
