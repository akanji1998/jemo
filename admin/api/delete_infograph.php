<?php
// Connexion à la base de données
require('../database/connexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupérer l'ID du infographe à supprimer
    $infographId = $_POST['id'];

    // Préparer et exécuter la requête SQL pour supprimer
    $sql = "DELETE FROM infographe WHERE id_infographe = :id";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':id', $infographId);

    if (
        $stmt->execute([
            ':id' => $infographId,

        ])
    ) {
        // Retourner une réponse JSON de succès
        echo json_encode(['success' => true]);
    } else {
        // Retourner une réponse JSON d'erreur
        echo json_encode(['error' => 'Erreur lors de la suppression du infographe.']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide.']);
}
