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
<?php include_once '_partials/menu.php' ?>


<!--Personnel-->
<section id="personnel" class="bg-light">
    <h1 class="text-center">Le personnel de l'entreprise</h1>
    <h5 class="text-center">Vous retrouverez un organigramme de l'entreprise ainsi que les fiches de postes de nos
        employés</h5>
    <div class="container mt-5">
        <div class="row text-start">
            <div class="col col-xl-4 col-md-12 col-sm-12">
                <ul class="list-group">
                    <li class="list-group-item border border-dark border-2">
                        <h3 class="fw-bold"><i class="bi bi-person"></i> DA SILVA Clément</h3>
                        <p>Directeur de l'entreprise</p>
                        <a href="fiche_de_poste/fiche_de_poste_Clement.pdf" target="_blank" class="btn btn-danger">Fiche
                            de
                            Poste</a>
                    </li>
                    <li class="list-group-item border border-dark border-2">
                        <h3 class="fw-bold"><i class="bi bi-person"></i> SCHIESSLE Andy</h3>
                        <p>Rédacteur en chef</p>
                        <a href="fiche_de_poste/fiche_de_poste_Andy.pdf" target="_blank" class="btn btn-danger">Fiche
                            de
                            Poste</a>
                    </li>
                    <li class="list-group-item border border-dark border-2">
                        <h3 class="fw-bold"><i class="bi bi-person"></i> SERMET Maxime</h3>
                        <p>Journaliste sportif</p>
                        <a href="fiche_de_poste/fiche_de_poste_Maxime.pdf" target="_blank" class="btn btn-danger">Fiche
                            de
                            Poste</a>
                    </li>
                    <li class="list-group-item border border-dark border-2">
                        <h3 class="fw-bold"><i class="bi bi-person"></i> TALBOT Hugo</h3>
                        <p>Photographe sportif</p>
                        <a href="fiche_de_poste/fiche_de_poste_Hugo.pdf" target="_blank" class="btn btn-danger">Fiche
                            de
                            Poste</a>
                    </li>
                    <li class="list-group-item border border-dark border-2">
                        <h3 class="fw-bold"><i class="bi bi-person"></i> NGUYEN Phong</h3>
                        <p>Responsable des plateformes en ligne</p>
                        <a href="fiche_de_poste/fiche_de_poste_Phong.pdf" target="_blank" class="btn btn-danger">Fiche
                            de
                            Poste</a>
                    </li>
                </ul>
            </div>
            <div class="col col-xl-8 col-md-12 col-sm-12">
                <img class="img-fluid d-md-block d-none" style="width: 900px; height: 700px;"
                     src="organigramme/organigramme_employe.png" alt="">
            </div>
        </div>
    </div>
</section>


<!--Pied de page-->
<?php include_once '_partials/pied_page.php' ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>