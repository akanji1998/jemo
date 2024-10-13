<?php
require('../connexion.php');

try {
    // Get the raw POST data
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into an associative array
    $data = json_decode($json_data, true);
    $email = htmlspecialchars($data['phone']);
    if (!isset($email)) {
        echo json_encode([
            "code" => 400,
            "msg" =>"email adresse invalid",
        ]);
        
    }
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode([
            "msg" => "adresse email déjà utilisé",
            "code" => 404,
        ]);
    } else {
        echo json_encode([
            "code" => 200,
        ]);
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
