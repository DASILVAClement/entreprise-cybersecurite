<?php

require_once '../base.php';
require_once BASE_PROJET . '/src/database/client-db.php';

if (!empty($_SESSION)) {
    header("Location: index.php");
}

// Déterminer si le formulaire a été soumis
// Utilisation d'une variable superglobale $_SERVER
// $_SERVER : tableau associatif contenant des informations sur la requête HTTP
$erreurs = [];
$email_client = "";
$mdp_client = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis !
    // Traiter les données du formulaire
    // Récupérer les valeurs saisies par l'utilisateur
    // Superglobale $_POST : tableau associatif
    $email_client = $_POST['email_client'];
    $mdp_client = $_POST['mdp_client'];
    //Validation des données
    if (empty($email_client)) {
        $erreurs['email_client'] = "L'email est obligatoire";
    } elseif (!filter_var($email_client, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email_client'] = "L'email n'est pas valide";
        if (empty($mdp_client)) {
            $erreurs['mdp_client'] = "Le mot de passe est obligatoire";
        }
    }


    $email_user = getUser($email_client);
    $mot_de_passe = getMotDePasse($email_client);
    if ($email_user) {
        foreach ($email_user as $donne_user) {
            foreach ($mot_de_passe as $mdp_user) {
                if (password_verify($mdp_client, $mdp_user)) {
                    session_start();
                    $_SESSION["client"] = [
                        "pseudo_client" => $donne_user["pseudo_client"],
                        "id_client" => $donne_user["id_client"]
                    ];
                    header("Location: /index.php");
                    exit();
                } else {
                    $erreurs['email_client'] = "identifiants incorrects";
                    $erreurs['mdp_client'] = "identifiants incorrects";
                }
            }
        }

    } else {
        $erreurs['email_client'] = "identifiants incorrects";
        $erreurs['mdp_client'] = "identifiants incorrects";
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
    <title>FILM.COM</title>
</head>

<body class="bg-light">

<?php
require_once BASE_PROJET . '/src/_partials/header.php';
?>

<div class="container">

    <h1 class="text-black border-2 border-bottom border-danger">Connexion à votre compte </h1>

    <?php if (isset($erreurs['identifiant'])) : ?>
        <p class="form-text text-danger"><?= $erreurs['identifiant'] ?></p>
    <?php endif; ?>

    <div class="w-50 mx-auto shadow my-5 p-4 bg-danger rounded-5">

        <form action="" method="post" novalidate="">

            <ul class="nav nav-pills nav-justified mb-3 shadow rounded-3 bg-white" id="ex1" role="tablist">

                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link active bg-black text-white"
                            id="tab-login"
                            data-mdb-pill-init
                            href="connexion-compte.php"
                            role="tab"
                            aria-controls="connexion_compte.php"
                            aria-selected="true"
                    >Connexion</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link text-black"
                            id="tab-register"
                            data-mdb-pill-init
                            href="creation-compte.php"
                            role="tab"
                            aria-controls="creation_compte.php"
                            aria-selected="false"
                    >Inscription</a>
                </li>

            </ul>

            <div class="mb-3">

                <label for="email_client" class="form-label">Email*</label>
                <input type="email"
                       class="form-control <?= (isset($erreurs['email_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="email_client"
                       name="email_client" value="<?= ($erreurs) ? "" : $email_client ?>"
                       placeholder="Saisir votre email"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['email_client'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['email_client'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="mdp_client" class="form-label">Mot de passe*</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs['mdp_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="mdp_client" name="mdp_client"
                       value="<?= (!empty($erreurs)) ? $mdp_client : "" ?>" placeholder="Saisir votre mot de passe"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['mdp_client'])) : ?>
                    <p class="form-text text-danger"><?= $erreurs['mdp_client'] ?></p>
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