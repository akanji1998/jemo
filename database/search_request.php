<?php



$recherche = isset($_GET['rech']) ? htmlspecialchars($_GET['rech']) : '';
$domaine = isset($_GET['cat']) ? htmlspecialchars($_GET['cat']) : '';

$catQuery = $conn->prepare("SELECT * FROM domaine WHERE nom_domaine = ?");
$catQuery->execute([$domaine]);
$category = $catQuery->fetch(PDO::FETCH_ASSOC); // Utiliser fetch au lieu de fetchAll pour un seul résultat

$searchResult = array();

if (!empty($category) && !empty($recherche)) {
    // Rechercher dans la spécialité ou la description avec une catégorie spécifique
    $searchInfographeQuery = $conn->prepare("SELECT * FROM infographe WHERE (specialite_infographe LIKE :search OR description_infographe LIKE :search) AND id_domaine = :catId");
    $searchInfographeQuery->execute([
        'search' => "%$recherche%",  // Ajout de % pour la recherche partielle
        'catId' => $category['id_domaine']
    ]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
} elseif (!empty($category)) {
    // Rechercher uniquement par catégorie
    $searchInfographeQuery = $conn->prepare("SELECT * FROM infographe WHERE id_domaine = :catId OR specialite_infographe = :specialite " );
    $searchInfographeQuery->execute([
        'catId' => $category['id_domaine'],
        'specialite' => $category['nom_domaine']
    ]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
} elseif (!empty($recherche)) {
    // Rechercher uniquement par texte sans catégorie
    $searchInfographeQuery = $conn->prepare("SELECT * FROM infographe WHERE specialite_infographe LIKE :search OR description_infographe LIKE :search");
    $searchInfographeQuery->execute([
        'search' => "%$recherche%"
    ]);
    $searchResult = $searchInfographeQuery->fetchAll(PDO::FETCH_ASSOC);
}

// Retourner les résultats sous forme de réponse JSON
// echo json_encode([
//     'success' => true,
//     'data' => $searchResult,
//     'message' => count($searchResult) > 0 ? 'Résultats trouvés.' : 'Aucun résultat trouvé.'
// ]);



