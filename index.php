<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        section {
            padding: 60px 0;
        }
    </style>
    <title>Sports News Area</title>
</head>
<body>
<!--Barre de navigation-->
<?php include_once 'menu.php' ?>

<main>
    <!--Présentation-->
    <section id="presentation">
        <div class="container">
            <div class="row text-start">
                <div class="col col-xl-6">
                    <h1 class="text-uppercase fw-bold just">Sports News Area</h1>
                    <h4>Votre plongée quotidienne dans le monde du sport !</h4>
                    <p>Notre entreprise est une entreprise spécialisée dans le journalisme sportif. Retrouver tous vos
                        sports favoris, ou vous voulez et quand vous voulez.</p>
                    <a href="#contenu" class="btn btn-danger mt-3">Nous découvrir</a>
                </div>
                <div class="col col-xl-6">
                    <img style="width: 500px; height: 300px;" src="./image/logo_sna_noir.png"
                         class="justify-content-center d-md-block d-none"
                         alt="">
                </div>
            </div>
        </div>
    </section>

    <!--Contenu-->
    <section id="contenu" class="bg-light">
        <h1 class="text-center">Ce qu'il faut savoir à propos de notre entreprise...</h1>
        <h5 class="text-center">Voici les différents aspects de notre entreprise</h5>
        <div class="container mt-5">
            <div class="row text-start">
                <div class="col col-xl-6">
                    <img style="width: 450px; height: 250px;" src="./image/logo_sna_noir.png"
                         class=""
                         alt="">
                </div>
                <div class="col col-xl-6 accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                A propos de notre entreprise
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Nous sommes un jeune entreprise spécialisé dans le journalisme sportif. Malgré notre
                                    commencement de notre entreprise, nous comptons des jeunes talents d'expérience.
                                    Notre
                                    entreprise située à Besançon ne nous empêche pas de couvrir la plupart des
                                    événements
                                    sportifs mondiaux.</p>
                                <a href="personnel_entreprise.php"
                                   class="btn btn-danger mt-3 mx-auto justify-content-center">Pour en
                                    savoir plus sur nos employé</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Retrouvez nos plus belles s'offrent
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Grâce à Sports New Area, retrouvez les plus grands sports dans le format qui vous
                                convient le mieux avec nos offres :
                                <br>
                                <ul>
                                    <li>
                                        Notre offre Journalière
                                    </li>
                                    <li>
                                        Notre offre Numérique
                                    </li>
                                    <li>
                                        Notre offre Privilégié
                                    </li>
                                </ul>
                                <a href="#offres" class="btn btn-danger mt-3 mx-auto justify-content-center">Pour en
                                    savoir plus </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Entreprise-->
    <section id="offres">
        <h1 class="text-center">Nos différentes offres !</h1>
        <h5 class="text-center">Vous retrouverez toutes les offres que nous vous offrons au sein de notre
            entreprise</h5>

        <div class="container">
            <div class="row">

                <div class="card col-12 col-lg-4 ">
                    <div class="card-header text-center bg-white">
                        <h1><i class="bi bi-newspaper"></i></h1>
                    </div>
                    <h3 class="text-center">Abonnements Journaliers</h3>
                    <p class="fs-2 text-center">9,99€/mois</p>

                    <button type="button" class="btn btn-danger mb-3 mx-auto" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2">
                        En savoir plus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Notre abonnement
                                        journalier</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>
                                            Tous nos articles débloqués
                                        </li>
                                        <li>
                                            Nos documentaires ainsi que nos longs-formats et nos podcasts
                                        </li>
                                        <li>
                                            Le journal papier ainsi que numérique
                                        </li>
                                        <li>
                                            Et la possibilité d'avoir 2 comptes abonnées
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col-12 col-lg-4">
                    <div class="card-header text-center bg-white">
                        <h1><i class="bi bi-tv"></i> <i class="bi bi-phone"></i></h1>
                    </div>
                    <h3 class="text-center">Abonnements Numériques</h3>
                    <p class="fs-2 text-center">19,99€/mois</p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger mb-3 mx-auto" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        En savoir plus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Notre abonnement
                                        numérique </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>
                                            Nos différentes chaînes dédier au sport
                                        </li>
                                        <li>
                                            Nos documentaires ainsi que nos longs-formats et les interviews
                                        </li>
                                        <li>
                                            Application mobile gratuite
                                        </li>
                                        <li>
                                            Et la possibilité d'avoir 2 comptes simultanés
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col-12 col-lg-4 ">
                    <div class="card-header text-center bg-white">
                        <h1><i class="bi bi-mic"></i></h1>
                    </div>
                    <h3 class="text-center">Abonnements privilégiés</h3>
                    <p class="fs-2 text-center">55€/mois</p>

                    <button type="button" class="btn btn-danger mb-3 mx-auto" data-bs-toggle="modal"
                            data-bs-target="#exampleModal3">
                        En savoir plus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Notre abonnement
                                        privilégié</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>
                                            Nos deux versions d'abonnements sont comprises dans l'abonnement
                                        </li>
                                        <li>
                                            Vous pourrez assister à nos émissions en plateau
                                        </li>
                                        <li>
                                            Vous pourrez participer à nos podcasts
                                        </li>
                                        <li>
                                            Et tentez de gagner des places tous les mois pour votre sport favoris !
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</main>

<!--Pied de page-->
<?php include_once 'pied_page.php' ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>