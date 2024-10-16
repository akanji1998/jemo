<?php
// Connexion à la base de données
require('../database/connexion.php');

// Vérification si la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $domainName = htmlspecialchars($_POST['domainName']); // Assurez-vous que l'ID est fourni pour identifier l'enregistrement
    $domainId = htmlspecialchars($_POST['domainId']); // Assurez-vous que l'ID est fourni pour identifier l'enregistrement

    // Vérification et gestion de l'image
    if (isset($_FILES['domainImage'])) {
        $image = $_FILES['photo'];
        $imageName = time() . '_' . $image['name']; // Générer un nom unique pour le fichier
        $uploadDirectory = 'uploads/';

        // Vérifier si le dossier d'upload existe sinon le créer
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $imagePath = $uploadDirectory . $imageName;
        // Déplacer le fichier uploadé dans le répertoire 'uploads/'
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo json_encode(['success' => false, 'message' => 'image not saved !!']);
        }
    } else {
        // Si aucune nouvelle image n'est uploadée, garder l'ancienne image
        $imagePath = $_POST['domainPhoto']; // Le chemin de l'ancienne photo passée depuis le formulaire
    }


    // Requête de mise à jour dans la base de données


    $sql = "UPDATE domaine 
        SET nom_domaine = :nom, 
            image_domaine = :image_domaine
        WHERE id_domaine = :id_domaine";

    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec les données
    $stmt->execute([
        ':nom' => $domainName,
        ':image_domaine' => $imagePath,
        ':id_domaine' => $domainId // ID d
    ]);

    // Réponse de succès
    echo json_encode(['success' => true, 'message' => 'Mise à jour réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
