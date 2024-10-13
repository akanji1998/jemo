<?php


require('../connexion.php');

function validatePhoneNumber($phoneNumber)
{
    // Remove all non-digit characters from the phone number
    $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

    // Check if the phone number length is between 7 and 15 characters
    if (strlen($phoneNumber) < 7 || strlen($phoneNumber) > 15) {
        return false;
    }

    // Additional phone number validation rules can be added here based on your requirements

    return true;
}

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


    if (!isset($data['username'])) {
        throw new Exception("Veuillez renseignez votre nom", 1);
    } elseif (!isset($data['name'])) {
        throw new Exception("Veuillez renseignez votre prenom", 1);
    } else if (!isset($data['phone'])) {
        throw new Exception("Veuillez renseignez votre telephone", 1);
    }


    // else if (!isset($data['email'])) {
    //     throw new Exception("Veuillez renseignez votre email", 1);
    // } else if (!isset($data['password'])) {
    //     throw new Exception("Veuillez renseignez votre mot de passe", 1);
    // }
    else {


        $username = htmlspecialchars($data['username']);
        $name = htmlspecialchars($data['name']);
        $phone = htmlspecialchars($data['phone']);


        // Validate phone number
        if (validatePhoneNumber($phone) == false) {
            echo "Phone number is valid: $phone\n";
            throw new Exception("numéro téléphone est invalid", 1);
        }

        // Validate email address
        // if (validateEmail($email) == false) {
        //     echo "Email address is valid: $email\n";
        //     throw new Exception("adresse email est invalid", 1);
        // }

        // Check if email already exists
        // $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM utilisateurs WHERE email = ?");
        // $stmt->execute([$email]);
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // if ($result['count'] > 0) {
        //     throw new Exception("Email already exists", 1);
        // }

        // Check if phone already exists
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM utilisateurs WHERE telephone = ?");
        $stmt->execute([$phone]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            throw new Exception("Phone number already exists", 1);
        }

        $statement = $conn->prepare("INSERT INTO utilisateurs(usernames,names,telephone) VALUES(?, ?, ?)");
        $statement->execute([$username, $name, $phone]);

        $lastInsertId = $conn->lastInsertId();

        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$lastInsertId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();

        $_SESSION['usernames'] = "username";
        $_SESSION['email'] = "username";
        $_SESSION['phone'] = "username";
        $_SESSION['id'] = "id";
        $_SESSION['login'] = "true";


        echo json_encode([
            "status" => "success",
            "code" => 200,
            "data" => $result,
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