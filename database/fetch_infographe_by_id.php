<?php
if (isset($_GET["id"])) {

    // Récupération de l'ID de l'infographe depuis la requête GET
    $infographeId = intval($_GET["id"]); // Convertir l'ID en entier pour éviter les injections SQL

    // Récupération des informations de l'infographe
    $infographeQuery = $conn->prepare("SELECT * FROM infographe WHERE id_infographe = ?");
    $infographeQuery->execute([$infographeId]);
    $infographe = $infographeQuery->fetch(PDO::FETCH_ASSOC);  // Récupérer les informations de l'infographe

    if ($infographe) {  // Vérifier si un infographe a été trouvé
        // Récupération des réalisations de l'infographe
        $realisationQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
        $realisationQuery->execute([$infographeId]);
        $realisations = $realisationQuery->fetchAll(PDO::FETCH_ASSOC);

        // Pour chaque réalisation, récupérer ses images
        foreach ($realisations as &$element) {  // Utilisation de référence pour modifier le tableau $realisations
            $imageQuery = $conn->prepare("SELECT * FROM images_realisation WHERE id_realisation = ?");
            $imageQuery->execute([$element['id_realisation']]);
            $element['images'] = $imageQuery->fetchAll(PDO::FETCH_ASSOC);  // Ajouter les images à chaque réalisation
        }
        // echo json_encode([
        //     'success' => true,
        //     'infographe' => $infographe,
        //     'realisations' => $realisations
        // ]);

    } else {
        header('Location: ../index.php');
        // echo json_encode([
        //     'success' => false,
        //     'message' => 'Aucun infographe trouvé avec cet ID.'
        // ]);
    }

} else {
    // echo json_encode([
    //     'success' => false,
    //     'message' => 'Aucun infographe trouvé avec cet ID.'
    // ]);
    // Si l'ID n'est pas défini dans la requête GET
    header('Location: ../index.php');
    // header('Location: /default-page.php');
}