<?php
// Connexion à la base de données
require('../database/connexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupérer l'ID du annonceur à supprimer
    $annonceurId = $_POST['id'];

    // Préparer et exécuter la requête SQL pour supprimer
    $sql = "DELETE FROM annonceur WHERE id_annonceur = :id";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':id', $annonceurId);

    if (
        $stmt->execute([
            ':id' => $annonceurId,

        ])
    ) {
        // Retourner une réponse JSON de succès
        echo json_encode(['success' => true]);
    } else {
        // Retourner une réponse JSON d'erreur
        echo json_encode(['error' => 'Erreur lors de la suppression du annonceur.']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide.']);
}
