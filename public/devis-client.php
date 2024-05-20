<?php

require_once '../base.php';
require_once BASE_PROJET . '/src/database/devis-db.php';
require_once BASE_PROJET . '/src/database/produit-db.php';

$devis = getDevis();
session_start();
$client = null;
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];
}

if (empty($_SESSION)) {
    header("Location: index.php");
}
$nbDevis = 0;

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


<div class="container content-wrapper">
    <h1 class="text-black border-2 border-bottom border-danger mt-3">Inscription à votre compte </h1>

    <div class="row">

        <?php foreach ($devis as $detail) : ?>

            <?php if ($detail['id_client'] == $client['id_client']) : ?>

                <?php $devis = getDevisUser($client['id_client']); ?>

                <?php $nbDevis = 1; ?>

                <div class="card col-12 col-lg-4 ">
                    <div class="card-header text-center bg-white">
                        <h4 class="card-title">Numéro du devis : <?= $detail['id_devis'] ?></h4>
                        <p class="card-text fs-4 text-dark"><?= date("d/m/Y", strtotime($detail['date'])) ?></p>
                        <p class="card-text fs-4 text-dark"><?php $produit = getProduitParId($detail['id_prod']);
                            echo $produit['designation_prod'] ?></p>

                        <p class="card-text">
                            <a class="btn bg-danger text-white" role="button"
                               href="detail-devis.php?id_devis=<?= $detail['id_devis'] ?>
                        ">Détails du devis</a></p>

                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($nbDevis == 0) : ?>
            <p>Vous n'avez aucun devis</p>
        <?php endif; ?>

    </div>
</div>


<?php require_once BASE_PROJET . '/src/_partials/footer.php'; ?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>