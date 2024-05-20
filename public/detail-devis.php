<?php

require_once '../base.php';
require_once BASE_PROJET . '/src/database/devis-db.php';
require_once BASE_PROJET . '/src/database/produit-db.php';

$id_devis = null;
if (isset($_GET['id_devis'])) {
    $id_devis = filter_var($_GET['id_devis'], FILTER_VALIDATE_INT);
}

$devis = getDevisParId($id_devis);
session_start();
$client = null;
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];
}

if (empty($_SESSION)) {
    header("Location: index.php");
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


<div class="container content-wrapper mb-5">

    <?php if ($devis == null) : ?>
        <h1 class="text-danger text-center">Ce devis n'existe pas</h1>
    <?php elseif ($client['id_client'] != $devis['id_client']) : ?>
        <h1 class="text-danger text-center">Ce devis n'existe pas</h1>
    <?php else : ?>
        <?php $produit = getProduitParId($devis['id_prod']); ?>
        <div class="row">
            <h1 class="text-black border-2 border-bottom border-danger mt-3">Votre devis pour votre abonnement</h1>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border border-3 border-black">
                                <div class="invoice-title">
                                    <div class="text-sm-end">
                                        <h1 class="fw-bold">Prestataire</h1>
                                        <p class="mb-1" >Sports New Area </p>
                                        <p class="mb-1">91-93 Bd Léon Blum, 25000 Besançon </p>
                                    </div>
                                </div>

                                <h1 class="text-black border-2 border-bottom border-danger mt-3"></h1>

                                <div class="row">
                                    <div class="col-sm-6">
                                            <h1 class="fw-bold">Client</h1>
                                            <p class="mb-1"> Nom/Prénom client : <strong><?= $devis['nom'] . " " . $devis['prenom'] ?></strong> </p>
                                            <p class="mb-1"> Adresse de facturation : <strong><?= $devis['libelleRue'] . ", " . $devis['codePostal'] . " " . $devis['ville']?></strong> </p>
                                            <p class="mb-1"> Date de facturation : <strong><?= date("d/m/Y", strtotime($devis['date'])) ?></strong> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="text-sm-end">
                                            <div>
                                                <h5 class="font-size-15 mb-1">Numéro commande</h5>
                                                <p> <strong><?= $devis['id_devis'] ?></strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="py-2">
                                    <h5 class="font-size-15">Récapitulatif de la commande :</h5>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-centered mb-0">
                                            <thead>
                                            <tr>
                                                <th style="width: 70px;">No°Produit</th>
                                                <th>Description du produit</th>
                                                <th></th>
                                                <th>Quantité</th>
                                                <th class="text-end" style="width: 120px;">Prix</th>
                                            </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                            <tr>
                                                <th scope="row"> <?= $produit['id_prod'] ?></th>
                                                <td>
                                                    <div>
                                                        <?= $produit['designation_prod'] ?>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                                <td>1</td>
                                                <td class="text-end">  <?= $produit['prix_prod'] . "€" ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end"><h4 class="m-0 fw-semibold"> <?= $produit['prix_prod'] . "€" ?>
                                                    </h4></td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php require_once BASE_PROJET . '/src/_partials/footer.php'; ?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>