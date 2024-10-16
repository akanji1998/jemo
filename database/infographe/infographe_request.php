<?php

// $allAnnonces = array();
// $fetchAnnonces = $conn->prepare("SELECT *  FROM annonce");
// $fetchAnnonces->execute();
// $allAnnonces = $fetchAnnonces->fetchAll(PDO::FETCH_ASSOC);


// $infographeQuery = $conn->prepare("SELECT * FROM infographe WHERE id_infographe = ?");
// $infographeQuery->execute([$_SESSION['user_id']]);
// $infographe = $infographeQuery->fetchColumn();


// $realisationQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
// $realisationQuery->execute([$_SESSION['user_id']]);

// $realisations = $realisationQuery->fetchAll(PDO::FETCH_ASSOC);

// foreach ($realisations as $element) {
//     $imageQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
//     $imageQuery->execute([$element['id_realisation']]);
//     $element['images'] = $imageQuery->fetchAll(PDO::FETCH_ASSOC);
// }

// // Afficher les données de session (facultatif, pour debug)
// echo "User ID: " . $_SESSION['user_id'] . "<br>";
// echo "Username: " . $_SESSION['username'] . "<br>";
// echo "type: " . $_SESSION['user_type'] . "<br>";


// Récupération de toutes les annonces
$allAnnonces = array();
$fetchAnnonces = $conn->prepare("SELECT * FROM annonce");
$fetchAnnonces->execute();
$allAnnonces = $fetchAnnonces->fetchAll(PDO::FETCH_ASSOC);

// Récupération des informations de l'infographe
$infographeQuery = $conn->prepare("SELECT * FROM infographe WHERE id_infographe = ?");
$infographeQuery->execute([$_SESSION['user_id']]);
$infographe = $infographeQuery->fetch(PDO::FETCH_ASSOC);  // fetchColumn a été remplacé par fetch pour obtenir toutes les colonnes

// Récupération des réalisations de l'infographe
$realisationQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
$realisationQuery->execute([$_SESSION['user_id']]);
$realisations = $realisationQuery->fetchAll(PDO::FETCH_ASSOC);

// Pour chaque réalisation, récupérer ses images
foreach ($realisations as &$element) {  // Utilisation de référence pour modifier le tableau $realisations
    $imageQuery = $conn->prepare("SELECT * FROM images_realisation WHERE id_realisation = ?");
    $imageQuery->execute([$element['id_realisation']]);
    $element['images'] = $imageQuery->fetchAll(PDO::FETCH_ASSOC);  // Ajouter les images à chaque réalisation
}

$categories = array();

$categoryQuery = $conn->prepare("SELECT *  FROM Domaine");
$categoryQuery->execute();
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);



// Debug: Afficher les données de session (facultatif)
echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "Type: " . $_SESSION['user_type'] . "<br>";

// Debug: Afficher les annonces, infographe et réalisations (facultatif)
// echo "<pre>";
// print_r($allAnnonces);
// print_r($infographe);
// print_r($realisations);
// echo "</pre>";



