<?php

$listDesAnnonces = array();

$allAnonceQuery = $conn->prepare("SELECT *  FROM annonce WHERE id_annonceur =?");
$annonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = ?");
$allAnonceQuery->execute([$_SESSION['user_id']]);

$listDesAnnonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);

foreach ($listDesAnnonces as $annonce) {
    
    $annonceurQuery->execute([$annonce['id_annonceur']]);
    $annonceur = $annonceurQuery->fetchColumn();
    $annonce['auteur'] = $annonceur;
    # code...
}





