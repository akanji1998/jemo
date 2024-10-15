<?php

require('../database/connexion.php');


try {



    if (isset($_GET['q'])) {


        $searchResult = array();


        $recherche = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
        if(empty($recherche)){

            $searchAnnoncesQuery = $conn->prepare("SELECT *  FROM annonce ");
            $searchAnnoncesQuery->execute();
        }else{

            $searchAnnoncesQuery = $conn->prepare("SELECT *  FROM annonce WHERE titre_annonce LIKE :search OR description_annonce LIKE :search");
            $searchAnnoncesQuery->execute(['search' => "%$recherche%",]);
        }

        $searchResult = $searchAnnoncesQuery->fetchAll(PDO::FETCH_ASSOC);


        $response = [
            "status" => "success",
            "code" => 200,
            "data" => [
                "qty" => count($searchResult),
                "annonces" => $searchResult
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

