<?php

$allAnnonces = array();
$fetchAnnonces = $conn->prepare("SELECT *  FROM annonce");
$fetchAnnonces->execute();
$allAnnonces = $fetchAnnonces->fetchAll(PDO::FETCH_ASSOC);


$infographeQuery = $conn->prepare("SELECT * FROM infographe WHERE id_infographe = ?");
$infographeQuery->execute([$_SESSION['user_id']]);
$infographe = $infographeQuery->fetchColumn();


$realisationQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
$realisationQuery->execute([$_SESSION['user_id']]);

$realisations = $realisationQuery->fetchAll(PDO::FETCH_ASSOC);

foreach ($realisations as $element) {
    $imageQuery = $conn->prepare("SELECT * FROM realisation WHERE id_infographe = ?");
    $imageQuery->execute([$element['id_realisation']]);
    $element['images'] = $imageQuery->fetchAll(PDO::FETCH_ASSOC);
}

// Afficher les données de session (facultatif, pour debug)
echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "type: " . $_SESSION['user_type'] . "<br>";





