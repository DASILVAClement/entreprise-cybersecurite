<?php

require_once '../base.php';
require_once BASE_PROJET . '/src/database/client-db.php';


// Déterminer si le formulaire a été soumis
// Utilisation d'une variable superglobale $_SERVER
// $_SERVER : tableau associatif contenant des informations sur la requête HTTP
$erreurs = [];
$nom_client = "";
$prenom_client = "";
$adresse_client = "";
$email_client = "";
$pseudo_client = "";
$mdp_client = "";
$mdp_verification = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom_client = $_POST['nom_client'];
    $prenom_client = $_POST['prenom_client'];
    $adresse_client = $_POST['adresse_client'];
    $email_client = $_POST['email_client'];
    $pseudo_client = $_POST['pseudo_client'];
    $mdp_client = $_POST['mdp_client'];
    $mdp_verification = $_POST['mdp_verification'];
    //Validation des données
    if (empty($nom_client)) {
        $erreurs['nom_client'] = "Le nom est obligatoire";
    }
    if (empty($prenom_client)) {
        $erreurs['prenom_client'] = "Le prénom est obligatoire";
    }
    if (empty($adresse_client)) {
        $erreurs['adresse_client'] = "L'adresse est obligatoire";
    }
    if (empty($email_client)) {
        $erreurs['email_client'] = "L'email est obligatoire";
    } elseif (!filter_var($email_client, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email_client'] = "L'email n'est pas valide";
    }
    if (empty($pseudo_client)) {
        $erreurs['pseudo_client'] = "Le pseudo est obligatoire";
    }
    if (empty($mdp_client)) {
        $erreurs['mdp_client'] = "Le mot de passe est obligatoire";
    }
    if (empty($mdp_verification)) {
        $erreurs['mdp_verification'] = "La confirmation du mot de passe est obligatoire";
    }
    if ($mdp_client != $mdp_verification) {
        $erreurs['mdp_client'] = "Vous devez mettre le même mot de passe";
        $erreurs['mdp_verification'] = "Vous devez mettre le même mot de passe";
    }
    if (strlen($mdp_client) > 14 || strlen($mdp_client) < 8) {
        $erreurs['mdp_client'] = "Votre mot de passe doit contenir entre 8 et 14 caractères";
    }
    if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp_client)) {
        $erreurs['mdp_client'] = "Votre mot de passe doit contenir un chiffre, une minuscule, un caractère spécial et une majuscule";
    } else {


        getUser($email_client);
        if (getUser($email_client)) {
            $erreurs['email_utilisateur'] = "L'email est déjà associé à un compte";
        } else {

            if (empty($erreurs)) {
                postClient($nom_client, $prenom_client, $adresse_client, $email_client, $pseudo_client, $mdp_client);
                session_start();
                $_SESSION["client"] = [
                    "nom_client" => $nom_client,
                    "prenom_client" => $prenom_client,
                    "adresse_client" => $adresse_client,
                    "email_client" => $email_client,
                    "pseudo_client" => $pseudo_client,
                    "mdp_client" => $mdp_client
                ];
                header("Location: /index.php");
                exit();
            }
        }
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

    <h1 class="text-black border-2 border-bottom border-danger">Inscription à votre compte </h1>

    <div class="w-50 mx-auto shadow my-5 p-4 bg-danger rounded-5">

        <form action="" method="post" novalidate>

            <ul class="nav nav-pills nav-justified mb-3 shadow rounded-3 bg-white" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link text-black"
                            id="tab-login"
                            data-mdb-pill-init
                            href="connexion-compte.php"
                            role="tab"
                            aria-controls="connexion_compte.php"
                            aria-selected="false"
                    >Connexion</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                            class="nav-link bg-black text-white"
                            id="tab-register"
                            data-mdb-pill-init
                            href="creation-compte.php"
                            role="tab"
                            aria-controls="creation_compte.php"
                            aria-selected="true"
                    >Inscription</a>
                </li>
            </ul>

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

                <label for="adresse_client" class="form-label">Adresse*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['adresse_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="adresse_client" name="adresse_client" value="<?= $adresse_client ?>"
                       placeholder="Saisir votre adresse"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['adresse_client'])) : ?>
                    <p class="form-text text-black"><?= $erreurs['adresse_client'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="email_client" class="form-label">Email*</label>
                <input type="email"
                       class="form-control <?= (isset($erreurs['email_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="email_client"
                       name="email_client" value="<?= $email_client ?>" placeholder="Saisir un email valide"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['email_client'])) : ?>
                    <p class="form-text text-black"><?= $erreurs['email_client'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="pseudo_client" class="form-label">Pseudo*</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['pseudo_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="pseudo_client" name="pseudo_client" value="<?= $pseudo_client ?>"
                       placeholder="Saisir votre pseudo "
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['pseudo_client'])) : ?>
                    <p class="form-text text-black"><?= $erreurs['prenom_client'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="mdp_client" class="form-label">Mot de passe*</label>

                <button type="button" class="btn mb-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                    <i class="bi bi-info-circle"></i>
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Les caractéristiques de votre mot de
                                    passe </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        Votre mot de passe doit contenir entre 8 et 14 caractères
                                    </li>
                                    <li>
                                        Il doit contenir au moins une minuscule, une majuscule et un chiffre et un
                                        caractère spécial
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="password"
                       class="form-control <?= (isset($erreurs['mdp_client'])) ? "border border-2 border-danger" : "" ?>"
                       id="mdp_client" name="mdp_client" value="<?= $mdp_client ?>"
                       placeholder="Saisir votre mot de passe"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['mdp_client'])) : ?>
                    <p class="form-text text-black"><?= $erreurs['mdp_client'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mb-3">

                <label for="mdp_verification" class="form-label">Confirmez votre mot de passe*</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs['mdp_verification'])) ? "border border-2 border-danger" : "" ?>"
                       id="mdp_verification" name="mdp_verification"
                       value="<?= $mdp_verification ?>"
                       placeholder="Confirmez votre mot de passe"
                       aria-describedby="emailHelp">
                <?php if (isset($erreurs['mdp_verification'])) : ?>
                    <p class="form-text text-black"><?= $erreurs['mdp_verification'] ?></p>
                <?php else: ?>

                    <p class="form-text text-black">La confirmation du mot de passe est obligatoire</p>
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