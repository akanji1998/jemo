<?php if (isset($_GET["edit"])) {

    // Récupération de l'ID de l'annonce depuis la requête GET
    $annonceId = intval($_GET["edit"]); // Convertir l'ID en entier pour éviter les injections SQL

    // Récupération des informations de l'annonce
    $annonceQuery = $conn->prepare("SELECT * FROM annonce WHERE id_annonce = ?");
    $annonceQuery->execute([$annonceId]);
    $annonce = $annonceQuery->fetch(PDO::FETCH_ASSOC);  // Récupérer les informations de l'annonce

    if (!$annonce) {  // Vérifier si un annonce a été trouvé
        header('Location: ../annonceur/dashboard.php');
    } 

} else {
    // echo json_encode([
    //     'success' => false,
    //     'message' => 'Aucun annonce trouvé avec cet ID.'
    // ]);
    // Si l'ID n'est pas défini dans la requête GET
    header('Location: ../annonceur/dashboard.php');
    // header('Location: /default-page.php');
}