<?php
// Connexion à la base de données
require('../database/connexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupérer l'ID du annonce à supprimer
    $annonceId = $_POST['id'];

    // Préparer et exécuter la requête SQL pour supprimer
    $sql = "DELETE FROM annonce WHERE id_annonce = :id";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':id', $annonceId);

    if (
        $stmt->execute([
            ':id' => $annonceId,

        ])
    ) {
        // Retourner une réponse JSON de succès
        echo json_encode(['success' => true]);
    } else {
        // Retourner une réponse JSON d'erreur
        echo json_encode(['error' => 'Erreur lors de la suppression du annonce.']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide.']);
}
