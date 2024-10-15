<?php

require('../database/connexion.php');


try {



    if (isset($_GET['q'])) {


        $searchResult = array();


        $recherche = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
        $searchInfographeQuery = $conn->prepare("SELECT *  FROM infographe WHERE specialite_infographe LIKE :search OR description_infographe LIKE :search");
        $searchInfographeQuery->execute(['search' => "%$recherche%",]);
     
        $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);


        $response = [
            "status" => "success",
            "code" => 200,
            "data" => [
                "qty" => count($searchResult),
                "infographe" => $searchResult
            ]
        ];
        echo json_encode($response);

    }

} catch (Exception $e) {
    echo json_encode([
        "status" => "erreur",
        "code" => 400,
        "msg" => $e->getMessage()
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "code" => 400,
        "msg" => $e->getMessage()
    ]);
}

