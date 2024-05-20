<?php

session_start();

require_once '../base.php';
require_once BASE_PROJET . '/src/database/client-db.php';
require_once BASE_PROJET . '/src/database/devis-db.php';
require_once BASE_PROJET . '/src/database/produit-db.php';

$id_prod = null;
if (isset($_GET['id_prod'])) {
    $id_prod = filter_var($_GET['id_prod'], FILTER_VALIDATE_INT);
}

$client = null;
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];
}

$erreurs = [];
$nom = "";
$prenom = "";
$telephone = "";
$libelleRue = "";
$ville = "";
$codePostal = "";
$pays = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $libelleRue = $_POST['libelle_rue'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['code_postal'];
    $pays = $_POST['pays'];

    if (empty($nom)) {
        $erreurs['nom'] = "Le nom est obligatoire";
    }
    if (empty($prenom)) {
        $erreurs['prenom'] = "La prénom est obligatoire";
    }
    if (empty($telephone)) {
        $erreurs['telephone'] = "Le numéro de téléphone est obligatoire";
    }
    if (empty($libelleRue)) {
        $erreurs['libelle_rue'] = "Le lib est obligatoire";
    }
    if (empty($ville)) {
        $erreurs['ville'] = "Le pays est obligatoire";
    }
    if (empty($codePostal)) {
        $erreurs['code_postal'] = "Le code postal est obligatoire";
    }
    if (empty($pays)) {
        $erreurs['pays'] = "Le pays est obligatoire";
    }


    if (empty($erreurs)) {
        postDevis($nom, $prenom, $telephone, $libelleRue, $ville, $codePostal, $pays, date("Y/m/d"), $client["id_client"], $id_prod);
        // Rediriger l'utilisateur vers une autre page du site
        header("Location: /index.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Sports News Area</title>
</head>

<body class="bg-light">


<?php
require_once BASE_PROJET . '/src/_partials/header.php';
?>


<div class="container">

    <h1 class="text-black border-2 border-bottom border-danger">Faite votre devis </h1>

    <div class="w-50 mx-auto shadow my-5 p-4 bg-danger rounded-5">

        <form action="" method="post" novalidate>

            <div class="mb-3">

                <label for="nom" class="form-label">Nom*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['nom'])) ? "border border-2 border-danger" : "" ?>"
                       id="nom" name="nom" value="<?= $nom ?>" placeholder="Saisir votre nom"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['nom'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['nom'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="prenom" class="form-label">Prénom*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['prenom'])) ? "border border-2 border-danger" : "" ?>"
                       id="prenom"
                       name="prenom" value="<?= $prenom ?>" placeholder="Saisir votre prénom"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['prenom'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['prenom'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="telephone" class="form-label">Téléphone*</label>
                <input type="number"
                       class="form-control <?= (isset($erreurs['telephone'])) ? "border border-2 border-danger" : "" ?>"
                       id="telephone" name="telephone" value="<?= $telephone ?>"
                       placeholder="Saisir votre numéro de téléphone"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['telephone'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['telephone'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="libelle_rue" class="form-label">Libellé de rue*</label>
                <input type="text"
                       class="form-control  <?= (isset($erreurs['libelle_rue'])) ? "border border-2 border-danger" : "" ?>"
                       id="libelle_rue" name="libelle_rue" value="<?= $libelleRue ?>"
                       placeholder="Saisir votre libellé de rue"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['libelle_rue'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['libelle_rue'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="ville" class="form-label">Ville*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['ville'])) ? "border border-2 border-danger" : "" ?>"
                       id="ville" name="ville" value="<?= $ville ?>" placeholder="Saisir votre ville"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['ville'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['ville'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="code_postal" class="form-label">Code postal*</label>
                <input type="number"
                       class="form-control <?= (isset($erreurs['code_postal'])) ? "border border-2 border-danger" : "" ?>"
                       id="code_postal" name="code_postal" value="<?= $codePostal ?>"
                       placeholder="Saisir votre code postal"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['code_postal'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['code_postal'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="pays" class="form-label">Pays*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['pays'])) ? "border border-2 border-danger" : "" ?>"
                       id="pays" name="pays" value="<?= $pays ?>" placeholder="Saisir le pays"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['pays'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['pays'] ?></p>
                <?php endif; ?>

            </div>

            <p>* Champs obligatoires</p>

            <div class="text-center">
                <button type="submit" class="btn btn-light ">Valider</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once BASE_PROJET . '/src/_partials/footer.php';
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>