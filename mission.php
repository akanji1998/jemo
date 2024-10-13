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
    <header class="bg-primary text-white py-3 bgcolor_header_mission">
        <div class="container_mission_bar">
            <!-- <h1 class="text-center">Jemo</h1>
            <div class="search-bar mt-4">
                <input type="text" class="form-control" placeholder="logo">
                <div class="btn-group mt-2" role="group">
                    <button class="btn btn-light">Photographe</button>
                    <button class="btn btn-light">Infographiste PAO</button>
                    <button class="btn btn-light">Intégrateur Web</button>
                    <button class="btn btn-light">Monteur vidéo</button>
                </div>
                <button class="btn btn-success mt-3">Rechercher</button>
            </div> -->

                <!-- BARRE DE RECHERCHE -->

            <div class="box_searchform">
                <form class="searchform" action="resultatderecherche.php">
                    <input type="search" placeholder="logo, montage, web, motion, affiche..."><input type="submit" value="Trouver">
                </form>
            </div>

            <!-- lien metier -->
            <nav>
            <ul>
                <li class="job_item trigger-modal"><a href="photographe.php">Photographe</a></li>
                <li class="job_item trigger-modal"><a href="pao.php">infographiste PAO</a></li>
                <li class="job_item trigger-modal"><a href="integrateur.php"> Intégrateur web </a></li>
                <li class="job_item trigger-modal"><a href="integrateur.php"> Monteur vidéo </a></li>
            </ul>
            </nav>
    </header>

    <div class="container_resultat_mission my-5">
        <div class="row">
            <!-- Left Side: Search Results -->
            <div class="col-md-7">
                <h5>Résultats de recherche</h5>
                <p class="text-muted">23 sur 6000 trouvés</p>
                
                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">"Neque porro quisquam est..."</h5>
                            <small>12:12 PM</small>
                        </div>
                        <p class="mb-1">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</p>
                    </a>
                    <!-- Repeat this block for more search results -->
                </div>
                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">"Neque porro quisquam est..."</h5>
                            <small>12:12 PM</small>
                        </div>
                        <p class="mb-1">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</p>
                    </a>
                    <!-- Repeat this block for more search results -->
                </div>
            </div>

            <!-- Right Side: Job Description -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Conception de logo</h4>
                        <p class="card-text"><strong>Entreprise:</strong> 2K Group</p>
                        <p><strong>Description de la mission:</strong></p>
                        <p>
                            Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                        </p>
                        <!-- <p><strong>Fichiers joints:</strong></p>
                        <ul class="list-unstyled">
                            <li><a href="#">jhgjhgfhjklgfkhlfhkfhkd.png</a></li>
                            <li><a href="#">jhjkhjkhjklhlkhlfklhkd.png</a></li>
                        </ul> -->
                        <!-- <p><strong>Profil recherché:</strong></p>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-secondary">Infographiste</button>
                            <button class="btn btn-outline-secondary">Illustrateur 2D</button>
                            <button class="btn btn-outline-secondary">Freelance</button>
                        </div> -->
                        
                        <!-- <p class="mt-3"><strong>Prix:</strong> Prix fixe - 10.000 XOF</p> -->
                        <button class="btn btn-success btn-block"><a href="https://wa.me/2250545475763"> what's app : 05 XX XX XX XX</a></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- pagination -->
        <ul class="pagination_mission">
        <li><a href="#" class="prev">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="next">&raquo;</a></li>
    </ul>
    </div>
</body>
</html>
