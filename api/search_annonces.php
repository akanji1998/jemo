<?php

require('../database/connexion.php');


// try {



//     if (isset($_GET['q'])) {


//         $searchResult = array();


//         $recherche = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
//         if(empty($recherche)){

//             $searchAnnoncesQuery = $conn->prepare("SELECT *  FROM annonce ");
//             $searchAnnoncesQuery->execute();
//         }else{

//             $searchAnnoncesQuery = $conn->prepare("SELECT *  FROM annonce WHERE titre_annonce LIKE :search OR description_annonce LIKE :search");
//             $searchAnnoncesQuery->execute(['search' => "%$recherche%",]);
//         }

//         $searchResult = $searchAnnoncesQuery->fetchAll(PDO::FETCH_ASSOC);


//         $response = [
//             "status" => "success",
//             "code" => 200,
//             "data" => [
//                 "qty" => count($searchResult),
//                 "annonces" => $searchResult
//             ]
//         ];
//         echo json_encode($response);

//     }

// } catch (Exception $e) {
//     echo json_encode([
//         "status" => "erreur",
//         "code" => 400,
//         "msg" => $e->getMessage()
//     ]);
// } catch (PDOException $e) {
//     echo json_encode([
//         "status" => "error",
//         "code" => 400,
//         "msg" => $e->getMessage()
//     ]);
// }

try {
    // Vérification de la méthode de requête
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
        
        // Initialiser la variable pour stocker les résultats de recherche
        $searchResult = [];

        // Récupérer le terme de recherche et le sanitiser
        $recherche = isset($_GET['q']) ? htmlspecialchars(trim($_GET['q'])) : '';
        
        // Si la recherche est vide, récupérer toutes les annonces
        if (empty($recherche)) {
            $searchAnnoncesQuery = $conn->prepare("SELECT * FROM annonce");
            $searchAnnoncesQuery->execute();
        } else {
            // Si un terme est fourni, exécuter une recherche dans les champs "titre_annonce" et "description_annonce"
            $searchAnnoncesQuery = $conn->prepare("SELECT * FROM annonce WHERE titre_annonce LIKE :search OR description_annonce LIKE :search");
            $searchAnnoncesQuery->execute(['search' => "%$recherche%"]);
        }

        // Récupérer les résultats sous forme de tableau associatif
        $searchResult = $searchAnnoncesQuery->fetchAll(PDO::FETCH_ASSOC);

        // Préparer la réponse de succès
        echo json_encode([
            'success' => true,
            'message' => 'Recherche effectuée avec succès.',
            'data' => [
                'qty' => count($searchResult),
                'annonces' => $searchResult
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
