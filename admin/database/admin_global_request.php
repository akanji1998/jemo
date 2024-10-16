<?php

if (!isset($_SESSION['admin_id'])) {
    header('Location:login.php');
}

try {

    // Préparer la requête pour récupérer l'admin
    $adminQuery = $conn->prepare("SELECT * FROM administrateur WHERE id_administrateur = ?");

    // Exécuter la requête pour l'admin
    $adminQuery->execute([$_SESSION['admin_id']]);

    // Afficher les données de session (facultatif, pour debug)

    // echo "type: " . $_SESSION['user_type'] . "<br>";

    // Récupérer les informations de l'admin
    $admin = $adminQuery->fetch(PDO::FETCH_ASSOC); // Utiliser fetch() si on s'attend à une seule ligne

} catch (PDOException $e) {
    echo "Erreur lors de l' admin : " . $e->getMessage();
}


