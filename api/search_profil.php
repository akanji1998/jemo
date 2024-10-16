<?php

require('../database/connexion.php');



try {
    // Vérification de la méthode de requête
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
        
        // Initialiser la variable pour stocker les résultats de recherche
        $searchResult = [];

        // Récupérer le terme de recherche et le sanitiser
        $recherche = isset($_GET['q']) ? htmlspecialchars(trim($_GET['q'])) : '';
        
        // Si la recherche est vide, récupérer toutes les annonces
        if (empty($recherche)) {
            $searchInfographeQuery = $conn->prepare("SELECT * FROM infographe");
            $searchInfographeQuery->execute();
        } else {
            // Si un terme est fourni, exécuter une recherche dans les champs "titre_annonce" et "description_annonce"
            $searchInfographeQuery = $conn->prepare("SELECT * FROM infographe WHERE specialite_infographe LIKE :search OR description_infographe LIKE :search");
            $searchInfographeQuery->execute(['search' => "%$recherche%"]);
        }

        // Récupérer les résultats sous forme de tableau associatif
        $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);

        // Préparer la réponse de succès
        echo json_encode([
            'success' => true,
            'message' => 'Recherche effectuée avec succès.',
            'data' => [
                'qty' => count($searchResult),
                'profiles' => $searchResult
            ]
        ]);

    } else {
        // Réponse en cas de méthode ou paramètre incorrect
        echo json_encode([
            'success' => false,
            'message' => 'Invalid request method or missing query parameter.',
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

