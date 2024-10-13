<?php


require('../connexion.php');


try {



    if (isset($_GET['id'])) {

        $serviceId = $_GET['id'];

        // Check if $range is numeric and an integer
        if (!is_numeric($serviceId)) {
            throw new InvalidArgumentException("Id must be an integer");
        }

        // Check if the ID exists in the 'lieux' table
        $checkIdQuery = $conn->prepare("SELECT COUNT(*) AS count FROM activites_culturelles WHERE id = ?");
        $checkIdQuery->execute([$serviceId]);
        $idExists = $checkIdQuery->fetchColumn();

        if (empty($idExists))
            return;


            // Select data from various tables based on the provided ID
            $getActivityQuery = $conn->prepare("SELECT * FROM activites_culturelles WHERE id = ?");
            $getActivityQuery->execute([$serviceId]);
            $activity = $getActivityQuery->fetch(PDO::FETCH_ASSOC);

            $getActivityPhotos = $conn->prepare("SELECT * FROM photo_activites WHERE activite_id = ?");
            $getActivityPhotos->execute([$serviceId]);
            $activityPhotos = $getActivityPhotos->fetchAll(PDO::FETCH_ASSOC);

            // Construct the response data
            $response = [
                "status" => "success",
                "code" => 200,
                "data" => [
                    "activity" => $activity,
                    "photos" => $activityPhotos
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

