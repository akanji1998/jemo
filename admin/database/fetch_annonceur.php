<?php

// $listDesAnnonceurs = array();

// $allAnonceQuery = $conn->prepare("SELECT *  FROM annonce WHERE id_annonceur =?");


// $annonceurQuery = $conn->prepare("SELECT * FROM annonceur");
// $annonceurQuery->execute();
// $listDesAnnonceurs = $annonceurQuery->fetchAll(PDO::FETCH_ASSOC);



// foreach ($listDesAnnonceurs as $annonceur) {
//     $allAnonceQuery->execute([$annonceur['id_annonceur']]);
//     $annonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);
//     $annonceur['nbr_annonces'] = empty($annonces) ? 0 : count($annonces);
//     # code...
// }



$listDesAnnonceurs = array();

$allAnonceQuery = $conn->prepare("SELECT * FROM annonce WHERE id_annonceur =?");

$annonceurQuery = $conn->prepare("SELECT * FROM annonceur");
$annonceurQuery->execute();
$listDesAnnonceurs = $annonceurQuery->fetchAll(PDO::FETCH_ASSOC);

foreach ($listDesAnnonceurs as $key => $annonceur) {
    $allAnonceQuery->execute([$annonceur['id_annonceur']]);
    $annonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);
    $listDesAnnonceurs[$key]['nbr_annonces'] = empty($annonces) ? 0 : count($annonces);
}

// À ce stade, $listDesAnnonceurs contiendra le nombre d'annonces pour chaque annonceur.






