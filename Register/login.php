<?php


require('../connexion.php');



// Function to validate email address
function validateEmail($email)
{
    // Use PHP's built-in filter_var function with FILTER_VALIDATE_EMAIL flag
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

try {
    // Get the raw POST data
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into an associative array
    $data = json_decode($json_data, true);


    if (!isset($data['email'])) {
        throw new Exception("Veuillez renseignez votre email", 1);
    } else if (!isset($data['password'])) {
        throw new Exception("Veuillez renseignez votre mot de passe", 1);
    } else {


        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        // Validate email address
        if (validateEmail($email) == false) {
            echo "Email address is valid: $email\n";
            throw new Exception("adresse email est invalid", 1);
        }



        // Check if the phone number exists in the database
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?");
        $stmt->execute([$email, $password]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();

        $_SESSION['usernames'] = "username";
        $_SESSION['email'] = "username";
        $_SESSION['phone'] = "username";
        $_SESSION['id'] = "id";
        $_SESSION['login'] = "true";


        if ($result) {
            echo json_encode([
                "status" => "success",
                "code" => 200,
                "data" => $result[0],
            ]);
        } else {
            throw new Exception("L'adresse email ou mot de passe est incorrect", 1);
        }

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