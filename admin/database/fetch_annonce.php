<?php

// $listDesAnnonces = array();

// $allAnonceQuery = $conn->prepare("SELECT *  FROM annonce");
// $annonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = ?");
// $allAnonceQuery->execute();

// $listDesAnnonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);

// foreach ($listDesAnnonces as $annonce) {
    
//     $annonceurQuery->execute([$annonce['id_annonceur']]);
//     $annonceur = $annonceurQuery->fetchAll(PDO::FETCH_ASSOC);;
//     $annonce['auteur'] = $annonceur;
//     # code...
// }

$listDesAnnonces = array();

$allAnonceQuery = $conn->prepare("SELECT * FROM annonce");
$annonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = ?");
$allAnonceQuery->execute();

$listDesAnnonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);

foreach ($listDesAnnonces as $key => $annonce) {
    
    // Récupérer l'annonceur pour chaque annonce
    $annonceurQuery->execute([$annonce['id_annonceur']]);
    $annonceur = $annonceurQuery->fetch(PDO::FETCH_ASSOC); // Utilisation de fetch au lieu de fetchAll pour un seul résultat
    $listDesAnnonces[$key]['auteur'] = $annonceur;
    // La mise à jour est effectuée directement dans $listDesAnnonces à l'indice correspondant
}

// Maintenant $listDesAnnonces contiendra chaque annonce avec l'auteur associé.






