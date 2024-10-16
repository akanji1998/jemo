<?php

require('../database/connexion.php');

try {
    // Vérification de la méthode de requête et si l'ID est fourni
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

        // Récupérer l'ID de l'annonce et le sanitiser
        $id_annonce = intval($_GET['id']);  // Assurez-vous que l'ID est un entier

        // Préparer la requête pour rechercher l'annonce par son ID
        $searchAnnonceQuery = $conn->prepare("SELECT * FROM annonce WHERE id_annonce = :id");
        $searchAnnonceQuery->execute(['id' => $id_annonce]);

        $searchAnnonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = :id");

        // Récupérer les résultats
        $annonce = $searchAnnonceQuery->fetch(PDO::FETCH_ASSOC);
        $searchAnnonceurQuery->execute(['id' => $annonce['id_annonceur']]);
        $annonce['annonceur'] = $searchAnnonceurQuery->fetch(PDO::FETCH_ASSOC);

        if ($annonce) {
            // Si une annonce est trouvée, renvoyer les détails
            echo json_encode([
                'success' => true,
                'message' => 'Annonce trouvée avec succès.',
                'data' => $annonce
            ]);
        } else {
            // Si aucune annonce n'est trouvée pour cet ID
            echo json_encode([
                'success' => false,
                'message' => 'Aucune annonce trouvée pour cet ID.',
                'data' => []
            ]);
        }

    } else {
        // Réponse en cas de méthode ou paramètre incorrect
        echo json_encode([
            'success' => false,
            'message' => 'Invalid request method or missing ID parameter.',
            'data' => []
        ]);
    }

} catch (PDOException $e) {
    // Gestion des erreurs liées à PDO
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de base de données: ' . $e->getMessage(),
        'data' => []
    ]);
} catch (Exception $e) {
    // Gestion des autres erreurs
    echo json_encode([
        'success' => false,
        'message' => 'Erreur: ' . $e->getMessage(),
        'data' => []
    ]);
}

