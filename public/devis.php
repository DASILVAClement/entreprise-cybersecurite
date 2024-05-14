<?php

require_once '../base.php';
require_once BASE_PROJET . '/src/database/devis-db.php';

session_start();

if (empty($_SESSION)) {
    header("Location: index.php");
}


$produits = null;
if (isset($_SESSION["produit"])) {
    $produits = $_SESSION["produit"];
}

$client = null;
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];
}

$devis = null;
if (isset($_SESSION["devis"])) {
    $devis = $_SESSION["devis"];
}


$erreurs = [];
$prenom_client = "";
$nom_client = "";
$telephone_client = "";
$ville_client = "";
$rue_client = "";
$cp_client = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $prenom_client = $_POST['prenom_client'];
    $nom_client = $_POST['nom_client'];
    $telephone_client = $_POST['telephone_client'];
    $ville_client = $_POST['ville_client'];
    $rue_client = $_POST['rue_client'];
    $cp_client = $_POST['cp_client'];


    if (empty($prenom_client)) {
        $erreurs['prenom_client'] = "Le prénom est obligatoire";
    }
    if (empty($nom_client)) {
        $erreurs['nom_client'] = "Le nom est obligatoire";
    }
    if (empty($telephone_client)) {
        $erreurs['telephone_client'] = "Le numéro de téléphone est obligatoire";
    }
    if (empty($ville_client)) {
        $erreurs['ville_client'] = "La ville est obligatoire";
    }
    if (empty($rue_client)) {
        $erreurs['rue_client'] = "La rue est obligatoire";
    }
    if (empty($cp_client)) {
        $erreurs['cp_client'] = "Le code postal est obligatoire";
    }

    if (empty($erreurs)) {
        postDevis($prenom_client, $nom_client, $telephone_client, $ville_client, $rue_client, $cp_client);

        $_SESSION["devis"] = [
            "prenom_client" => $prenom_client,
            "nom_client" => $nom_client,
            "telephone_client" => $telephone_client,
            "ville_client" => $ville_client,
            "rue_client" => $rue_client,
            "cp_client" => $cp_client
        ];
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

        <div class="mb-3">

            <label for="prenom_client" class="form-label">Prénom*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['prenom_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="prenom_client" name="prenom_client" value="<?= $prenom_client ?>"
                   placeholder="Saisir votre prénom "
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['prenom_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['prenom_client'] ?></p>
            <?php endif; ?>

        </div>

        <div class="mb-3">

            <label for="nom_client" class="form-label">Nom*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['nom_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="nom_client" name="nom_client" value="<?= $nom_client ?>"
                   placeholder="Saisir votre nom "
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['nom_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['nom_client'] ?></p>
            <?php endif; ?>

        </div>

        <div class="mb-3">

            <label for="telephone_client" class="form-label">Téléphone*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['telephone_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="telephone_client" name="telephone_client" value="<?= $telephone_client ?>"
                   placeholder="Saisir votre numéro de téléphone"
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['telephone_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['telephone_client'] ?></p>
            <?php endif; ?>

        </div>

        <div class="mb-3">

            <label for="ville_client" class="form-label">Ville*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['ville_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="ville_client" name="ville_client" value="<?= $ville_client ?>"
                   placeholder="Saisir votre ville"
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['ville_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['ville_client'] ?></p>
            <?php endif; ?>

        </div>

        <div class="mb-3">

            <label for="rue_client" class="form-label">Rue*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['rue_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="rue_client" name="rue_client" value="<?= $rue_client ?>"
                   placeholder="Saisir votre numéro de rue"
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['rue_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['rue_client'] ?></p>
            <?php endif; ?>

        </div>

        <div class="mb-3">

            <label for="cp_client" class="form-label">Code postal*</label>
            <input type="text"
                   class="form-control <?= (isset($erreurs['cp_client'])) ? "border border-2 border-danger" : "" ?>"
                   id="cp_client" name="cp_client" value="<?= $cp_client ?>"
                   placeholder="Saisir votre code postal"
                   aria-describedby="emailHelp">
            <?php if (isset($erreurs['cp_client'])) : ?>
                <p class="form-text text-black"><?= $erreurs['cp_client'] ?></p>
            <?php endif; ?>

        </div>


        <p>* Champs obligatoires</p>

        <div class="text-center">
            <button type="submit" class="btn btn-light ">Valider</button>
        </div>

    </div>
</div>

<?php
require_once BASE_PROJET . '/src/_partials/footer.php';
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>