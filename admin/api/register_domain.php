<?php

// Connexion à la base de données
require('../database/connexion.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupérer les valeurs du formulaire
    $domainName = $_POST['domainName'];

    // Gestion du fichier uploadé
    if (isset($_FILES['domainImage'])) {
        $image = $_FILES['domainImage'];
        $imageName = time() . '_' . $image['name']; // Générer un nom unique pour le fichier
        $uploadDirectory = 'uploads/';

        // Vérifier si le dossier d'upload existe sinon le créer
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Déplacer le fichier uploadé dans le répertoire 'uploads/'
        $imagePath = $uploadDirectory . $imageName;
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Préparer et exécuter la requête SQL pour insérer les données
            $sql = "INSERT INTO domaine (nom_domaine, image_domaine) VALUES (:nom, :imag)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $domainName);
            $stmt->bindParam(':imag', $imageName);

            if ($stmt->execute()) {
                // Retourner une réponse JSON avec les détails du nouveau domaine
                $newDomain = [
                    'name' => $domainName,
                    'image' => $imageName
                ];
                echo json_encode(['newDomain' => $newDomain]);
            } else {
                echo json_encode(['error' => 'Erreur lors de l\'insertion du domaine dans la base de données.']);
            }
        } else {
            echo json_encode(['error' => 'Erreur lors de l\'upload du fichier.']);
        }
    } else {
        echo json_encode(['error' => 'Aucune image uploadée.']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide.']);
}
