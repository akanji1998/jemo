<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver une mission</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="logo_jemo"></div>
    <header class="bg-primary text-white py-3 bgcolor_header_mission">
        <div class="container_mission_bar">
                <!-- BARRE DE RECHERCHE -->
            <div class="box_searchform">
                <form class="searchform" action="resultatderecherche.php">
                    <input type="search" placeholder="logo, montage, web, motion, affiche..." value="Motion design"><input type="submit" value="Trouver">
                </form>
            </div>
    </header>

    <div class="container_resultat_mission my-5">
        <div class="row">
            <!-- Left Side: Search Results -->
            <div class="col-md-12">
                <h5>Résultats de recherche</h5>
                <p class="text-muted">0 trouvés</p>
                
                <p> Aucun resultat trouver pour cette recherche</p>
            </div>
        </div>
    </div>
</body>
</html>
