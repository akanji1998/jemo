<?php

include("database/connexion.php");
include("database/admin_global_request.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jemo Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <div class="container-fluid flex-grow-1">
            <div class="row h-100">
                <!-- Sidebar -->
                <?php include('sidebar.php'); ?>
                <!-- Main content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex flex-column">
                    <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <!-- Nav Item - User Information -->

                        <div id="date-time" class="text-muted m2"></div>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>


                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile" src="../media/public/images/photos_membres/ppp.png"
                                        width="35">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nom_administrateur'] ?>
                                        <?= $admin['prenom_administrateur'] ?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                        Paramètres
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:deconnexion()" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Se déconnecter
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Dashboard stats -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card text-center border">
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">En ligne</h5>
                                            <p class="card-text fs-3">200</p>
                                        </div>
                                        <div
                                            class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">Traffic journalier</h5>
                                            <p class="card-text fs-3">2,699</p>
                                        </div>
                                        <div
                                            class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between border-bottom border-md-0 border-md-end pb-3">
                                            <h5 class="card-title">Clique sur contact</h5>
                                            <p class="card-text fs-3">2,469</p>
                                        </div>

                                        <!-- <div class="col-md-3 mb-3 d-flex flex-column flex-md-row justify-content-between">
                                            <h5 class="card-title">Revenu publicitaire</h5>
                                            <p class="card-text fs-3">100 XOF</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Traffic Chart -->
                    <div class="card mb-4 flex-grow-1 col-md-8">
                        <div class="card-header">
                            Traffic mensuel
                        </div>
                        <div class="card-body">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-light text-center py-3">
            <p class="mb-0">&copy; 2024 Jemo. Tous droits réservés.</p>
        </footer>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Voulez-vous vraiment vous déconnecter ?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sélectionnez "Se déconnecter" ci-dessous si vous êtes prêt à terminer votre session actuelle.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                    <a class="btn btn-success" href="javascript:deconnexion();">Se déconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/script.js"></script>
     <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function deconnexion() {
            console.log("deconnexion");
           
            $.ajax({
                url: 'http://jemo.test/admin/api/logout.php', // L'URL de votre script PHP
                method: 'GET',
             
                success: function (response) {
                    console.log(response);
                    const res = JSON.parse(response);


                    if (res.success) {
                        console.log(res.redirect_url);
                        // Si la connexion est réussie, rediriger l'utilisateur
                        window.location.href = res.redirect_url;
                        // Redirige vers le tableau de bord
                    } else {

                        alert(res.message); // Affiche un message d'erreur
                        // res.redirect_url; // Redirige vers le tableau de bord
                        //          $('#errorMessage').text('Erreur de format de réponse JSON.');
                        // $('#errorModal').modal('show');
                    }
                },
                error: function (xhr, status, error) {
                    alert("Une erreur s'est produite lors de la connexion.");
                    console.log(error);

                }
            });
        }
    </script>
</body>

</html>