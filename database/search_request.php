<?php

$recherche = isset($_GET['rech']) ? htmlspecialchars($_GET['rech']) : '';
$domaine = isset($_GET['cat']) ? htmlspecialchars($_GET['cat']) : '';

$catQuery = $conn->prepare("SELECT * FROM domaine WHERE nom_domaine = ?");
$catQuery->execute([$domaine]);
$category = $catQuery->fetchColumn();

$searchResult = array();

if (!empty($category) && !empty($recherche)) {
    $searchInfographeQuery = $conn->prepare("SELECT *  FROM infographe WHERE specialite_infographe LIKE :search OR description_infographe LIKE :search AND id_domaine=:catId");
    $searchInfographeQuery->execute(['search' => $recherche, 'catId' => $category['id_domaine']]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
} else if (!empty($category)) {
    // echo $category;
    // echo $category['id_domaine'];
    $searchInfographeQuery = $conn->prepare("SELECT *  FROM infographe WHERE id_domaine=:catId");
    $searchInfographeQuery->execute(['catId' => $category]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
} else if (!empty($recherche)) {
    $searchInfographeQuery = $conn->prepare("SELECT *  FROM infographe WHERE specialite_infographe LIKE :search OR description_infographe LIKE :search");
    $searchInfographeQuery->execute(['search' => $recherche]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
}

