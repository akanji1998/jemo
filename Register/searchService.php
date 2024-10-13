<?php
require('../connexion.php');



$services = [];
try {

    if (isset($_GET['search'])) {
        $searchWords = htmlspecialchars(htmlentities($_GET['search'], ENT_QUOTES));
        // Check if the ID exists in the 'lieux' table
        $searchServicePrepareQuery = $conn->prepare("SELECT * FROM annonce WHERE description_annonce LIKE :search  OR titre_annonce LIKE :search");
        $searchServicePrepareQuery->execute(['search' => " %$searchWords%"]);
        $services = $searchServicePrepareQuery->fetchAll();
    }

} catch (Exception $e) {
    echo $e->getMessage()
    ;
} catch (PDOException $e) {
    echo $e->getMessage();

}

