<?php
session_start();

require_once '../base.php';
require_once BASE_PROJET . '/src/database/produit-db.php';

$produits = getProduits();

$client = null;
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];
}


?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/section.css">
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
<?php
require_once BASE_PROJET . '/src/_partials/header.php';
?>

<main>
    <!--Présentation-->
    <section id="presentation" class="section-border">

        <?php if ($client) : ?>
            <h1 class="text-black text-center mb-5">Bienvenue <?= $client["pseudo_client"] ?> </h1>
        <?php endif; ?>

        <div class="container">

            <div class="row text-start">
                <div class="col col-xl-6 text-center">
                    <h1 class="text-uppercase fw-bold just">Sports News Area</h1>
                    <h4>Votre plongée quotidienne dans le monde du sport !</h4>
                    <p>Notre entreprise est une entreprise spécialisée dans le journalisme sportif. Retrouver tous vos
                        sports favoris, ou vous voulez et quand vous voulez.</p>
                    <a href="#contenu" class="btn btn-danger mt-3">Nous découvrir</a>
                </div>
                <div class="col col-xl-6 ">
                    <img style="width: 500px; height: 300px;" src="assets/images/logo_sna_noir.png"
                         class="justify-content-center d-md-block d-none"
                         alt="">
                </div>
            </div>
        </div>
    </section>

    <!--Contenu-->
    <section id="contenu" class="section-border bg-light">
        <h1 class="text-center">Ce qu'il faut savoir à propos de notre entreprise et de nos services...</h1>
        <h5 class="text-center">Voici les différents aspects de notre entreprise</h5>
        <div class="container mt-5">
            <div class="row text-start">
                <div class="col col-xl-6">
                    <img class="uniform-image" src="assets/images/UEFA_Champions_League_logo.svg" alt="">
                    <img class="uniform-image" src="assets/images/Logo_UEFA_Europa_League.svg" alt="">
                    <img class="uniform-image" src="assets/images/Premier-League.png" alt="">
                    <img class="uniform-image" src="assets/images/Logo_Ligue1.png" alt="">

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
                                <a href="personnel-entreprise.php"
                                   class="btn btn-danger mt-3 mx-auto justify-content-center">Pour en
                                    savoir plus sur nos employé</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Nos services proposés
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Grâce à notre équipe, nous pouvons proposer différents services en tous genres :
                                <br>
                                <ul>
                                    <li>
                                        Service de journalisme
                                    </li>
                                    <li>
                                        Service de photographie sportive
                                    </li>
                                </ul>

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

    <!--Offres-->
    <section id="offres" class="section-border">
        <h1 class="text-center">Nos différentes offres !</h1>
        <h5 class="text-center">Vous retrouverez toutes les offres que nous vous offrons au sein de notre
            entreprise</h5>

        <div class="container">
            <div class="row">

                <?php foreach ($produits as $produit) : ?>

                    <div class="card col-12 col-lg-4 ">
                        <div class="card-header text-center bg-white">
                            <h1><i class="<?= $produit["photo_prod"] ?>"></i></h1>
                        </div>
                        <h3 class="text-center"><?= $produit["designation_prod"] ?></h3>
                        <p class="fs-2 text-center"><?= $produit["prix_prod"] ?>€</p>
                        <div class="d-flex justify-content-between">
                            <a href="devis.php?id_prod=<?= $produit["id_prod"] ?>" class="btn bg-danger text-white" style="width: 45%; font-size: 16px; padding: 10px 0;">
                                Commander
                            </a>

                            <button type="button" class="btn btn-outline-danger" style="width: 45%; font-size: 16px; padding: 10px 0;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $produit["id_prod"] ?>">
                                En savoir plus
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $produit["id_prod"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><?= $produit["designation_prod"] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>

                                            <li>
                                                <?= $produit["commentaire_prod"] ?>
                                            </li>

                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>


</main>

<!--Pied de page-->
<?php
require_once BASE_PROJET . '/src/_partials/footer.php';
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>