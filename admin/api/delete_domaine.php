<?php
// Connexion à la base de données
require('../database/connexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    // Récupérer l'ID du domaine à supprimer
    $domainId = $_POST['id'];

    // Préparer et exécuter la requête SQL pour supprimer
    $sql = "DELETE FROM domaine WHERE id_domaine = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $domainId);

    if ($stmt->execute()) {
        // Retourner une réponse JSON de succès
        echo json_encode(['success' => true]);
    } else {
        // Retourner une réponse JSON d'erreur
        echo json_encode(['error' => 'Erreur lors de la suppression du domaine.']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide.']);
}
